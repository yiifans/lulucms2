<?php
$params = array_merge(
    require(__DIR__ . '/../../data/config/params.php'),
    require(__DIR__ . '/../../data/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'source\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['admin/login'],
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
        'view' => [
        	'class' => 'source\core\back\BackView',
        ],
        'request'=>[
            'class' => 'yii\web\Request',
            'enableCsrfValidation'=>false,
        ]
        
    ],
    'modules' => [
    ],
    'params' => $params,
];
