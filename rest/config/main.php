<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'rest-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => 'rest\versions\v1\RestModule'
        ],
        'v2' => [
            'class' => 'rest\versions\v2\RestModule'
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableSession' => false,
        ],
//        'mailer' => [
//            'class' => 'boundstate\mailgun\Mailer',
//            'key' => 'key-example',
//            'domain' => 'mg.example.com',
//        ],
        'response' => [
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/post', 'v1/comment', 'v2/post','v1/category','v1/customer','v1/order','v1/order_item','v1/publisher','v1/author','v1/book','v1/user','v1/rating']],
                'OPTIONS v1/user/login' => 'v1/user/login',
                'OPTIONS v2/user/login' => 'v2/user/login',
                'OPTIONS v1/user/register' => 'v1/user/register',
                'POST v1/user/register' => 'v1/user/register',
                'GET v1/user/validate/<token:>' => 'v1/user/validate',
                'OPTIONS v1/user/validate/<token:>' => 'v1/user/validate/options',
                'POST v1/user/login' => 'v1/user/login',
                'POST v2/user/login' => 'v2/user/login',
                'POST v1/user/password-reset' => 'v1/user/password-reset',
                'POST v1/user/generate-new-password/<token:>' => 'v1/user/generate-new-password',
                'POST v1/customer/addition' => 'v1/customer/addition',
                'POST v1/order/purchase' => 'v1/order/purchase',
                'POST v1/order/update-status' => 'v1/order/update-status',
                'POST v1/customer/discount' => 'v1/customer/discount',
                'POST v1/book/activity-discount' => 'v1/book/activity-discount',



            ],
        ],
    ],
    'params' => $params,
];
