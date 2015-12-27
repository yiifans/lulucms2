<?php

namespace source\modules\log;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;

class LogInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='log';
        $this->name = '日志模块';
        $this->version = '1.0';
        $this->description = '日志模块';
        
        $this->is_system = true;
    }
}
