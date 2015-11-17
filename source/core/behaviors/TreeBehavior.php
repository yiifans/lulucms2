<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace source\core\behaviors;

use Yii;
use Closure;
use yii\base\Behavior;
use yii\base\Event;
use source\libs\Constants;
use source\libs\TreeHelper;


class TreeBehavior extends BaseBehavior
{

    private $_level;
    public function getLevel()
    {
        return $this->_level;
    }
    public function setLevel($value)
    {
        $this->_level=$value;
    }
    
    public function getLevelName()
    {
        return str_repeat(Constants::TabSize, $this->level).$this->owner->name;
    }
    
    private $_parentIds;
    public function getParentIds()
    {
        if($this->_parentIds===null)
        {
            $this->_parentIds=TreeHelper::getParentIds($this->owner->className(), $this->owner->parent_id);
        }
        return $this->_parentIds;
    }
    
    private $_childrenIds;
    public function getChildrenIds()
    {
        if($this->_childrenIds===null)
        {
            $this->_childrenIds= TreeHelper::getChildrenIds($this->owner->className(), $this->owner->id);
        }
        return $this->_childrenIds;
    }
}
