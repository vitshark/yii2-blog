<?php
return [
    'language'=>'ru-RU',
    'sourceLanguage'=>'ru-RU',
    'defaultRoute'=>'site/index',  
    'timeZone' => 'Asia/Almaty',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        
        'cache' => [
            'class' => 'yii\caching\FileCache', 
        ],
    ],
];
