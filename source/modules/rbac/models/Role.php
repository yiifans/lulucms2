<?php

namespace app\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "lulu_auth_role".
 *
 * @property string $key
 * @property integer $category_id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $note
 */
class Role extends BaseRbacActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lulu_auth_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'category_id', 'name', 'created_at', 'updated_at'], 'required'],
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['note'], 'string'],
            [['key', 'name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => '标识',
            'category_id' => '分类',
            'name' => '名称',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
            'note' => '备注',
        ];
    }
}
