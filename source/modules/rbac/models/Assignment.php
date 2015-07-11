<?php

namespace source\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "lulu_auth_assignment".
 *
 * @property string $user
 * @property string $role
 */
class Assignment extends BaseRbacActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'role'], 'required'],
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
          
        ];
    }
}
