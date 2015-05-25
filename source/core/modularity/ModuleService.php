<?php
namespace source\core\modularity;

use yii\base\Object;
use source\core\base\BaseComponent;

class ModuleService extends BaseComponent
{

    public $id;
    
    public function getServiceId()
    {
        if(empty($this->id))
        {
            $fullClass = self::className();
            $a = explode('\\', $fullClass);
            $this->id = $a[2];
        }
        return $this->id;
    }
}
