<?php

namespace source\modules\tools\admin\controllers;

use source\LuLu;
use source\modules\tools\models\CacheForm;
use yii\helpers\FileHelper;

class DbController extends \source\core\back\BackController
{
    public function actionIndex()
    {
        return $this->render('index',[]);
    }
}
