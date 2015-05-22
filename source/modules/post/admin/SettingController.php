<?php
namespace source\modules\post\admin;

use backend\controllers\BaseSettingController;
use source\modules\post\models\PostConfig;

class SettingController extends BaseSettingController
{

    public function actionIndex()
    {
        $model = new PostConfig();
        
        return $this->doConfig($model);
    }
}
