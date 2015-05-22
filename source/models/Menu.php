<?php

namespace source\models;

use Yii;

/**
 * This is the model class for table "lulu_menu".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $category_id
 * @property string $name
 * @property string $url
 * @property string $target
 * @property string $description
 * @property string $thumb
 * @property integer $enabled
 * @property integer $sort_num
 */
class Menu extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lulu_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'category_id', 'name', 'url'], 'required'],
            [['parent_id', 'enabled', 'sort_num'], 'integer'],
            [['name', 'target', 'category_id'], 'string', 'max' => 64],
            [['url', 'description', 'thumb'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => '父结点',
            'category_id' => '分类',
            'name' => '名称',
            'url' => '链接地址',
            'target' => '打开方式',
            'description' => '描述',
            'thumb' => '图片',
            'enabled' => '状态',
            'sort_num' => '排序',
        ];
    }
    
    private $_level;
    
    public function getLevel()
    {
    	return $this->_level;
    }
    
    public function setLevel($value)
    {
    	$this->_level = $value;
    }
    
    
    public function getLevelName()
    {
    	return str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $this->level).$this->name;
    }
    
    private static function getArrayTreeInternal($category, $parentId = 0, $level = 0)
    {
    	$items = self::findAll(['category_id'=>$category,'parent_id'=>$parentId],'sort_num desc');
    	 
    	$dataList=[];
    	foreach ($items as $item)
    	{
    		$item->level=$level;
    		$dataList[$item['id']]=$item;
    		$temp = self::getArrayTreeInternal($category,$item->id, $level + 1);
    		$dataList = array_merge($dataList, $temp);
    	}
    	 
    	return $dataList;
    }
    
    public static function getArrayTree($category)
    {
    	return self::getArrayTreeInternal($category,0,0);
    }
}
