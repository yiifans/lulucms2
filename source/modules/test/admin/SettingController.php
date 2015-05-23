<?php

namespace source\modules\test\admin;;

use source\LuLu;
use source\modules\test\models\Setting;

class SettingController extends \backend\controllers\BaseSettingController
{
    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
