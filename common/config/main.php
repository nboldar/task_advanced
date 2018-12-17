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
//        'errorHandler' => [
//            'maxSourceLines' => 30,
//            'errorAction' => 'site/error',
//        ],
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
               //'<module:rbac>/<controller:[\wd-]+>/<action:[\wd-]+>/<id:\d+>' => '<module>/<controller>/<action>',
                '/' => 'site/index',
                '/rbac'=>'rbac/default/index',
                '/project/task' => 'task/index',
                '/user' => 'user/index',
                '/projects' => 'projects/index',
                '/telegram' => 'telegram/index',
                '/task' => 'task/index',
                '/team'=>'team/index',
                '/user-team'=>'user-team/index',
                '/user-team/index'=>'/user-team',
                '/user-team/create'=>'user-team/create',
                '/user-team/view'=>'user-team/view',
                '/user-team/update'=>'user-team/update',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',


            ],
        ],
    ],
];
