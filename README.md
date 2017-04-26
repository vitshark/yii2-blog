# yii2-blog
Проект для блога с админкой
Используется проект Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

Добавил шаблон для админки AdminLTE https://almsaeedstudio.com/themes/AdminLTE/index2.html
Скачать можно вот поэтому адресу https://almsaeedstudio.com/
ссылка для скачивания https://almsaeedstudio.com/download/AdminLTE-master
Здесь ожно посмотреть как его накатить на свой проект https://www.youtube.com/watch?v=j2B4ucPIVvQ
В своем проекте я шаблон поместил в папку backend/theme

Пользователи.
Добавлю в свой проект расширение для пользователей http://krivochenko.ru/blog/post/using-yii2-users
Очень удобное, без всяких излишеств.
================================================================================================
Установка и настройка
Устанавливается расширение через Composer. Выполните команду:

php composer.phar require --prefer-dist budyaga/yii2-users "*"

или добавьте следующий код в секцию require файла composer.json вашего приложения и выполните команду composer update

"budyaga/yii2-users": "*"

Настройка
'components' => [
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
    'urlManager' => [
        'enablePrettyUrl' => true,
        'showScriptName' => false,
        'rules' => [
            '/signup' => '/user/user/signup',
            '/login' => '/user/user/login',
            '/logout' => '/user/user/logout',
            '/requestPasswordReset' => '/user/user/request-password-reset',
            '/resetPassword' => '/user/user/reset-password',
            '/profile' => '/user/user/profile',
            '/retryConfirmEmail' => '/user/user/retry-confirm-email',
            '/confirmEmail' => '/user/user/confirm-email',
            '/unbind/<id:[\w\-]+>' => '/user/auth/unbind',
            '/oauth/<authclient:[\w\-]+>' => '/user/auth/index'
        ],
    ],
    'authManager' => [
        'class' => 'yii\rbac\DbManager',
    ],
],
'modules' => [
    'user' => [
        'class' => 'budyaga\users\Module',
        'userPhotoUrl' => 'http://example.com/uploads/user/photo',
        'userPhotoPath' => '@frontend/web/uploads/user/photo'
    ],
],

Миграция базы данных
После настройки компонентов можно выполнить миграцию базы данных, которая входит в комплект расширения:

yii migrate/up --migrationPath=@vendor/budyaga/yii2-users/migrations

После всех эти действий на сайте будут доступны следующие страницы:

Регистрация: http://example.com/signup

Редактирование профиля: http://example.com/profile

Восстаровление пароля: http://example.com/requestPasswordReset

Управление пользователями: http://example.com/user/admin

Управление иерархией RBAC: http://example.com/user/rbac

Эти же страницы будут доступны на домене backend-приложения.

Чтобы добавить на все страницы сайта виджет авторизации, используйте следующий код:

use budyaga\users\components\AuthorizationWidget;
<?= AuthorizationWidget::widget() ?>
=================================================================
Более подробно можете глянуть на самом сайте. http://krivochenko.ru/blog/post/using-yii2-users


