<?php
namespace source\core\base;

use yii\base\Component;
use source\traits\CommonTrait;

class BaseComponent extends Component
{
    use CommonTrait;
    
    public function init()
    {
        parent::init();
    }
}
