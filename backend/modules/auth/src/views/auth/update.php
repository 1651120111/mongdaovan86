<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 10/26/2020
 * Time: 15:40
 */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

$role = array_key_exists($roleUser, $roleName) ? $roleName[$roleUser]->description : '';
$cover = $model->cover != '' ? $model->cover : Yii::$app->assetManager->publish('@modava-assets/dist/img/trans-bg.jpg')[1];
$avatar = $model->avatar != '' ? $model->avatar : Yii::$app->assetManager->publish('@modava-assets/dist/img/avatar12.jpg')[1];


?>
<?= \backend\widgets\ToastrWidget::widget(['key' => 'toastr-update-profile']) ?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <div class="profile-cover-wrap overlay-wrap">
        <div class="profile-cover-img"
             style="background-image:url('<?= $cover; ?>')"></div>
        <div class="bg-overlay bg-trans-dark-60"></div>
        <div class="container-fluid px-xxl-65 px-xl-20 profile-cover-content py-50">
            <div class="row">
                <div class="col-lg-6">
                    <div class="media align-items-center">
                        <div class="media-img-wrap  d-flex">
                            <div class="avatar">
                                <img src="<?= $avatar; ?>"
                                     alt="user" class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="text-white text-capitalize display-6 mb-5 font-weight-400"><?= $model->fullname; ?></div>
                            <div class="font-14 text-white"><span class="mr-5"><span
                                            class="font-weight-500 pr-5"><?= $role; ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="button-list">
                        <a href="#" class="btn btn-dark btn-wth-icon icon-wthot-bg btn-rounded"><span class="btn-text">Message</span><span
                                    class="icon-label"><i class="icon ion-md-mail"></i> </span></a>
                        <a href="#" class="btn btn-icon btn-icon-circle btn-indigo btn-icon-style-2"><span
                                    class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                        <a href="#" class="btn btn-icon btn-icon-circle btn-sky btn-icon-style-2"><span
                                    class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                        <a href="#" class="btn btn-icon btn-icon-circle btn-purple btn-icon-style-2"><span
                                    class="btn-icon-wrap"><i class="fa fa-instagram"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row -->
    <div class="row mt-30">
        <div class="col-xl-8">
            <div class="card card-profile-feed">
                <div class="card-header card-header-action">
                    <h4><i class="icon-user"></i> ABOUT</h4>
                </div>
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-update-profile']) ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Họ & Tên:</label>
                                    <div class="col-9">
                                        <?= $form->field($model, 'fullname', [
                                            'options' => ['tag' => false]
                                        ])->textInput(['class' => 'form-control'])->label(false) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Email:</label>
                                    <div class="col-9">
                                        <input type="text" value="<?= Yii::$app->user->identity->email; ?>"
                                               class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Địa chỉ:</label>
                                    <div class="col-9">
                                        <?= $form->field($model, 'address', [
                                            'options' => ['tag' => false]
                                        ])->textInput(['class' => 'form-control'])->label(false) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Ngày sinh:</label>
                                    <div class="col-9">
                                        <?= $form->field($model, 'birthday', [
                                            'options' => ['tag' => false]
                                        ])->widget(
                                            \dosamigos\datepicker\DatePicker::class,
                                            [
                                                'template' => '{input}<div class="input-group-append">{addon}</div>',
                                                'clientOptions' => [
                                                    'autoclose' => true,
                                                    'format' => 'dd/mm/yyyy',
                                                ]
                                            ]
                                        )->label(false); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Giới tính:</label>
                                    <div class="col-9">
                                        <?= $form->field($model, 'gender')->radioList(\modava\auth\models\UserProfile::GENDER)->label(false) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Số điện thoại:</label>
                                    <div class="col-9">
                                        <?= $form->field($model, 'phone', [
                                            'options' => ['tag' => false]
                                        ])->textInput(['class' => 'form-control'])->label(false); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Facebook:</label>
                                    <div class="col-9">
                                        <?= $form->field($model, 'facebook', [
                                            'options' => ['tag' => false]
                                        ])->textInput(['class' => 'form-control'])->label(false); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Ghi chú:</label>
                                    <div class="col-9">
                                        <?= $form->field($model, 'about', [
                                            'options' => ['tag' => false]
                                        ])->textarea(['class' => 'form-control', 'rows' => 4])->label(false); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Avatar:</label>
                                    <div class="col-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-3 control-label">Cover:</label>
                                    <div class="col-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <?= \yii\helpers\Html::button('Save', ['type' => 'submit', 'class' => 'btn btn-success btn-sm']) ?>
                                        <?= \yii\helpers\Html::button('Cancel', ['type' => 'reset', 'class' => 'btn btn-warning btn-sm']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card card-profile-feed rounded-6 mb-0 overflow-hidden">
                <div class="card-header card-header-action">
                    <div class="media align-items-center">
                        <div class="media-img-wrap d-flex mr-10">
                            <div class="avatar avatar-sm">
                                <img src="<?= $avatar; ?>"
                                     alt="user" class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="text-capitalize font-weight-500 text-dark"><?= $model->fullname ?></div>
                            <div class="font-13"><?= $role ?></div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item mt-0 pb-0"><a href="<?= Url::toRoute(['/auth/auth/profile']) ?>">Thông
                                tin người dùng</a></li>
                        <li class="list-group-item mt-0 pb-0"><a
                                    href="<?= Url::toRoute(['/auth/auth/change-password']) ?>">Thay
                                đổi mật khẩu</a></li>
                        <li class="list-group-item mt-0"><a href="#">Cài đặt tài khoản</a></li>
                    </ul>
                </div>
            </div>
            <div class="card bg-blue-dark-3 text-white rounded-6 border-0 p-3 mt-20 mb-0">
                Bạn luôn có thể thay đổi thông tin cá nhân của bạn và bạn chịu trách nhiệm về thông tin của bạn với nhà
                quản lý.
            </div>
        </div>
    </div>
</div>

