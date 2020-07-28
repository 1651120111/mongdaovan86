<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'WEB_NAME';
?>

    <!-- Begin Slider Area -->
    <?= \frontend\widgets\SliderWidget::widget()?>
    <!-- Slider Area End Here -->

    <!-- Begin Service Area -->
    <?= \frontend\widgets\ServiceWidget::widget() ?>
    <!-- Service Area End Here -->

    <!-- Begin Banner Area -->
    <?= \frontend\widgets\BannerTopWidget::widget()?>
    <!-- Banner Area End Here -->

    <!-- Begin Product Area -->
    <div class="product-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>New Product</h3>
                        <div class="product-arrow"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="kenne-element-carousel product-slider slider-nav" data-slick-options='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "infinite": false,
                        "arrows": true,
                        "dots": false,
                        "spaceBetween": 30,
                        "appendArrows": ".product-arrow"
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint":768, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":575, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>
                    <?php foreach ($data as $item){?>
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="<?= \yii\helpers\Url::toRoute(['/detail-product/','slug' => $item->pro_slug])?>">
                                        <img class="primary-img" src="<?= $item->pro_image ?>" alt="<?= $item->pro_slug ?>">
                                        <img class="secondary-img" src="<?= $item->pro_image ?>" alt="<?= $item->pro_slug ?>">
                                    </a>
                                    <span class="sticker-2">New</span>
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                            class="ion-ios-search"></i></a>
                                            </li>
                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                            </li>
                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                            </li>
                                            <li><a href="<?= '/cart/add-cart?slug='.$item->pro_slug ?>" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name"><a href="single-product.html"><?= $item->pro_name ?></a></h3>
                                        <div class="price-box">
                                            <span class="old-price"><?= number_format(($item->pro_price - ($item->pro_price*$item->pro_sale/100)),0,',','.' ) ?> đ</span>
                                            <span class="new-price"><?= number_format($item->pro_price,0,',','.' ) ?> đ</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php }?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->

    <!-- Begin Banner Area Two -->
    <?= \frontend\widgets\BannerWidget::widget()?>
    <!-- Banner Area Two End Here -->

    <!-- Begin Product Tab Area -->
    <div class="product-tab_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>All Product</h3>
                        <div class="product-tab">
                            <ul class="nav product-menu">
                                <li><a class="active" data-toggle="tab" href="#bag"><span>Balo</span></a>
                                </li>
                                <li><a data-toggle="tab" href="#plaid-shirts"><span>Áo sơ mi</span></a></li>
                                <li><a data-toggle="tab" href="#shoes"><span>Giày</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tab-content kenne-tab_content">
                        <div id="bag" class="tab-pane active show" role="tabpanel">
                            <div class="kenne-element-carousel product-tab_slider slider-nav product-tab_arrow" data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
                                    }' data-slick-responsive='[
                                    {"breakpoint":992, "settings": {
                                    "slidesToShow": 3
                                    }},
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 2
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                    }}
                                ]'>

                                <?php if (isset($proBags)){?>
                                <?php foreach ($proBags as $item){?>
                                        <div class="product-item">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="<?= \yii\helpers\Url::toRoute(['/detail-product/','slug' => $item->pro_slug])?>">
                                                        <img class="primary-img" src="<?= $item->pro_image ?>" alt="<?= $item->pro_slug ?>">
                                                        <img class="secondary-img" src="<?= $item->pro_image ?>" alt="<?= $item->pro_slug ?>">
                                                    </a>
                                                    <span class="sticker-2">New</span>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                                            class="ion-ios-search"></i></a>
                                                            </li>
                                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                            </li>
                                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                            </li>
                                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <h3 class="product-name"><a href="single-product.html"><?= $item->pro_name ?></a></h3>
                                                        <div class="price-box">
                                                            <span class="old-price"><?= number_format(($item->pro_price - ($item->pro_price*$item->pro_sale/100)),0,',','.' ) ?> đ</span>
                                                            <span class="new-price"><?= number_format($item->pro_price,0,',','.' ) ?> đ</span>
                                                        </div>
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php } }?>


                            </div>
                        </div>
                        <div id="plaid-shirts" class="tab-pane" role="tabpanel">
                            <div class="kenne-element-carousel product-tab_slider slider-nav product-tab_arrow" data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
                                    }' data-slick-responsive='[
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 1
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                    }}
                                ]'>

                                <?php if (isset($proShirts)){?>
                                    <?php foreach ($proShirts as $item){?>
                                        <div class="product-item">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="<?= \yii\helpers\Url::toRoute(['/detail-product/','slug' => $item->pro_slug])?>">
                                                        <img class="primary-img" src="<?= $item->pro_image ?>" alt="<?= $item->pro_slug ?>">
                                                        <img class="secondary-img" src="<?= $item->pro_image ?>" alt="<?= $item->pro_slug ?>">
                                                    </a>
                                                    <span class="sticker-2">New</span>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                                            class="ion-ios-search"></i></a>
                                                            </li>
                                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                            </li>
                                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                            </li>
                                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <h3 class="product-name"><a href="single-product.html"><?= $item->pro_name ?></a></h3>
                                                        <div class="price-box">
                                                            <span class="old-price"><?= number_format(($item->pro_price - ($item->pro_price*$item->pro_sale/100)),0,',','.' ) ?> đ</span>
                                                            <span class="new-price"><?= number_format($item->pro_price,0,',','.' ) ?> đ</span>
                                                        </div>
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }?>

                            </div>
                        </div>
                        <div id="shoes" class="tab-pane" role="tabpanel">
                            <div class="kenne-element-carousel product-tab_slider slider-nav product-tab_arrow" data-slick-options='{
                                    "slidesToShow": 4,
                                    "slidesToScroll": 1,
                                    "infinite": false,
                                    "arrows": true,
                                    "dots": false,
                                    "spaceBetween": 30
                                    }' data-slick-responsive='[
                                    {"breakpoint":768, "settings": {
                                    "slidesToShow": 1
                                    }},
                                    {"breakpoint":575, "settings": {
                                    "slidesToShow": 1
                                    }}
                                ]'>

                                <?php if (isset($proShoes)){?>
                                    <?php foreach ($proShoes as $item){?>
                                        <div class="product-item">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="<?= \yii\helpers\Url::toRoute(['/detail-product/','slug' => $item->pro_slug])?>">
                                                        <img class="primary-img" src="<?= $item->pro_image ?>" alt="<?= $item->pro_slug ?>">
                                                        <img class="secondary-img" src="<?= $item->pro_image ?>" alt="<?= $item->pro_slug ?>">
                                                    </a>
                                                    <span class="sticker-2">New</span>
                                                    <div class="add-actions">
                                                        <ul>
                                                            <li class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                                            class="ion-ios-search"></i></a>
                                                            </li>
                                                            <li><a href="wishlist.html" data-toggle="tooltip" data-placement="right" title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                                            </li>
                                                            <li><a href="compare.html" data-toggle="tooltip" data-placement="right" title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                                            </li>
                                                            <li><a href="cart.html" data-toggle="tooltip" data-placement="right" title="Add To cart"><i class="ion-bag"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-desc_info">
                                                        <h3 class="product-name"><a href="single-product.html"><?= $item->pro_name ?></a></h3>
                                                        <div class="price-box">
                                                            <span class="old-price"><?= number_format(($item->pro_price - ($item->pro_price*$item->pro_sale/100)),0,',','.' ) ?> đ</span>
                                                            <span class="new-price"><?= number_format($item->pro_price,0,',','.' ) ?> đ</span>
                                                        </div>
                                                        <div class="rating-box">
                                                            <ul>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li><i class="ion-ios-star"></i></li>
                                                                <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                                <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Tab Area End Here -->

    <!-- Begin Latest Blog Area -->
    <div class="latest-blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Latest <span>Blog</span></h3>
                        <div class="latest-blog_arrow"></div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="kenne-element-carousel latest-blog_slider slider-nav" data-slick-options='{
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": true,
                        "dots": false,
                        "spaceBetween": 30,
                        "appendArrows": ".latest-blog_arrow"
                        }' data-slick-responsive='[
                        {"breakpoint":992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint":768, "settings": {
                        "slidesToShow": 1
                        }}
                    ]'>

                        <div class="blog-item">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details.html">
                                    <img src="/images/blog/1.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details.html">
                                    <img src="/images/blog/2.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details.html">
                                    <img src="/images/blog/3.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <div class="blog-img img-hover_effect">
                                <a href="blog-details.html">
                                    <img src="/images/blog/1.jpg" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h3 class="heading">
                                    <a href="blog-details.html">When an unknown printer took a galley of type.</a>
                                </h3>
                                <p class="short-desc">
                                    The first line of lorem Ipsum: "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                </p>
                                <div class="blog-meta">
                                    <ul>
                                        <li>Oct.20.2019</li>
                                        <li>
                                            <a href="javascript:void(0)">02 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Blog Area End Here -->

    <!-- Begin Kenne's Banner Area Four -->
    <div class="kenne-banner_area kenne-banner_area-4">
        <div class="banner-img"></div>
        <div class="banner-content">
            <h3>Sản phẩm độc quyền</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
            <div class="contact-us">
                <a href="callto://+123123321345">(+123) 123 321 345</a>
            </div>
            <div class="kenne-btn-ps_center">
                <a class="kenne-btn transparent-btn" href="shop-left-sidebar.html">Shop Now</a>
            </div>
        </div>
    </div>
    <!-- Kenne's Banner Area Four End Here -->










