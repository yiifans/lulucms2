<?php

namespace source\modules\tools\models;

use source\LuLu;
use yii\helpers\ArrayHelper;

class CacheForm extends \source\core\base\BaseModel
{

	public $cache;
	public $asset;
	
    public function rules()
    {
        return [
            [['cache', 'asset'], 'boolean'],
            [['test1', 'test2'], 'string', 'max'=>64],
        ];
    }

  
    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'cache' => '清空缓存',
            'asset' => '清空Asset',
        ];
        return ArrayHelper::getItems($items,$attribute);
    }   
}
