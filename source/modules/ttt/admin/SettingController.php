<?php

namespace source\modules\ttt\admin;;

use source\LuLu;
use source\modules\ttt\models\Setting;

class SettingController extends \backend\controllers\BaseSettingController
{
    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
