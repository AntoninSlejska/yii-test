<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'Europe/Berlin',
    'bootstrap' => ['log'],
    'aliases' => [
      '@uploadedfilesdir' => '@app/uploads'
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9rIqFR8RbL72puoOOLLEhVqNVL8lF044',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [

          'enablePrettyUrl' => true,
          'showScriptName' => false,
          'rules' => [
            ['class' => 'app\components\NewsUrlRule',],
            'news/<year:\d{4}>/items-list' => 'news/items-list',
            [
              'pattern' => 'news/<category:\w+>/items-list',
              'route' => 'news/items-list',
              'defaults' => ['category' => 'shopping'],
            ],
            [
              'pattern' => '<lang:\w+>/<controller>/<action>',
              'route' => '<controller>/<action>',
            ],
          ],
        ],
    ],
    'modules' => [
      'utility' => [
        'class' => 'c006\utility\migration\Module',
      ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
