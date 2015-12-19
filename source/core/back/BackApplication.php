<?php
namespace source\core\back;

use Yii;
use source\core\base\BaseApplication;
use source\LuLu;

class BackApplication extends BaseApplication
{

    public function init()
    {
        parent::init();
        $this->loadActiveModules(true);
        
        $this->layout = 'main';
    }
}
