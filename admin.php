<?php

use source\core\back\BackApplication;
use source\LuLu;
use source\libs\Common;


// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require (__DIR__ . '/vendor/autoload.php');
require (__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

require (__DIR__ . '/source/override.php');

require (__DIR__ . '/data/config/bootstrap.php');
require (__DIR__ . '/backend/config/bootstrap.php');


$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/data/config/main.php'),
    require(__DIR__ . '/data/config/main-local.php'),
    require(__DIR__ . '/backend/config/main.php'),
    require(__DIR__ . '/backend/config/main-local.php')
);

Common::checkInstall($config);

$app = new BackApplication($config);
$app->defaultRoute='/site/index';
$app->run();

