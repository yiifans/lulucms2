<?php


return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
	  	'assetManager' => [
			'basePath' => '@webroot/static/assets',
			'baseUrl'=>'@web/static/assets',
	      		'bundles' => [
	          	// you can override AssetBundle configs here
	      	],
	      	//'linkAssets' => true,
	      	// ...
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
        'modularityService' => [
            'class' => 'source\modules\modularity\ModularitySerivce',
        ],
    ],
];
