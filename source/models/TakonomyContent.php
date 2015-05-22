<?php

namespace source\models;

use Yii;

/**
 * This is the model class for table "{{%takonomy_content}}".
 *
 * @property integer $id
 * @property integer $takonomy_id
 * @property integer $content_id
 */
class TakonomyContent extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%takonomy_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['takonomy_id', 'content_id'], 'required'],
            [['takonomy_id', 'content_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'takonomy_id' => 'Takonomy ID',
            'content_id' => 'Content ID',
        ];
    }
}
