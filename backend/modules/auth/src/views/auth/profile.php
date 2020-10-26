<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 10/23/2020
 * Time: 14:47
 */

use yii\helpers\Url;

$this->title = 'Thông tin người dùng';
$this->params['breadcrumbs'][] = $this->title;

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
                    <a href="<?= Url::toRoute(['/auth/auth/update-profile']) ?>" class="btn btn-xs btn-warning"><i class="icon-note"></i> Edit</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <label class="col-4 control-label">Họ & Tên:</label>
                                <div class="col-8"><?= $model->fullname ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <label class="col-4 control-label">Email:</label>
                                <div class="col-8"><?= Yii::$app->user->identity->email; ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <label class="col-4 control-label">Địa chỉ:</label>
                                <div class="col-8"><?= $model->address ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <label class="col-4 control-label">Ngày sinh:</label>
                                <div class="col-8"><?= $model->birthday ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <label class="col-4 control-label">Số điện thoại:</label>
                                <div class="col-8"><?= $model->phone ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <label class="col-4 control-label">Facebook:</label>
                                <div class="col-8"><?= $model->facebook ?></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="control-label">Ghi chú:</label>
                            <div><?= $model->about ?></div>
                        </div>
                    </div>
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
                        <li class="list-group-item mt-0 pb-0"><a href="<?= Url::toRoute(['/auth/auth/profile']) ?>">Thông tin người dùng</a></li>
                        <li class="list-group-item mt-0 pb-0"><a href="<?= Url::toRoute(['/auth/auth/change-password']) ?>">Thay
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
