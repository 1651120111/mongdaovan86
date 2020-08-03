<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\widgets\ToastrWidget;
use modava\kenne\KenneModule;

/* @var $this yii\web\View */
/* @var $model modava\kenne\models\Account */
/* @var $form yii\widgets\ActiveForm */
?>
<?= ToastrWidget::widget(['key' => 'toastr-' . $model->toastr_key . '-form']) ?>
<div class="account-form">
    <?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'oauth_client')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'oauth_client_user_id')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'created_at')->textInput() ?>

		<?= $form->field($model, 'updated_at')->textInput() ?>

		<?= $form->field($model, 'logged_at')->textInput() ?>

		<?= $form->field($model, 'created_by')->textInput() ?>

		<?= $form->field($model, 'updated_by')->textInput() ?>

		<?php if (Yii::$app->controller->action->id == 'create') $model->status = 1; ?>
		<?= $form->field($model, 'status')->checkbox() ?>
        <div class="form-group">
            <?= Html::submitButton(KenneModule::t('kenne', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
