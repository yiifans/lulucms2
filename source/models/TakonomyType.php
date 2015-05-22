<?php

namespace source\models;

use Yii;

/**
 * This is the model class for table "{{%takonomy_type}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class TakonomyType extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%takonomy_type}}';
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
