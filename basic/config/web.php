<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'de',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vSmmAsX04jtJ_Up8hW0cFNZVzrx24sJk',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'user' => [
        //     'identityClass' => 'app\models\User',
        //     'enableAutoLogin' => true,
        // ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
            // 'class' => 'yii\swiftmailer\Mailer',
            // 'viewPath' => '@app/mailer',
            // 'useFileTransport' => false,
            // 'transport' => [
            //   'class' => 'Swift_SmtpTransport',
            //   'host' => 'smtp.google.com',
            //   'username' => 'florian@slejska.eu',
            //   'password' => 'florian123',
            //   'port' => '587',
            //   'encryption' => 'tls',
            // ],
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
          'showScriptName' => false,
          'enablePrettyUrl' => true,
          'rules' => [
            'status' => 'status/index',
            'status/index' => 'status/index',
            'status/create' => 'status/create',
            'status/view/<id:\d+>' =>'status/view',
            'status/update/<id:\d+>' =>'status/update',
            'status/delete/<id:\d+>' =>'status/delete',
            'status/<slug>' => 'status/slug',
            'defaultRoute' => '/site/index',
            ]
        ],
        'i18n' => [
          'translations' => [
            'app*' => [
              'class' => 'yii\i18n\PhpMessageSource',
              'basePath' => '@app/i18n',
            ],
          ],
        ],
    ],
    'modules' => [
      'user' => [
        'class' => 'dektrium\user\Module',
        'enableUnconfirmedLogin' => true,
        'confirmWithin' => 21600,
        'cost' => 12,
        'modelMap' => [
          'User' => 'app\models\User',
        ],
        'admins' => ['admin'],
      ],
      'redactor' => 'yii\redactor\RedactorModule',
      'class' => 'yii\redactor\RedactorModule',
      'uploadDir' => '@webroot/uploads',
      'uploadUrl' => '/basic/uploads',
      'gridview' => [
          'class' => '\kartik\grid\Module',
      ],
      'datecontrol' =>  [
          'class' => 'kartik\datecontrol\Module',

            // format settings for displaying each date attribute
            'displaySettings' => [
                'date' => 'd-m-Y',
                'time' => 'H:i:s A',
                'datetime' => 'd-m-Y H:i:s A',
            ],

            // format settings for saving each date attribute
            'saveSettings' => [
                'date' => 'Y-m-d',
                'time' => 'H:i:s',
                'datetime' => 'Y-m-d H:i:s',
            ],

            // automatically use kartik\widgets for each of the above formats
            'autoWidget' => true,

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
    $config['modules']['gii']['generators'] = [
        'kartikgii-crud' => ['class' => 'warrence\kartikgii\crud\Generator'],
    ];
}

return $config;
