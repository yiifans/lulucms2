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
use yii\db\BaseActiveRecord;

/**
 * AttributeBehavior automatically assigns a specified value to one or multiple attributes of an ActiveRecord object when certain events happen.
 *
 * To use AttributeBehavior, configure the [[attributes]] property which should specify the list of attributes
 * that need to be updated and the corresponding events that should trigger the update. For example,
 * Then configure the [[value]] property with a PHP callable whose return value will be used to assign to the current
 * attribute(s). For example,
 *
 * ~~~
 * use yii\behaviors\AttributeBehavior;
 *
 * public function behaviors()
 * {
 *     return [
 *         [
 *             'class' => AttributeBehavior::className(),
 *             'attributes' => [
 *                 ActiveRecord::EVENT_BEFORE_INSERT => 'attribute1',
 *                 ActiveRecord::EVENT_BEFORE_UPDATE => 'attribute2',
 *             ],
 *             'value' => function ($event) {
 *                 return 'some value';
 *             },
 *         ],
 *     ];
 * }
 * ~~~
 *
 * @author Luciano Baraglia <luciano.baraglia@gmail.com>
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DefaultValueBehavior extends CommonBehavior
{
    public $empty;
    
    public function evaluateAttributes($event)
    {
        if (!empty($this->attributes[$event->name])) {
            $attributes = (array) $this->attributes[$event->name];
            $value = $this->getValue($event,$attributes);
            foreach ($attributes as $attribute) {
                
                // ignore attribute names which are not string (e.g. when set by TimestampBehavior::updatedAtAttribute)
                if (!is_string($attribute)) {
                    continue;
                }
                if($this->empty instanceof \Closure)
                {
                    if($this->empty($this->owner->$attribute))
                    {
                        $this->owner->$attribute = $value;
                    }
                }
                else
                {
                    if( $this->owner->$attribute===null|| $this->owner->$attribute==='')
                    {
                        $this->owner->$attribute = $value;
                    }
                }
            }
        }
    }
}
