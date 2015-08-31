<?php

namespace source\models;

use Yii;

/**
 * This is the model class for table "lulu_taxonomy_category".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 */
class TaxonomyCategory extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lulu_taxonomy_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id', 'name'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 512],
            [['id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '标识',
            'name' => '名称',
            'description' => '描述',
        ];
    }
    
    public function beforeDelete()
    {
        Taxonomy::deleteAll(['category_id'=>$this->id]);
        return true;
    }
}
