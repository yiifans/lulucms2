<?php

namespace source\modules\rbac\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "lulu_auth_role".
 *
 * @property string $id
 * @property string $category
 * @property string $name
 * @property string $description
 * @property boolean $is_system
 
 */
class Role extends BaseRbacActiveRecord
{
    const Category_Member='member';
    const Category_Admin='admin';
    const Category_System='system';
    public static function getCategoryItems($key=null)
    {
        $items = [
            self::Category_Member=>'会员角色',
            self::Category_Admin=>'管理员角色',
            self::Category_System=>'系统角色',
        ];
        return ArrayHelper::getItems($items,$key);
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auth_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category', 'name', 'is_system'], 'required'],
            [['is_system'], 'boolean'],
            [['description'], 'string', 'max'=>128],
            [['id', 'name', 'category'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '标识',
            'category' => '分类',
            'name' => '名称',
            'description' => '描述',
            'is_system' => '系统内置',
        ];
    }
    
    public static function buildOptions()
    {
        $ret=[];
        $rows = self::findAll();
        foreach ($rows as $row)
        {
            $ret[]=['id'=>$row['id'],'name'=>$row['name'],'category'=>self::getCategoryItems($row['category'])];
        }
        return $ret;
    }
}
