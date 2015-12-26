<?php

namespace source\modules\install\admin\controllers;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;

class DefaultController extends \source\core\back\BackController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
