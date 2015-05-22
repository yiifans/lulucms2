<?php

namespace app\modules\rbac;

class HomeModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\rbac\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        
        $this->layout='main';
    }
}
