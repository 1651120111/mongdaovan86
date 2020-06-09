<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\customer\CustomerModule;

/* @var $this yii\web\View */
/* @var $model modava\customer\models\CustomerFanpage */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="customer-fanpage-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'origin_id')->textInput() ?>

		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'url_page')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'language')->dropDownList([ 'vi' => 'Vi', 'en' => 'En', 'jp' => 'Jp', ], ['prompt' => '']) ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

		<?= $form->field($model, 'updated_by')->textInput() ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(CustomerModule::t('customer', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
