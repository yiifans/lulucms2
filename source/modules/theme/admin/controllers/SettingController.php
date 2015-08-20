<?php

namespace source\modules\theme\admin\controllers;

use source\LuLu;
use source\modules\theme\models\Setting;

class SettingController extends \backend\controllers\BaseSettingController
{
    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
