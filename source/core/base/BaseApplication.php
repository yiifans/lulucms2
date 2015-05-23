<?php
namespace source\core\base;

use source\LuLu;

class BaseApplication extends \yii\web\Application
{

    public $activeModules = [];

    public function loadActiveModules($isAdmin)
    {
        $moduleManager = LuLu::$app->moduleManager;
        $this->activeModules = $moduleManager->loadActiveModules($isAdmin);
        
        $module = $isAdmin ? 'AdminModule' : 'HomeModule';
        foreach ($this->activeModules as $m)
        {
            $moduleId = $m['id'];
            $moduleDir = $m['instance']->getDir();
            $this->setModule($moduleId, [
                'class' => 'source\modules\\' . $moduleDir . '\\' . $module
            ]);
        }
    }
}
