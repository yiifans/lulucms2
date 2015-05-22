<?php
$params = array_merge(
    require(__DIR__ . '/../../source/config/params.php'),
    require(__DIR__ . '/../../source/config/params-local.php'),
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
            'errorAction' => 'admin/error',
        ],
        'view' => [
        	'class' => 'source\core\back\BaseBackView',
        ],
        
        
    ],
    'modules' => [
// 	    'comment' => [
// 	    	'class' => 'source\modules\comment\AdminModule',
// 	    ],
// 	    'post' => [
// 	    	'class' => 'source\modules\post\AdminModule',
// 	    ],
// 	     'page' => [
// 	    	'class' => 'source\modules\page\AdminModule',
// 	    ],
// 	    'takonomy' => [
// 	    	'class' => 'source\modules\takonomy\AdminModule',
// 	    ],
        'menu' => [
            'class' => 'source\modules\menu\AdminModule',
        ],
	    'system' => [
	    	'class' => 'source\modules\system\AdminModule',
	    ],
        'modularity' => [
            'class' => 'source\modules\modularity\AdminModule',
        ],
    ],
    'params' => $params,
];
