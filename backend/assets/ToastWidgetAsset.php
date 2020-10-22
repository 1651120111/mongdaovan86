<?php

namespace backend\assets;

use yii\web\AssetBundle;

class ToastWidgetAsset extends AssetBundle
{
    public $sourcePath = '@modava-assets';

    public $css = [
        'vendors/jquery-toast-plugin/dist/jquery.toast.min.css',
    ];

    public $js = [
        'vendors/jquery-toast-plugin/dist/jquery.toast.min.js',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
