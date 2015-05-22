<?php
$params = array_merge(
    require(__DIR__ . '/../../source/config/params.php'),
    require(__DIR__ . '/../../source/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'language' => 'zh-CN',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
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
        'view' => [
	        'class' => 'source\core\front\BaseFrontView',
        ],
        
    ],
    'modules' => [
// 	    'comment' => [
// 	    	'class' => 'source\modules\comment\HomeModule',
// 	    ],
// 	    'post' => [
// 	    	'class' => 'source\modules\post\HomeModule',
// 	    ],
// 	    'page' => [
// 	    	'class' => 'source\modules\page\HomeModule',
// 	    ],
// 	    'takonomy' => [
// 	    	'class' => 'source\modules\takonomy\HomeModule',
// 	    ],
// 	    'menu' => [
// 	    	'class' => 'source\modules\menu\HomeModule',
// 	    ],
    ],
    'params' => $params,
];
