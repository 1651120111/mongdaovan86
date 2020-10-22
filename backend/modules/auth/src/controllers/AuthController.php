<?php

namespace modava\auth\controllers;

use modava\auth\components\MyAuthController;
use modava\auth\models\form\LoginForm;
use modava\auth\models\form\RequestPasswordResetForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;


class AuthController extends MyAuthController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->redirect(['login']);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/site/index']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/site/index']);
        } else {
            $model->password = '';
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
//        try {
//            $model = new ResetPasswordForm($token);
//        } catch (InvalidArgumentException $exception) {
//            return $this->redirect('/auth/login');
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->resetPassword()) {
//                Yii::$app->session->setFlash('alert', [
//                    'body' => 'Thành công. Vui lòng đăng nhập lại',
//                    'class' => 'bg-success',
//                ]);
//            } else {
//                Yii::$app->session->setFlash('alert', [
//                    'body' => 'Thất bại. Vui lòng liên hệ bộ phận kỹ thuật',
//                    'class' => 'bg-danger',
//                ]);
//            }
//            return $this->refresh();
//        }

        return $this->render('resetPassword', [
//            'model' => $model
        ]);
    }

    public function actionRequestPasswordReset()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RequestPasswordResetForm();

        if (Yii::$app->request->isAjax) {

            if (!$model->load(Yii::$app->request->post()) || !$model->validate()) {
                Yii::$app->session->setFlash('toastr-request-password-reset', [
                    'text' => 'Thất bại. Vui lòng liên hệ bộ phận kỹ thuật',
                    'type' => 'warning'
                ]);

                Yii::$app->response->format = Response::FORMAT_JSON;

                return ['code' => 400,];
            }

//            Email::sendEmail($model->email);

            Yii::$app->session->setFlash('toastr-request-password-reset', [
                'text' => 'Thành công. Vui lòng kiểm tra email và làm theo hướng dẫn.',
                'type' => 'success'
            ]);

            Yii::$app->response->format = Response::FORMAT_JSON;

            return ['code' => 200,];
        }

        return $this->render('requestPasswordReset', [
            'model' => $model
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
