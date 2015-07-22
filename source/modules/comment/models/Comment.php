<?php

namespace source\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property string $reply_ids
 * @property integer $obj_id
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_email
 * @property string $user_url
 * @property string $user_ip
 * @property string $user_address
 * @property string $title
 * @property string $content
 * @property integer $created_at
 * @property integer $status
 */
class Comment extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content_id', 'content'], 'required'],
            [['content_id', 'user_id', 'status'], 'integer'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['reply_ids', 'user_url', 'user_address'], 'string', 'max' => 128],
            [['user_name', 'user_email', 'user_ip'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reply_ids' => 'Reply Ids',
            'content_id' => 'Content ID',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_email' => 'User Email',
            'user_url' => 'User Url',
            'user_ip' => 'User Ip',
            'user_address' => 'User Address',
            'content' => 'Content',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }
}
