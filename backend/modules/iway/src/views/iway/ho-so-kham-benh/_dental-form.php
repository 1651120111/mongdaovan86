<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 10/27/2020
 * Time: 10:05
 */

$css = <<< CSS
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;800;900&display=swap');
.page {
    width: 210mm;
    min-height: 297mm;
    padding: 20mm;
    margin: 10mm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    position: relative;
    font-family: "Montserrat", sans-serif;
    font-size: 14px;
    color: #782484;
}

.page h6, .page a, .page label {
    color: #782484;
}

.page .custom-control-label::before,
.page .custom-control-input:checked~.custom-control-label::before {
    border-color: #782484;
}

.page .custom-control-label::before, 
.page .custom-control-label::after{
    top: .125rem;
}

.page .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
    background-color: #782484;
}

.page .page-content {
    height: 257mm;
    /*outline: 2cm #FFEAEA solid;*/
}

.clinic-info .clinic-name {
    font-weight: 700;
}

.clinic-address ul li {
    font-size: 12px;
}

.clinic-address ul li:first-child {
    margin-bottom: 10px;
}

.form-title {
    font-size: 38px;
    font-weight: 700;
    text-align: right;
    line-height: 1;
}

.form-title span:nth-child(2) {
    color: #f596a5;
}

.permission-gr, .date-time {
    font-size: 12px;
    text-align: right;
    justify-content: flex-end;
}
    
@page {
    size: A4!important;
    margin: 0;
}

@media print {
    html, body {
        width: 210mm;
        height: 297mm;
    }
    
    body {
        margin: 0!important;
        padding: 0!important;
        min-width: 1px!important;
    }
    
    @page {
        size: A4!important;
        margin: 0;
    }
    
    .container-fluid, .col-lg-12, .col-xl-12 {
        padding: 0!important;
    }
    
    .page {
        margin: 0;
        border: none;
        border-radius: unset;
        width: initial;
        min-height: initial;
        box-shadow: none;
        background: none;
        page-break-after: always;
    }
    
    .navbar-search, .hk-nav, .hk-breadcrumb, .hk-pg-header, .card-header, .custom-tab-button,
    #pills-2-button,#pills-2-button *, #pills-3-button, #pills-3-button *, #pills-4-button, #pills-4-button *, #pills-5-button, #pills-5-button *,
    #defaultTabLine {
        display: none!important;
    }
    
    .card {
        border: none;
        margin-bottom: 0!important;
    }
    
    .card-body, .hk-pg-wrapper {
        padding: 0!important;
        margin: 0!important;
    }
    
    .hk-pg-wrapper {
        min-height: 1px!important;
    }
}
CSS;
$this->registerCss($css);

?>

<div id="dental-form" style="margin-left: 15px">
    <!-- #page-1 -->
    <div id="page-1" class="page">
        <div class="page-content">
            <div class="page-header mb-30">
                <div class="row align-items-center mb-10">
                    <div class="col-6">
                        <div class="logo"><img
                                    src="<?= Yii::$app->assetManager->publish('@modava/iway/web/img/logo-n.png')[1] ?>"
                                    alt="logo"></div>
                    </div>
                    <div class="col-6">
                        <div class="form-title mb-15">
                            <span>DENTAL</span>
                            <span>FORM</span>
                        </div>
                        <div class="permission-gr d-flex mb-5">
                            <div class="telesales" style="margin-right: .5rem">
                                Telesales: <?= '___________' ?>
                            </div>
                            <div class="direct-sales">
                                Direct sales: <?= '____________' ?>
                            </div>
                        </div>
                        <div class="date-time">
                            Ngày ___ tháng ___ năm _______
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="clinic-info">
                            <div class="clinic-name font-16 mb-10">
                                <span>TRUNG TÂM CHỈNH RĂNG iWAY CLUB</span>
                            </div>
                            <div class="clinic-address">
                                <ul class="list-unstyled">
                                    <li><strong>Địa chỉ:</strong> 72 Nguyễn Cư Trinh, Phường Phạm Ngũ Lão, Quận 1,
                                        TP. Hồ Chí Minh
                                    </li>
                                    <li><strong>Hotline:</strong> 0899.910.345 |
                                        <strong>Website:</strong> <a href="www.iwayclub.vn">www.iwayclub.vn</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="patient-info">
                            <div class="pi-title font-16 mb-10">
                                <span class="font-weight-bold">THÔNG TIN</span>
                                <span class="font-weight-normal">KHÁCH HÀNG</span>
                            </div>
                            <div class="pi-content">
                                <ul class="list-unstyled">
                                    <li class="mb-10">Tên khách hàng: Đào Văn Mong</li>
                                    <li class="mb-10">Mã số khách hàng: IWC-00001</li>
                                    <li class="d-flex mb-10">
                                        <div class="mr-5">Ngày sinh: 12-08-1986</div>

                                        <div class="custom-control custom-checkbox ml-1">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="gender1"
                                                   id="gender1" checked>
                                            <label class="custom-control-label" for="gender1">Nam</label>
                                        </div>
                                        <div class="custom-control custom-checkbox ml-1">
                                            <input type="checkbox" class="custom-control-input"
                                                   name="gender2"
                                                   id="gender2">
                                            <label class="custom-control-label" for="gender2">Nữ</label>
                                        </div>
                                    </li>
                                    <li style="white-space: normal;">Địa chỉ: Q. 10, TP. HCM</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="row row-1 mb-15">
                    <div class="col-12">
                        <div class="customer-wish">
                            <div class="cw-title font-weight-bold font-16 mb-10">I. KHÁCH HÀNG MONG MUỐN</div>
                            <div class="cw-content">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="customer_wish[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="customer_wish_1">
                                            <label class="custom-control-label" for="customer_wish_1">Chỉnh hô</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="customer_wish[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="customer_wish_2">
                                            <label class="custom-control-label" for="customer_wish_2">Chỉnh móm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="customer_wish[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="customer_wish_3">
                                            <label class="custom-control-label" for="customer_wish_3">Chỉnh răng lộn
                                                xộn</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="customer_wish[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="customer_wish_4">
                                            <label class="custom-control-label" for="customer_wish_4">Chỉnh cười hở nướu
                                                (lợi)</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="customer_wish[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="customer_wish_5">
                                            <label class="custom-control-label" for="customer_wish_5">Chỉnh lệch
                                                mặt</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="customer_wish[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="customer_wish_6">
                                            <label class="custom-control-label" for="customer_wish_6">Chỉnh thưa kẽ
                                                răng</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="font-weight-bold"><em>Yêu cầu khác</em></h6>
                                        <div>
                                            …………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………………
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-2 mb-15">
                    <div class="col-12">
                        <div class="soft-tissue">
                            <div class="st-title font-weight-bold font-16 mb-10">II. MÔ MỀM</div>
                            <div class="st-content">
                                <div class="st-r-1 mb-5">
                                    <div class="title font-weight-bold mb-10">1. Kiểu mặt</div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input name="soft_tissue_II1[]" value="1" type="checkbox"
                                               class="custom-control-input" id="soft_tissue_II1_1">
                                        <label class="custom-control-label" for="soft_tissue_II1_1">Mặt thẳng</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input name="soft_tissue_II1[]" value="1" type="checkbox"
                                               class="custom-control-input" id="soft_tissue_II1_2">
                                        <label class="custom-control-label" for="soft_tissue_II1_2">Mặt lồi</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input name="soft_tissue_II1[]" value="1" type="checkbox"
                                               class="custom-control-input" id="soft_tissue_II1_3">
                                        <label class="custom-control-label" for="soft_tissue_II1_3">Mặt lõm</label>
                                    </div>
                                </div>

                                <div class="st-r-2 mb-5">
                                    <div class="title font-weight-bold mb-10">2. Khoảng cách môi so với đường Eline
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="sub-tit font-italic mb-10">a. Môi trên:</div>
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input name="soft_tissue_II2[]" value="1" type="checkbox"
                                                       class="custom-control-input" id="soft_tissue_II2_1">
                                                <label class="custom-control-label" for="soft_tissue_II2_1">Trùng đường
                                                    Eline: ...........................mm</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input name="soft_tissue_II2[]" value="1" type="checkbox"
                                                       class="custom-control-input" id="soft_tissue_II2_2">
                                                <label class="custom-control-label" for="soft_tissue_II2_2">Trước đường
                                                    Eline: ……………………….mm</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input name="soft_tissue_II2[]" value="1" type="checkbox"
                                                       class="custom-control-input" id="soft_tissue_II2_3">
                                                <label class="custom-control-label" for="soft_tissue_II2_3">Sau đường
                                                    Eline: …………………………..mm</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="sub-tit font-italic mb-10">b. Môi dưới:</div>
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input name="soft_tissue_II2[]" value="1" type="checkbox"
                                                       class="custom-control-input" id="soft_tissue_II2_4">
                                                <label class="custom-control-label" for="soft_tissue_II2_4">Trùng đường
                                                    Eline: ...........................mm</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input name="soft_tissue_II2[]" value="1" type="checkbox"
                                                       class="custom-control-input" id="soft_tissue_II2_5">
                                                <label class="custom-control-label" for="soft_tissue_II2_5">Trước đường
                                                    Eline: ……………………….mm</label>
                                            </div>
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input name="soft_tissue_II2[]" value="1" type="checkbox"
                                                       class="custom-control-input" id="soft_tissue_II2_6">
                                                <label class="custom-control-label" for="soft_tissue_II2_6">Sau đường
                                                    Eline: …………………………..mm</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="st-r-3 mb-5">
                                    <div class="title font-weight-bold mb-10">3. Kiểu mặt theo chiều đứng</div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input name="soft_tissue_II3[]" value="1" type="checkbox"
                                               class="custom-control-input" id="soft_tissue_II3_1">
                                        <label class="custom-control-label" for="soft_tissue_II3_1">Dài</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input name="soft_tissue_II3[]" value="1" type="checkbox"
                                               class="custom-control-input" id="soft_tissue_II3_2">
                                        <label class="custom-control-label" for="soft_tissue_II3_2">Ngắn</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input name="soft_tissue_II3[]" value="1" type="checkbox"
                                               class="custom-control-input" id="soft_tissue_II3_3">
                                        <label class="custom-control-label" for="soft_tissue_II3_3">Trung bình</label>
                                    </div>
                                </div>

                                <div class="st-r-4 mb-5">
                                    <div class="title font-weight-bold mb-10">4. Mặt bất đối xứng khi nhìn thẳng</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #page-1 -->

    <!-- #page-2 -->
    <div id="page-2" class="page">
        <div class="page-content">
            <div class="row row-1 mb-10">
                <div class="col-12">
                    <div class="soft-tissue">
                        <div class="custom-control custom-checkbox mb-5">
                            <input name="soft_tissue_II4[]" value="1" type="checkbox"
                                   class="custom-control-input" id="soft_tissue_II4_1">
                            <label class="custom-control-label" for="soft_tissue_II4_1">Có</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-5">
                            <input name="soft_tissue_II4[]" value="1" type="checkbox"
                                   class="custom-control-input" id="soft_tissue_II4_2">
                            <label class="custom-control-label" for="soft_tissue_II4_2">Không</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-1 mb-10">
                <div class="col-12">
                    <div class="jaw-bone-correlation">
                        <div class="jbc-title font-weight-bold font-16 mb-10">III. TƯƠNG QUAN XƯƠNG HÀM</div>
                        <div class="jbc-content">
                            <div class="anterior-posterior">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="anterior_posterior[]" value="1" type="checkbox"
                                           class="custom-control-input" id="anterior_posterior_tooth_movement">
                                    <label class="custom-control-label" for="anterior_posterior_tooth_movement">Chiều
                                        trước sau:</label>
                                </div>
                                <div class="g-1">
                                    <div class="custom-control custom-checkbox ml-30 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_1">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_1">Xương
                                            hạng I:</label>
                                    </div>
                                </div>
                                <div class="g-2">
                                    <div class="custom-control custom-checkbox ml-30 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_2">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_2">Xương
                                            hạng II:</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-45 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_2_1">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_2_1">Nhẹ</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-45 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_2_2">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_2_2">Nặng</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-45 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_2_3">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_2_3">Trung
                                            Bình</label>
                                    </div>
                                </div>
                                <div class="g-3 mb-10">
                                    <div class="custom-control custom-checkbox ml-30 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_3">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_3">Xương
                                            hạng III:</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-45 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_3_1">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_3_1">Nhẹ</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-45 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_3_2">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_3_2">Nặng</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-45 mb-5">
                                        <input name="anterior_posterior[]" value="1" type="checkbox"
                                               class="custom-control-input" id="anterior_posterior_tooth_movement_3_3">
                                        <label class="custom-control-label" for="anterior_posterior_tooth_movement_3_3">Trung
                                            Bình</label>
                                    </div>
                                </div>
                            </div>

                            <div class="vertical">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="vertical[]" value="1" type="checkbox"
                                           class="custom-control-input" id="vertical_tooth_movement">
                                    <label class="custom-control-label" for="vertical_tooth_movement">Chiều
                                        đứng:</label>
                                </div>
                                <div class="g-1">
                                    <div class="custom-control custom-checkbox ml-30 mb-5">
                                        <input name="vertical[]" value="1" type="checkbox"
                                               class="custom-control-input" id="vertical_tooth_movement_1">
                                        <label class="custom-control-label" for="vertical_tooth_movement_1">Kiểu xương
                                            trung bình</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-30 mb-5">
                                        <input name="vertical[]" value="1" type="checkbox"
                                               class="custom-control-input" id="vertical_tooth_movement_2">
                                        <label class="custom-control-label" for="vertical_tooth_movement_2">Kiểu xương
                                            mở</label>
                                    </div>
                                    <div class="custom-control custom-checkbox ml-30 mb-5">
                                        <input name="vertical[]" value="1" type="checkbox"
                                               class="custom-control-input" id="vertical_tooth_movement_3">
                                        <label class="custom-control-label" for="vertical_tooth_movement_3">Kiểu xương
                                            đóng</label>
                                    </div>
                                </div>
                            </div>
                            <div class="horizontal">
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="horizontal[]" value="1" type="checkbox"
                                           class="custom-control-input" id="horizontal_tooth_movement">
                                    <label class="custom-control-label" for="horizontal_tooth_movement">Chiều
                                        ngang:</label>
                                </div>
                                <div class="g-1">
                                    <div class="custom-control custom-checkbox ml-30 mb-5">
                                        <input name="horizontal[]" value="1" type="checkbox"
                                               class="custom-control-input" id="horizontal_tooth_movement_1">
                                        <label class="custom-control-label" for="horizontal_tooth_movement_1">Cắn chéo
                                            do xương</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-2">
                <div class="col-12">
                    <div class="increased-relationship">
                        <div class="ir-title font-weight-bold font-16 mb-10">IV. TƯƠNG QUAN RĂNG</div>
                        <div class="ir-content">
                            <div class="ir-r-1 mb-5">
                                <div class="title font-weight-bold mb-10">1. Tương quan răng cối:</div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="sub-tit font-italic mb-10">a. Bên phải:</div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_1_1">
                                            <label class="custom-control-label" for="increased_relationship_1_1">Hạng
                                                I:
                                                ...........................mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_1_2">
                                            <label class="custom-control-label" for="increased_relationship_1_2">Hạng
                                                II: ……………………….mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_1_3">
                                            <label class="custom-control-label" for="increased_relationship_1_3">Hạng
                                                III: …………………………..mm</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="sub-tit font-italic mb-10">b. Bên trái:</div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_1_4">
                                            <label class="custom-control-label" for="increased_relationship_1_4">Hạng
                                                I:
                                                ...........................mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_1_5">
                                            <label class="custom-control-label" for="increased_relationship_1_5">Hạng
                                                II: ……………………….mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_1_6">
                                            <label class="custom-control-label" for="increased_relationship_1_6">Hạng
                                                III: …………………………..mm</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ir-r-2 mb-5">
                                <div class="title font-weight-bold mb-10">2. Tương quan răng nanh:</div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="sub-tit font-italic mb-10">a. Bên phải:</div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_2_1">
                                            <label class="custom-control-label" for="increased_relationship_2_1">Hạng
                                                I:
                                                ...........................mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_2_2">
                                            <label class="custom-control-label" for="increased_relationship_2_2">Hạng
                                                II: ……………………….mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_2_3">
                                            <label class="custom-control-label" for="increased_relationship_2_3">Hạng
                                                III: …………………………..mm</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="sub-tit font-italic mb-10">b. Bên trái:</div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_2_4">
                                            <label class="custom-control-label" for="increased_relationship_2_4">Hạng
                                                I:
                                                ...........................mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_2_5">
                                            <label class="custom-control-label" for="increased_relationship_2_5">Hạng
                                                II: ……………………….mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_2_6">
                                            <label class="custom-control-label" for="increased_relationship_2_6">Hạng
                                                III: …………………………..mm</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ir-r-3 mb-5">
                                <div class="title font-weight-bold mb-10">3. Độ cắn phủ <span class="font-weight-normal">(overbite):</span>
                                    <span class="font-weight-normal">.………………………………………………………………………………………………………………………………mm</span>
                                </div>
                            </div>

                            <div class="ir-r-4 mb-5">
                                <div class="title font-weight-bold mb-10">4. Độ cắn chìa <span
                                            class="font-weight-normal">(overjet):</span>
                                    <span class="font-weight-normal">.……………………………………………………………………………………………………………………………………mm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #page-2 -->

    <!-- #page-3 -->
    <div id="page-3" class="page">
        <div class="page-content">
            <div class="row row-1 mb-10">
                <div class="col-12">
                    <div class="increased-relationship">
                        <div class="ir-content">
                            <div class="ir-r-5 mb-5">
                                <div class="title font-weight-bold mb-10">5. Đường giữa so với đường giữa mặt:</div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="sub-tit font-italic mb-10">a. Hàm trên:</div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_5_1">
                                            <label class="custom-control-label" for="increased_relationship_5_1">Trùng
                                                đường giữa mặt</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_5_2">
                                            <label class="custom-control-label" for="increased_relationship_5_2">Lệch
                                                trái:………………………………………………mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_5_3">
                                            <label class="custom-control-label" for="increased_relationship_5_3">Lệch
                                                phải:…………………………………………….mm</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="sub-tit font-italic mb-10">b. Hàm dưới:</div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_5_4">
                                            <label class="custom-control-label" for="increased_relationship_5_4">Trùng
                                                đường giữa mặt</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_5_5">
                                            <label class="custom-control-label" for="increased_relationship_5_5">Lệch
                                                trái:………………………………………………mm</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_5_6">
                                            <label class="custom-control-label" for="increased_relationship_5_6">Lệch
                                                phải:…………………………………………….mm</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ir-r-6 mb-5">
                                <div class="title font-weight-bold mb-10">6. Mức độ chen chúc:</div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_6_1">
                                            <label class="custom-control-label" for="increased_relationship_6_1">Không
                                                có</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_6_2">
                                            <label class="custom-control-label" for="increased_relationship_6_2">Trung
                                                bình</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_6_3">
                                            <label class="custom-control-label"
                                                   for="increased_relationship_6_3">Nhẹ</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_6_4">
                                            <label class="custom-control-label"
                                                   for="increased_relationship_6_4">Nặng</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ir-r-7 mb-5">
                                <div class="title font-weight-bold mb-10">7. Mức độ thưa kẽ:</div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_7_1">
                                            <label class="custom-control-label" for="increased_relationship_7_1">Không
                                                có</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_7_2">
                                            <label class="custom-control-label" for="increased_relationship_7_2">Trung
                                                bình</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_7_3">
                                            <label class="custom-control-label"
                                                   for="increased_relationship_7_3">Nhẹ</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox mb-5">
                                            <input name="increased_relationship[]" value="1" type="checkbox"
                                                   class="custom-control-input" id="increased_relationship_7_4">
                                            <label class="custom-control-label"
                                                   for="increased_relationship_7_4">Nặng</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ir-r-8 mb-5">
                                <div class="title font-weight-bold mb-10">8. Cười hở nướu:</div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="increased_relationship[]" value="1" type="checkbox"
                                           class="custom-control-input" id="increased_relationship_8_1">
                                    <label class="custom-control-label" for="increased_relationship_8_1">Có</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="increased_relationship[]" value="1" type="checkbox"
                                           class="custom-control-input" id="increased_relationship_8_2">
                                    <label class="custom-control-label" for="increased_relationship_8_2">Không</label>
                                </div>
                            </div>

                            <div class="ir-r-9 mb-5">
                                <div class="title font-weight-bold mb-10">9. Có mất răng:</div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="increased_relationship[]" value="1" type="checkbox"
                                           class="custom-control-input" id="increased_relationship_9_1">
                                    <label class="custom-control-label" for="increased_relationship_9_1">Có (Cụ thể răng
                                        nào?)</label>
                                </div>
                                <div class="mb-5">…………………………………………………………………………………………..………………………………………………………………………………
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="increased_relationship[]" value="1" type="checkbox"
                                           class="custom-control-input" id="increased_relationship_9_2">
                                    <label class="custom-control-label" for="increased_relationship_9_2">Không</label>
                                </div>
                            </div>

                            <div class="ir-r-10 mb-5">
                                <div class="title font-weight-bold mb-10">10. Cắn chéo do răng:</div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="increased_relationship[]" value="1" type="checkbox"
                                           class="custom-control-input" id="increased_relationship_10_1">
                                    <label class="custom-control-label" for="increased_relationship_10_1">Có</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="increased_relationship[]" value="1" type="checkbox"
                                           class="custom-control-input" id="increased_relationship_10_2">
                                    <label class="custom-control-label" for="increased_relationship_10_2">Không</label>
                                </div>
                            </div>

                            <div class="ir-r-11 mb-5">
                                <div class="title font-weight-bold mb-10">11. Cant (nghiêng) mặt phẳng nhai:</div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="increased_relationship[]" value="1" type="checkbox"
                                           class="custom-control-input" id="increased_relationship_11_1">
                                    <label class="custom-control-label" for="increased_relationship_11_1">Có</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-5">
                                    <input name="increased_relationship[]" value="1" type="checkbox"
                                           class="custom-control-input" id="increased_relationship_11_2">
                                    <label class="custom-control-label" for="increased_relationship_11_2">Không</label>
                                </div>
                            </div>

                            <div class="ir-r-12 mb-5">
                                <div class="title font-weight-bold mb-10">12. Khoảng cách răng cửa dưới tới đường APo:
                                    <span class="font-weight-normal">.…………………………………………………………………………………mm</span>
                                </div>
                            </div>

                            <div class="ir-r-13 mb-5">
                                <div class="title font-weight-bold mb-10">13. Góc IMPA:
                                    <span class="font-weight-normal">:.…………………………………………………………………………………………………………………………………………………………độ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-2 mb-10">
                <div class="col-12">
                    <div class="tdh-problem">
                        <div class="tdh-title font-weight-bold font-16 mb-10">V. VẤN ĐỀ KHỚP THÁI DƯƠNG HÀM</div>
                        <div class="tdh-content">
                            <div class="custom-control custom-checkbox mb-5">
                                <input name="tdh_problem[]" value="1" type="checkbox"
                                       class="custom-control-input" id="tdh_problem_1">
                                <label class="custom-control-label" for="tdh_problem_1">Có (Cụ thể vấn đề)</label>
                            </div>
                            <div class="mb-5">
                                .………………………………………………………………………………………………………………………………………………………………………………………………
                                .………………………………………………………………………………………………………………………………………………………………………………………………
                                .………………………………………………………………………………………………………………………………………………………………………………………………
                                .………………………………………………………………………………………………………………………………………………………………………………………………
                            </div>
                            <div class="custom-control custom-checkbox mb-5">
                                <input name="increased_relationship[]" value="1" type="checkbox"
                                       class="custom-control-input" id="tdh_problem_2">
                                <label class="custom-control-label" for="tdh_problem_2">Không</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #page-3 -->


    <!-- #page-4 -->
    <div id="page-4" class="page">
        <div class="page-content">
            <div class="row row-1 mb-10">
                <div class="col-12">
                    <div class="tdh-problem">
                        <div class="tdh-content">
                            <div class="mb-5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-2 mb-10">
                <div class="col-12">
                    <div class="problem-list">
                        <div class="pl-title font-weight-bold font-16 mb-10">*DANH SÁCH VẤN ĐỀ</div>
                        <div class="pl-content">
                            <div class="row mb-20">
                                <div class="col-6">
                                    .…………………………………………………………………………………………………………………………………………………………………………………….
                                    .…………………………………………………………………………………………………………………………………………………………………………………….
                                    .…………………………………………………………………………………………………………………………………………………………………………………….
                                </div>
                                <div class="col-6">
                                    .…………………………………………………………………………………………………………………………………………………………………………………….
                                    .…………………………………………………………………………………………………………………………………………………………………………………….
                                    .…………………………………………………………………………………………………………………………………………………………………………………….
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="treatment-objectives">
                        <div class="to-title font-weight-bold font-16 mb-10">*MỤC TIÊU ĐIỀU TRỊ</div>
                        <div class="to-content">
                            <div class="row mb-20">
                                <div class="col-12">
                                    .………………………………………………………………………………………………………………………………………………………………………………………………
                                    .………………………………………………………………………………………………………………………………………………………………………………………………
                                    .………………………………………………………………………………………………………………………………………………………………………………………………
                                    .………………………………………………………………………………………………………………………………………………………………………………………………
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="treatment-plant">
                        <div class="tp-title font-weight-bold font-16 mb-10">*KẾ HOẠCH ĐIỀU TRỊ</div>
                        <div class="tp-content">
                            <div class="row mb-20">
                                <div class="col-12">
                                    .………………………………………………………………………………………………………………………………………………………………………………………………
                                    .………………………………………………………………………………………………………………………………………………………………………………………………
                                    .………………………………………………………………………………………………………………………………………………………………………………………………
                                    .………………………………………………………………………………………………………………………………………………………………………………………………
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-3 mb-40">
                <div class="col-12">
                    <p class="mb-5">Tôi đồng ý với lộ trình Bác sĩ đưa ra và cam kết thực hiện theo đúng lộ trình.</p>
                    <p>Nếu không, tôi xin tự chịu trách nhiệm về những vấn đề phát sinh.</p>
                </div>
            </div>

            <div class="row row-4">
                <div class="col-6 text-center">
                    <div class="signature doctor-signature">
                        <div style="height: 28px;"></div>
                        <div>BÁC SĨ</div>
                        <div class="si-note">(Ký và ghi rõ họ tên)</div>
                    </div>
                </div>
                <div class="col-6 text-center">
                    <div style="margin-bottom: 7px;">Ngày ___ tháng ___ năm _______ </div>
                    <div>KHÁCH HÀNG</div>
                    <div>(Ký và ghi rõ họ tên)</div>
                </div>
            </div>
        </div>
    </div>
    <!-- #page-4 -->
</div>
