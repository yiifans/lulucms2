<?php

date_default_timezone_set('PRC');

$db = require(__DIR__ . '/db.php');

return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'runtimePath'  => dirname(dirname(__DIR__)) . '/data/runtime',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath'=>'@data/cache',
        ],
        'schemaCache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath'=>'@data/cache',
            'keyPrefix'=>'scheme_'
        ],
        'security' => [
            'class' => 'source\core\base\Security',
        ],
	  	'assetManager' => [
			'basePath' => '@webroot/statics/assets',
			'baseUrl'=>'@web/statics/assets',
	      		'bundles' => [
	      		    'yii\web\JqueryAsset'=>[
	      		        'js'=>[]
	      		    ],
	          	// you can override AssetBundle configs here
	      	],
	      	//'linkAssets' => true,
	      	// ...
	   ],
        'urlManager' =>[
            'class'=>'source\core\base\UrlManager',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.sina.com',			//使用163邮箱
                'username' => 'xxx@sina.com',	//你的163的帐号
                'password' => "xxx",				//你的163的密码
                'port' => '25',
                //'port'=>'465',
                //'encryption' => 'ssl',
            ],
            	
            'useFileTransport' => false,
            'messageConfig' => [
                'from' => ['xxx@sina.com' => 'Admin'],
                'charset' => 'UTF-8',
            ],
        ],
        'db' => $db,
        'log' => [
            'targets' => [
                'file' => [
                    'class' => 'source\modules\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    //'categories' => ['yii\'],
                  ],
               
              ],
          ],
        'modularityService' => [
            'class' => 'source\modules\modularity\ModularityService',
        ],
    ],
];
