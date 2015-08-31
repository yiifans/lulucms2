<?php
namespace source\core\modularity;

use yii\base\Object;
use source\core\base\BaseComponent;

abstract class ModuleService extends BaseComponent implements IModuleService
{

    public abstract function getServiceId();
    
    public function getModel($name)
    {
        
    }
}
