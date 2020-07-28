<?php
use yii\helpers\Url;
use modava\affiliate\AffiliateModule;

// Define route info
$routeInfos = [
    [
        'module' => 'affiliate',
        'controllerId' => 'customer',
        'label' => AffiliateModule::t('affiliate', 'Customer'),
        'icon' => '<i class="ion ion-md-contacts"></i>',
    ],
    [
        'module' => 'affiliate',
        'controllerId' => 'coupon-type',
        'label' => AffiliateModule::t('affiliate', 'Coupon Type'),
        'icon' => '<i class="ion ion-md-analytics"></i>',
    ],
    [
        'module' => 'affiliate',
        'controllerId' => 'coupon',
        'label' => 'Coupon',
        'icon' => '<i class="icon dripicons-ticket"></i>',
    ],
];
?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php foreach($routeInfos as $routeInfo): ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == $routeInfo['controllerId']) echo ' active' ?>"
               href="<?= Url::toRoute(["/{$routeInfo['module']}/{$routeInfo['controllerId']}"]); ?>">
                <?= $routeInfo['icon'] . AffiliateModule::t($routeInfo['module'], $routeInfo['label']); ?>
            </a>
        </li>
    <?php endforeach;?>
</ul>
