<?php
$params = array_merge(
    require(__DIR__ . '/../../data/config/params.php'),
    require(__DIR__ . '/../../data/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-install',
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'install\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'source\models\User',
            'enableAutoLogin' => true,
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
//         'view' => [
// 	        'class' => 'source\core\front\FrontView',
//         ],
        
    ],
    'modules' => [
      
    ],
    'params' => $params,
];
