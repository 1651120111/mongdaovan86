<?php

namespace modava\auth\controllers;

use yii\db\Exception;
use Yii;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use modava\auth\AuthModule;
use backend\components\MyController;
use modava\auth\models\RbacAuthItem;
use modava\auth\models\search\RbacAuthItemSearch;

/**
 * RbacAuthItemController implements the CRUD actions for RbacAuthItem model.
 */
class RbacAuthItemController extends MyController
{
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
        parent::init(); // TODO: Change the autogenerated stub
        $this->layout = 'user';
    }

    /**
     * Lists all RbacAuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RbacAuthItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single RbacAuthItem model.
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
     * Creates a new RbacAuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RbacAuthItem();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                    'title' => 'Thông báo',
                    'text' => 'Tạo mới thành công',
                    'type' => 'success'
                ]);
                return $this->redirect(['view', 'id' => $model->name]);
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
        ]);
    }

    /**
     * Updates an existing RbacAuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->save()) {
                    Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-view', [
                        'title' => 'Thông báo',
                        'text' => 'Cập nhật thành công',
                        'type' => 'success'
                    ]);
                    return $this->redirect(['view', 'id' => $model->name]);
                }
            } else {
                $errors = Html::tag('p', 'Cập nhật thất bại');
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

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RbacAuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if ($id == 'loginToBackend') {
            $model = new RbacAuthItem();
            Yii::$app->session->setFlash('toastr-' . $model->toastr_key . '-index', [
                'title' => 'Thông báo',
                'text' => Html::tag('p', 'Không được xóa quyền loginToBackend'),
                'type' => 'warning'
            ]);
        } else {
            $model = $this->findModel($id);
            try {
                if ($model->delete()) {
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
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the RbacAuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RbacAuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */


    protected function findModel($id)
    {
        $model = RbacAuthItem::findOne($id);
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(AuthModule::t('auth', 'The requested page does not exist.'));
    }
}
