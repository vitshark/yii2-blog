<?php

return [
    'name' => 'yii2-blog',
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'defaultRoute' => 'site/index',
    'timeZone' => 'Asia/Almaty',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6Lf5kB8UAAAAAHibPWneYpgL85A_ppFhtrYB-lDG',
            'secret' => '6Lf5kB8UAAAAAFMXr1t_PVwYn933rdT-rv8W1z7p',
        ],
    ],
];
