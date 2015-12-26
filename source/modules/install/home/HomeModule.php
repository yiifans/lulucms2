<?php

namespace source\modules\install\home;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;

class HomeModule extends \source\core\modularity\FrontModule
{
    
    public $controllerNamespace = 'source\modules\install\home\controllers';

    public function init()
    {
        parent::init();
        $this->layout='main';

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        //['首页',['/install']],
    //        //['设置',['/install/setting']],
    //    ];
    //}
}
