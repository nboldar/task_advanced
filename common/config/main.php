<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'bootstrap' => ['bootstrap'],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'bootstrap' => [
            'class' => \common\components\Bootstrap::className(),
        ],
        'errorHandler' => [
            'maxSourceLines' => 20,
        ],
        'bot' => [
            'class' => 'SonkoDmitry\Yii\TelegramBot\Component',
            'apiToken' => '799805964:AAEQyPmfLUIkQDGsvFZtw8yDzQPUG5Yy2UA',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                [
                    'class' => \yii\rest\UrlRule::className(),
                    'controller' => 'api/task',
                    'pluralize' => false,
                ],
                '/' => 'site/index',
                '/project/task' => 'task/index',
                '/user' => 'user/index',
                '/projects' => 'projects/index',
                '/telegram' => 'telegram/index',
                '/task' => 'task/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
    ],
];
