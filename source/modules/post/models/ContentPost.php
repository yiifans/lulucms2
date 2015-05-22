<?php

namespace source\modules\post\models;

use Yii;
use source\models\ContentBody;

/**
 * This is the model class for table "{{%content_post}}".
 *
 * @property integer $id
 * @property integer $content_id
 * @property string $body
 */
class ContentPost extends ContentBody
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content_post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['content_id', 'body'], 'required'],
            [['content_id'], 'integer'],
            [['body'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content_id' => 'Content ID',
            'body' => '内容',
        ];
    }
}
