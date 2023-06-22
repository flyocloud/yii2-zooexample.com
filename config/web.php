<?php

return [
    'id' => 'flyo-nitro-example',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => '!*t63Ch@M_.nxN*tNpHtpkdjYkN-R_.XA*yrpFcqmfTFc9ZXv_jJmm9*MW8s_JC9',
            'scriptUrl' => 'index.php',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@app/cache'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'rules' => [
                'sitemap' => 'site/sitemap',
                'search' => 'site/search',
            ],
        ],
    ],
    'modules' => [
        'flyo' => [
            'class' => \Flyo\Yii\Module::class,
            'token' => YII_ENV_PROD ? '__PROD_TOKEN__' : '__DEV_TOKEN__', // @phpstan-ignore-line
        ],
        /*
        'debug' => [
            'class' => 'yii\debug\Module',
            'allowedIPs' => ['*'],
        ],
        */
    ],
    'bootstrap' => [/*'debug', */'flyo'],
];
