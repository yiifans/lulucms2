<?php

namespace source\modules\install\admin\controllers;

use source\LuLu;
use source\modules\install\models\Setting;

class SettingController extends \backend\controllers\BaseSettingController
{
    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
