<?php

namespace source\modules\install\admin;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;


class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\install\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        ['首页',['/install']],
    //        ['设置',['/install/setting']],
    //    ];
    //}
}
