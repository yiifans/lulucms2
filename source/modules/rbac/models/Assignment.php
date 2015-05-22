<?php

namespace app\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "lulu_auth_assignment".
 *
 * @property string $user
 * @property string $role
 * @property integer $created_at
 * @property string $note
 */
class Assignment extends BaseRbacActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lulu_auth_assignment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'role', 'created_at'], 'required'],
            [['created_at'], 'integer'],
            [['note'], 'string'],
            [['user', 'role'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user' => '用户',
            'role' => '角色',
            'created_at' => '创建时间',
            'note' => '备注',
        ];
    }
}
