<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$helpers = require __DIR__ . '/helpers.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module',
            // other module settings
        ]
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '_2467ObVG3vzepfQFwAPXz8HlMyaOe8_',
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            'useFileTransport' => false, // set ke false agar benar-benar dikirim
            'transport' => [
                'dsn' => 'smtp://sosialmenyapa@gmail.com:qgeqkiwhtgsbexrc@smtp.gmail.com:587',
            ],
        ],
        // 'mailer' => [
        //     'class' => \yii\symfonymailer\Mailer::class,
        //     'viewPath' => '@app/mail',
        //     // send all mails to a file by default.
        //     'useFileTransport' => true,
        // ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        // 'view' => [
        //     'theme' => [
        //         'pathMap' => [
        //             '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
        //         ],
        //     ],
        // ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        // 'urlManager' => [
        //     'enablePrettyUrl' => true,
        //     'showScriptName' => false,
        //     'rules' => [
        //         'ppks/get-kota/<id:\d+>' => 'ppks/get-kota',
        //         'ppks/get-kecamatan/<id:\d+>' => 'ppks/get-kecamatan',
        //         'ppks/get-kelurahan/<id:\d+>' => 'ppks/get-kelurahan',
        //     ],
        // ],
    //     'mailer' => [
    //     'class' => 'yii\swiftmailer\Mailer',
    //     'useFileTransport' => false,
    //     'transport' => [
    //         'class' => 'Swift_SmtpTransport',
    //         'host' => 'smtp.gmail.com',
    //         'username' => 'emailkamu@gmail.com',
    //         'password' => 'app-password-yang-tadi', // password dari langkah 1B
    //         'port' => '587',
    //         'encryption' => 'tls',
    //     ],
    // ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    // $config['modules']['gii'] = [
    //     'class' => 'yii\gii\Module',
    //     // uncomment the following to add your IP if you are not connecting from localhost.
    //     //'allowedIPs' => ['127.0.0.1', '::1'],
    // ];
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [ // here
            'crud' => [ // generator name
                'class' => 'yii\gii\generators\crud\Generator', // generator class
                'templates' => [ // setting for our templates
                    'yii2-adminlte3' => '@vendor/hail812/yii2-adminlte3/src/gii/generators/crud/default' // template name => path to template
                ]
            ]
        ]
    ];
}

return $config;
