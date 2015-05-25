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
        'modularityService' => [
            'class' => 'source\modules\modularity\ModularitySerivce',
        ],
    ],
];
