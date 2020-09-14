<?php


namespace modava\iway\controllers;


use modava\iway\components\MyIwayController;
use yii\helpers\Url;

class IwayController extends MyIwayController
{

    public function actionIndex()
    {
        return $this->redirect(Url::toRoute(['/iway/co-so']));
    }

    public function actionView()
    {
        return $this->render('view');
    }
}