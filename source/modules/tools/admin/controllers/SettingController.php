<?php

namespace source\modules\tools\admin\controllers;

use source\LuLu;
use source\modules\tools\models\Setting;

class SettingController extends \backend\controllers\BaseSettingController
{
    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
