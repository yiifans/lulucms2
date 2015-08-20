<?php

namespace source\modules\fragment\admin\controllers;

use source\LuLu;
use source\modules\fragment\models\Setting;

class SettingController extends \backend\controllers\BaseSettingController
{
    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
