<?php

define('VERSION', 'V1.33');
define('LOGIN_VERSION', 'v2.4');
Yii::setAlias('@moduleBackend', realpath(__DIR__ . '/../backend/modules/'));
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/../backend/modules/api');
//Yii::setAlias('modava/auth', dirname(dirname(__DIR__)) . '/backend/modules/auth/src');
Yii::setAlias('modava/contact', dirname(dirname(__DIR__)) . '/backend/modules/contact/src');
Yii::setAlias('modava/article', dirname(dirname(__DIR__)) . '/backend/modules/article/src');
Yii::setAlias('modava/product', dirname(dirname(__DIR__)) . '/backend/modules/product/src');