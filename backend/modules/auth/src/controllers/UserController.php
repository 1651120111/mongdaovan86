<?php

namespace modava\auth\controllers;

use backend\components\MyComponent;
use backend\components\MyController;
use common\helpers\MyHelper;
use modava\auth\AuthModule;
use modava\auth\models\search\UserSearch;
use modava\auth\models\User;
use modava\auth\models\UserModel;
use modava\auth\models\UserProfile;
use Yii;
use yii\db\Exception;
use yii\db\Transaction;
use yii\filters\VerbFilter;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends MyController
{
    public $manager;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function init()
    {
        $this->manager = Yii::$app->authManager;
        parent::init(); // TODO: Change the autogenerated stub
        $this->layout = 'user';
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $totalPage = $this->getTotalPage($dataProvider);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'totalPage' => $totalPage,
        ]);
    }


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserModel();
        $modelProfile = new UserProfile();
        if (Yii::$app->user->can(User::DEV)) {
            $model->scenario = UserModel::SCENARIO_DEV;
        }

        if ($model->load(Yii::$app->request->post()) && $modelProfile->load(Yii::$app->request->post())) {
            if ($model->validate() && $modelProfile->validate()) {
                $pass = $model->scenario === UserModel::SCENARIO_DEV && $model->password != null ? $model->password : MyHelper::randomString(10);
                $model->setPassword($pass);
                $transaction = Yii::$app->db->beginTransaction(Transaction::SERIALIZABLE);
                if ($model->save()) {
                    $modelProfile->scenario = UserProfile::SCENARIO_SAVE;
                    $modelProfile->user_id = $model->primaryKey;
                    $model->afterSignup($modelProfile->getAttributes());
                    /*if (Yii::$app->commandBus->handle(new SendEmailCommand([
                        'subject' => AuthModule::t('auth', 'Create Account'),
                        'view' => 'createAccount',
                        'to' => $model->email,
                        'params' => [
                            'user' => $model->username,
                            'pass' => $pass,
                        ]
                    ]))) {*/
                    Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                        'title' => 'Thông báo',
                        'text' => 'Tạo mới thành công',
                        'type' => 'success'
                    ]);
                    /*} else {
                        Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                            'title' => 'Thông báo',
                            'text' => 'Tạo mới thành công, có lỗi khi gửi email',
                            'type' => 'warning'
                        ]);
                    }*/
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                        'title' => 'Thông báo',
                        'text' => 'Tạo mới thất bại',
                        'type' => 'warning'
                    ]);
                }
            } else {
                $errors = Html::tag('p', 'Tạo mới thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelProfile' => $modelProfile
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelProfile = UserProfile::findOne(['user_id' => $id]);
        if (Yii::$app->user->can(User::DEV)) {
            $model->scenario = UserModel::SCENARIO_DEV;
        }

        if ($model->load(Yii::$app->request->post()) && $modelProfile->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction(Transaction::SERIALIZABLE);
            if ($model->scenario === UserModel::SCENARIO_DEV && $model->password != null) {
                $model->setPassword($model->password);
            }
            if ($model->validate() && $modelProfile->validate() && $model->save() && $this->saveRole($model) && $modelProfile->save()) {
                $transaction->commit();
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                    'title' => 'Thông báo',
                    'text' => 'Cập nhật thành công',
                    'type' => 'success'
                ]);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                $transaction->rollBack();
                $errors = Html::tag('p', 'Cập nhật thất bại');
                $list_errors = array_merge($model->getErrors(), $modelProfile->getErrors());
                foreach ($list_errors as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-form', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelProfile' => $modelProfile
        ]);
    }

    protected function saveRole($model)
    {
        $user = new User();
        $roleUser = (string)$user->getRoleName(Yii::$app->user->id);
        $role = (string)$model->role_name;

        if ($user->checkParent($role, $roleUser)) {
            $role_name = $user->getRoleName($model->id);
            $this->removeAssignment($role_name, $model->id);
            $this->addAssign($role, $model->id);
            return true;
        }
        return false;
    }

    protected function removeAssignment(string $role, int $id): bool
    {
        $item = $this->manager->getRole($role);
        $item = $item ?: $this->manager->getPermission($role);
        $this->manager->revoke($item, $id);
        return true;
    }

    protected function addAssign(string $role, int $id): bool
    {
        $item = $this->manager->getRole($role);
        $item = $item ?: $this->manager->getPermission($role);
        $this->manager->assign($item, $id);

        return true;
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        try {
            if ($model->updateAttributes([
                'status' => User::STATUS_DELETED
            ])) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                    'title' => 'Thông báo',
                    'text' => 'Xoá thành công',
                    'type' => 'success'
                ]);
            } else {
                $errors = Html::tag('p', 'Xoá thất bại');
                foreach ($model->getErrors() as $error) {
                    $errors .= Html::tag('p', $error[0]);
                }
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                    'title' => 'Thông báo',
                    'text' => $errors,
                    'type' => 'warning'
                ]);
            }
        } catch (Exception $ex) {
            Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                'title' => 'Thông báo',
                'text' => Html::tag('p', 'Xoá thất bại: ' . $ex->getMessage()),
                'type' => 'warning'
            ]);
        }
        return $this->redirect(['index']);
    }

    /**
     * @param $perpage
     */
    public function actionPerpage($perpage)
    {
        MyComponent::setCookies('pageSize', $perpage);
    }

    /**
     * @param $dataProvider
     * @return float|int
     */
    public function getTotalPage($dataProvider)
    {
        if (MyComponent::hasCookies('pageSize')) {
            $dataProvider->pagination->pageSize = MyComponent::getCookies('pageSize');
        } else {
            $dataProvider->pagination->pageSize = 10;
        }

        $pageSize = $dataProvider->pagination->pageSize;
        $totalCount = $dataProvider->totalCount;
        $totalPage = (($totalCount + $pageSize - 1) / $pageSize);

        return $totalPage;
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */


    protected function findModel($id)
    {
        if (($model = UserModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(AuthModule::t('auth', 'The requested page does not exist.'));
    }
}
