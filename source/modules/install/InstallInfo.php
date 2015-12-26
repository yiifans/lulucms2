<?php

namespace source\modules\install;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;

class InstallInfo extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='install';
        $this->name = 'Install Module';
        $this->version = '1.0';
        $this->description = 'Install description';
    }
}
