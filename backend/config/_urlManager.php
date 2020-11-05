<?php
return [
    'class' => yii\web\UrlManager::class,
    'enablePrettyUrl' => true,
//    'enableStrictParsing' => true,
    'showScriptName' => false,
    'rules' => [
        ['pattern' => 'auth/login', 'route' => 'auth/auth/login', 'suffix' => '.html'],
        ['pattern' => 'auth/reset-password', 'route' => 'auth/auth/reset-password', 'suffix' => ''],
        ['pattern' => 'auth/logout', 'route' => 'auth/auth/logout', 'suffix' => '.html'],
    ],
];
