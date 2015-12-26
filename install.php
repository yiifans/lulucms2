<?php

use yii\web\Application;
use source\libs\Common;

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require (__DIR__ . '/vendor/autoload.php');
require (__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

require (__DIR__ . '/source/override.php');

require (__DIR__ . '/data/config/bootstrap.php');
require (__DIR__ . '/install/config/bootstrap.php');



$config = yii\helpers\ArrayHelper::merge(
		require(__DIR__ . '/data/config/main.php'),
		require(__DIR__ . '/data/config/main-local.php'),
		require(__DIR__ . '/install/config/main.php'),
		require(__DIR__ . '/install/config/main-local.php')
);
$config['components']['db']['class']='yii\\db\\Connection';
$app = new Application($config);
$app->run();


