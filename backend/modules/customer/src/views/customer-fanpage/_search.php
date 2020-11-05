<?php

use modava\customer\CustomerModule;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\search\CustomerFanpageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-fanpage-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'origin_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'url_page') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
<<<<<<< HEAD
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
=======
<<<<<<< HEAD
        <?= Html::submitButton(Yii::t('customer', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('customer', 'Reset'), ['class' => 'btn btn-default']) ?>
=======
        <?= Html::submitButton(CustomerModule::t('customer', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(CustomerModule::t('customer', 'Reset'), ['class' => 'btn btn-default']) ?>
>>>>>>> master
>>>>>>> f32a99fed422638505da242bdcb777c28b6abc74
    </div>

    <?php ActiveForm::end(); ?>

</div>
