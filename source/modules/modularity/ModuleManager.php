<?php
namespace source\modules\modularity;

use source\core\base\ModuleComponent;
use source\core\modularity\ModuleInfo;
use source\core\base\BaseModule;
use source\modules\modularity\models\Modularity;
use source\LuLu;
use source\core\base\BaseComponent;

class ModuleManager extends BaseComponent
{
    public function loadActiveModules($isAdmin=false)
    {
        $ret = [];
        
        $field = $isAdmin ? 'enable_admin' : 'enable_home';
        $allModules = Modularity::find()->where([$field => 1])->indexBy('id')->all();
        
        $modules = $this->loadAllModules();
        foreach ($modules as $m)
        {
            $moduleId = $m['id'];
            
            if (array_key_exists($moduleId, $allModules))
            {
                $ret[$moduleId] = $m;
                
                $exitModule = $allModules[$moduleId];
                if($ret[$moduleId]['has_admin'])
                {
                    $ret[$moduleId]['can_active_admin'] = ($exitModule['enable_admin'] === null || $exitModule['enable_admin'] === 0) ? true : false;
                }
                if($ret[$moduleId]['has_home'])
                {
                    $ret[$moduleId]['can_active_home'] = ($exitModule['enable_home'] === null || $exitModule['enable_home'] === 0) ? true : false;
                }
                
                $ret[$moduleId]['can_install'] = false;
                $ret[$moduleId]['can_uninstall'] = ( $ret[$moduleId]['has_admin'] && $exitModule['enable_admin'] ||  $ret[$moduleId]['has_home'] && $exitModule['enable_home']) ? false : true;
            }
        }
        return $ret;
    }

    public function loadModules()
    {
        $ret = [];
        
        $allModules = Modularity::find()->indexBy('id')->all();
        
        $modules = $this->loadAllModules();
        foreach ($modules as $m)
        {
            $moduleId = $m['id'];
            
            $ret[$moduleId] = $m;
            if (array_key_exists($moduleId, $allModules))
            {
                $exitModule = $allModules[$moduleId];
               
                if($ret[$moduleId]['has_admin'])
                {
                    $ret[$moduleId]['can_active_admin'] = ($exitModule['enable_admin'] === null || $exitModule['enable_admin'] === 0) ? true : false;
                }
                if($ret[$moduleId]['has_home'])
                {
                    $ret[$moduleId]['can_active_home'] = ($exitModule['enable_home'] === null || $exitModule['enable_home'] === 0) ? true : false;
                }
                
                $ret[$moduleId]['can_install'] = false;
                $ret[$moduleId]['can_uninstall'] = ( $ret[$moduleId]['has_admin'] && $exitModule['enable_admin'] ||  $ret[$moduleId]['has_home'] && $exitModule['enable_home']) ? false : true;
            }
        }
        return $ret;
    }

    private function loadAllModules()
    {
        $ret = [];
        
        $moduleRootPath = LuLu::getAlias('@source') . '/modules';
        
        if ($moduleRootDir = @ dir($moduleRootPath))
        {
            while (($moduleFile = $moduleRootDir->read()) !== false)
            {
                $modulePath = $moduleRootPath . '/' . $moduleFile;
                if (preg_match('|^\.+$|', $moduleFile) || ! is_dir($modulePath))
                {
                    continue;
                }
                
                if ($moduleDir = @ dir($modulePath))
                {
                    $moduleClassName = ucwords($moduleFile);
                    
                    $class=null;
                    $instance = null;
                    $has_admin= false;
                    $has_home=false;
                    
                    while (($item = $moduleDir->read()) !== false)
                    {
                        $itemPath = $moduleRootPath . '/' . $moduleFile . '/' . $item;
                        if (preg_match('|^\.+$|', $item) || is_dir($itemPath))
                        {
                            continue;
                        }
                        if ($item === $moduleClassName . 'ModuleInfo.php')
                        {
                            $class = 'source\modules\\' . $moduleFile . '\\' . $moduleClassName . 'ModuleInfo';
                        }
                        if ($item === 'AdminModule.php')
                        {
                            $has_admin = true;
                        }
                        if ($item === 'HomeModule.php')
                        {
                            $has_home = true;
                        }
                    }
                    if($class!==null)
                    {
                        try
                        {
                            // $moduleObj = LuLu::createObject($class);
                            $instance = new $class();
                            if (empty($instance->name))
                            {
                                $instance->name = $moduleFile;
                            }
                        }
                        catch (Exception $e)
                        {
                            // $instance=$e;
                        }
                    }
                    if($instance!==null)
                    {
                        $ret[$moduleFile] = [
                            'id' => $instance->id,
                            'class' => $class,
                            'instance' => $instance,
                            'can_install' => true,
                            'can_uninstall' => true,
                            'has_admin' => $has_admin,
                            'has_home' => $has_home,
                            'can_active_admin' => false,
                            'can_active_home' => false
                        ];
                    }
                }
            }
        }
        return $ret;
    }
}
