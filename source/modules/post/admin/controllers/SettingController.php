<?php
namespace source\modules\post\admin\controllers;

use backend\controllers\BaseSettingController;
use source\modules\post\models\Setting;

class SettingController extends BaseSettingController
{

    public function actionIndex()
    {
        $model = new Setting();
        
        return $this->doConfig($model);
    }
}
