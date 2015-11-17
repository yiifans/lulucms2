<?php

namespace source\modules\fragment\models;

use Yii;
use source\LuLu;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%fragment_category}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 */
class FragmentCategory extends \source\core\base\BaseActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fragment_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type'], 'integer'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return self::getAttributeLabels();
    }
    
    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => 'ID',
            'name' => '名称',
            'type' => '类型',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    
    public static function getCategories($type)
    {
        $items = self::findAll(['type'=>$type]);
        return ArrayHelper::map($items, 'id', 'name');
    }
}
