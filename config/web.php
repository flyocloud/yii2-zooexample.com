<?php

return [
    'id' => 'basic-web',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => '!*t63Ch@M_.nxN*tNpHtpkdjYkN-R_.XA*yrpFcqmfTFc9ZXv_jJmm9*MW8s_JC9',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
        ],
    ],
    'modules' => [
        'flyo' => [
            'class' => \Flyo\Yii\Module::class,
            'token' => '__ADD_YOUR_TOKEN_HERE__',
        ],
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*'],
        ],
    ],
    'bootstrap' => ['debug', 'flyo'],
];