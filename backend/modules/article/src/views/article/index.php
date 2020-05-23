<?php

use modava\article\ArticleModule;
use modava\article\widgets\NavbarWidgets;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel modava\article\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ArticleModule::t('article', 'Article');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?= NavbarWidgets::widget(); ?>

    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span
                        class="ion ion-md-apps"></span></span><?= Html::encode($this->title) ?>
        </h4>
        <a class="btn btn-outline-light" href="<?= \yii\helpers\Url::to(['create']); ?>"
           title="<?= ArticleModule::t('article', 'Create'); ?>">
            <i class="fa fa-plus"></i> <?= ArticleModule::t('article', 'Create'); ?>
        </a>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">

                <?php Pjax::begin(); ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="dataTables_wrapper dt-bootstrap4">

                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'layout' => '
                                    {errors}
                                    <div class="row">
                                        <div class="col-sm-12">
                                            {items}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" role="status" aria-live="polite">
                                                {pager}
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers">
                                                {summary}
                                            </div>
                                        </div>
                                    </div>
                                ',
                                    'pager' => [
                                        'firstPageLabel' => ArticleModule::t('article', 'First'),
                                        'lastPageLabel' => ArticleModule::t('article', 'Last'),
                                        'prevPageLabel' => ArticleModule::t('article', 'Previous'),
                                        'nextPageLabel' => ArticleModule::t('article', 'Next'),
                                        'maxButtonCount' => 5,

                                        'options' => [
                                            'tag' => 'ul',
                                            'class' => 'pagination',
                                        ],

                                        // Customzing CSS class for pager link
                                        'linkOptions' => ['class' => 'page-link'],
                                        'activePageCssClass' => 'active',
                                        'disabledPageCssClass' => 'disabled page-disabled',
                                        'pageCssClass' => 'page-item',

                                        // Customzing CSS class for navigating link
                                        'prevPageCssClass' => 'paginate_button page-item',
                                        'nextPageCssClass' => 'paginate_button page-item',
                                        'firstPageCssClass' => 'paginate_button page-item',
                                        'lastPageCssClass' => 'paginate_button page-item',
                                    ],
                                    'columns' => [
                                        [
                                            'class' => 'yii\grid\SerialColumn',
                                            'header' => 'STT',
                                            'headerOptions' => [
                                                'width' => 50,
                                            ],
                                        ],
                                        [
                                            'attribute' => 'image',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                return Html::img($model->image, ['height' => 50, 'width' => 50]);
                                            },
                                            'headerOptions' => [
                                                'width' => 110,
                                            ],
                                        ],
                                        'title',
                                        [
                                            'attribute' => 'category_id',
                                            'value' => 'category.title',
                                            'label' => 'Danh mục',
                                        ],
                                        [
                                            'attribute' => 'status',
                                            'value' => function ($model) {
                                                return Yii::$app->getModule('article')->params['status'][$model->status];
                                            },
                                            'headerOptions' => [
                                                'width' => 130,
                                            ],
                                        ],
                                        [
                                            'attribute' => 'type_id',
                                            'value' => 'type.title',
                                            'label' => 'Thể loại',
                                        ],
                                        [
                                            'attribute' => 'language',
                                            'value' => function ($model) {
                                                return Yii::$app->getModule('article')->params['availableLocales'][$model->language];
                                            },
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
                                        ],
                                        //'description',
                                        //'content:ntext',
                                        //'position',
                                        //'ads_pixel:ntext',
                                        //'ads_session:ntext',

                                        //'views',

                                        //'updated_at',
                                        [
                                            'attribute' => 'created_by',
                                            'value' => 'userCreated.userProfile.fullname',
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
                                        ],
                                        [
                                            'attribute' => 'created_at',
                                            'format' => 'date',
                                            'headerOptions' => [
                                                'width' => 150,
                                            ],
                                        ],
                                        //'updated_by',
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'header' => ArticleModule::t('article', 'Actions'),
                                            'headerOptions' => [
                                                'width' => 130,
                                            ],
                                        ],
                                    ],
                                ]); ?>

                            </div>
                        </div>
                    </div>
                </div>

                <?php Pjax::end(); ?>
            </section>
        </div>
    </div>

</div>