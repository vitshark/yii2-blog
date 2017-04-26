<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'user' => [
        'identityClass' => 'budyaga\users\models\User',
        'enableAutoLogin' => true,
        'loginUrl' => ['/login'],
    ],
        'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'vkontakte' => [
                'class' => 'budyaga\users\components\oauth\VKontakte',
                'clientId' => 'XXX',
                'clientSecret' => 'XXX',
                'scope' => 'email'
            ],
            'google' => [
                'class' => 'budyaga\users\components\oauth\Google',
                'clientId' => 'XXX',
                'clientSecret' => 'XXX',
            ],
            'facebook' => [
                'class' => 'budyaga\users\components\oauth\Facebook',
                'clientId' => 'XXX',
                'clientSecret' => 'XXX',
            ],
            'github' => [
                'class' => 'budyaga\users\components\oauth\GitHub',
                'clientId' => 'XXX',
                'clientSecret' => 'XXX',
                'scope' => 'user:email, user'
            ],
            'linkedin' => [
                'class' => 'budyaga\users\components\oauth\LinkedIn',
                'clientId' => 'XXX',
                'clientSecret' => 'XXX',
            ],
            'live' => [
                'class' => 'budyaga\users\components\oauth\Live',
                'clientId' => 'XXX',
                'clientSecret' => 'XXX',
            ],
            'yandex' => [
                'class' => 'budyaga\users\components\oauth\Yandex',
                'clientId' => 'XXX',
                'clientSecret' => 'XXX',
            ],
            'twitter' => [
                'class' => 'budyaga\users\components\oauth\Twitter',
                'consumerKey' => 'XXX',
                'consumerSecret' => 'XXX',
            ],
        ],
    ],
        /*
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
         * 
         */
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'user/site/captcha'=>'site/captcha',
                '/signup' => '/user/user/signup',
            '/login' => '/user/user/login',
            '/logout' => '/user/user/logout',
            '/requestPasswordReset' => '/user/user/request-password-reset',
            '/resetPassword' => '/user/user/reset-password',
            '/profile' => '/user/user/profile',
            '/retryConfirmEmail' => '/user/user/retry-confirm-email',
            '/confirmEmail' => '/user/user/confirm-email',
            '/unbind/<id:[\w\-]+>' => '/user/auth/unbind',
            '/oauth/<authclient:[\w\-]+>' => '/user/auth/index',
                '' => 'site/index',
                '<_a:(login)>' => 'site/<_a>',
                '<_m>/<_c>/<_a>' => '<_m>/<_c>/<_a>',
                '<_m>/<_c>' => '<_m>/<_c>',
                '<_m>' => '<_m>',
            ],
        ],
        'authManager' => [
        'class' => 'yii\rbac\DbManager',
    ],
    ],
    'modules' => [
    'user' => [
        'class' => 'budyaga\users\Module',
        'userPhotoUrl' => 'http://yii2-blog:82/uploads/user/photo',
        'userPhotoPath' => '@frontend/web/uploads/user/photo'
    ],
],
    'params' => $params,
];
