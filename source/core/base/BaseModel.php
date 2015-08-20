<?php
namespace source\core\base;

use yii\base\Model;

class BaseModel extends Model
{

    public $isNewRecord;
    
    public function attributeLabels()
    {
        return static::getAttributeLabels();
    }
    
    public static function getAttributeLabels($attribute = null)
    {
        return [];
    }
}
