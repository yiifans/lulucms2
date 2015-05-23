<?php
namespace source\modules\page\admin;

use backend\controllers\BaseSettingController;
use source\modules\page\models\Setting;

class SettingController extends BaseSettingController
{

    public function actionIndex()
    {
        $model = new Setting();
        //$model = new Setting();
        
        return $this->doConfig($model);
    }
}
