<?php
namespace source\core\base;

use source\LuLu;
use yii\helpers\FileHelper;

class BaseApplication extends \yii\web\Application
{

    public $activeModules = [];

    public function loadActiveModules($isAdmin)
    {
        $moduleManager = LuLu::getService('modularityService');
        
        $this->activeModules = $moduleManager->getActiveModules($isAdmin);
        
        $module = $isAdmin ? 'AdminModule' : 'HomeModule';
        foreach ($this->activeModules as $m)
        {
            $moduleId = $m['id'];
            $moduleDir = $m['dir'];
            $ModuleClassName = $m['dir_class'];
            
            $this->setModule($moduleId, [
                'class' => 'source\modules\\' . $moduleDir . '\\' . $module
            ]);
            
            
            $serviceFile= LuLu::getAlias('@source').'\modules\\' .$moduleDir.'\\'.$ModuleClassName.'Service.php';
            
            if(FileHelper::exist($serviceFile))
            {
                $serviceClass = 'source\modules\\' .$moduleDir.'\\'.$ModuleClassName.'Service.php';
                $serviceInstance = new $serviceClass();
                $this->set($serviceInstance->getServiceId(), $serviceInstance);
            }
        }
    }
}
