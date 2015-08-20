<?php

namespace source\modules\taxonomy\models;

use Yii;

/**
 * This is the model class for table "{{%taxonomy_type}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class TaxonomyType extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%taxonomy_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
}
