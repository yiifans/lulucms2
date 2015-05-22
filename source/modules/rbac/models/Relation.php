<?php

namespace app\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "lulu_auth_relation".
 *
 * @property string $role
 * @property string $permission
 * @property string $value
 */
class Relation extends BaseRbacActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lulu_auth_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role', 'permission'], 'required'],
            [['value'], 'string'],
            [['role', 'permission'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role' => '角色',
            'permission' => '权限',
            'value' => '值',
        ];
    }
}
