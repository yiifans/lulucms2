<?php

namespace source\modules\dict\admin;;

use source\LuLu;
use source\modules\dict\models\Setting;

class SettingController extends \backend\controllers\BaseSettingController
{
    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
