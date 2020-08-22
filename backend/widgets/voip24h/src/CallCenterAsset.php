<?php

namespace modava\voip24h;

use yii\web\JqueryAsset;

class CallCenterAsset extends JqueryAsset
{
    public $sourcePath = '@modava/voip24h/assets';

    public $css = [
        'voip24h/css/main.css',
    ];

    public $js = [
        'voip24h/js/sip.js',
        'voip24h/js/moment.min.js',
        'voip24h/js/VoipSIP.js',
        'voip24h/js/custom.js'
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

    public $depends = [
        JqueryAsset::class
    ];
}