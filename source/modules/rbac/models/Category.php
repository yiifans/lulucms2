<?php

namespace app\modules\rbac\models;

use Yii;

/**
 * This is the model class for table "lulu_auth_category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $sort_num
 * @property string $note
 */
class Category extends BaseRbacActiveRecord
{
	const Type_Role=1;
	const Type_Permission=2;
	const Type_Rule=3;
	
	public static function getTypes($type=null)
	{
		$ret = [
			self::Type_Role=>'角色分类',
			self::Type_Permission=>'权限分类',
			self::Type_Rule=>'规则分类',
		];
		if($type!=null){
			if(isset($ret[$type])){
				return $ret[$type];
			}
		}
		return $ret;
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lulu_auth_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'sort_num'], 'required'],
            [['type', 'sort_num'], 'integer'],
            [['note'], 'string'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'type' => '类别',
            'sort_num' => '排序',
            'note' => '备注',
        ];
    }
    
    public static function getAllCategories($type)
    {
    	$ret = [];
    	
    	$categories = Category::findAll(['type'=>$type]);
    	foreach ($categories as $cate)
    	{
    		$ret[$cate['id']]=$cate['name'];
    	}
    	return $ret;
    }
}
