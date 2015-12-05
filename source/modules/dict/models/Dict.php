<?php

namespace source\modules\dict\models;

use Yii;
use source\libs\Constants;
use source\libs\TreeHelper;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%dict}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $category_id
 * @property string $name
 * @property string $value
 * @property string $description
 * @property string $thumb
 * @property integer $status
 * @property integer $sort_num
 */
class Dict extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%dict}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'category_id', 'name', 'value'], 'required'],
            [['parent_id', 'status', 'sort_num'], 'integer'],
            [['value'], 'string'],
            [['category_id', 'name'], 'string', 'max' => 64],
            [['description', 'thumb'], 'string', 'max' => 512]
        ];
    }

    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => '编号',
            'parent_id' => '父级',
            'category_id' => '分类',
            'name' => '名称',
            'value' => '值',
            'description' => '描述',
            'thumb' => '缩略图',
            'status' => '状态',
            'statusText' => '状态',
            'sort_num' => '排序',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    

    public function getStatusText()
    {
        return Constants::getStatusItems($this->status);
    }
    public function getTargetText()
    {
        return Constants::getTargetItems($this->target);
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
        return str_repeat(Constants::TabSize, $this->level).$this->name;
    }
    
    private $_parentIds;
    public function getParentIds()
    {
        if($this->_parentIds===null)
        {
            $this->_parentIds=TreeHelper::getParentIds(self::className(), $this->parent_id);
        }
        return $this->_parentIds;
    }
    
    private $_childrenIds;
    public function getChildrenIds()
    {
        if($this->_childrenIds===null)
        {
            $this->_childrenIds= TreeHelper::getChildrenIds(self::className(), $this->id);
        }
        return $this->_childrenIds;
    }
    
    public static function getChildren($category,$parentId,$status=null)
    {
        $where = ['category_id'=>$category,'parent_id'=>$parentId];
        if($status!=null)
        {
            $where['status']=$status;
        }
        $items = self::findAll($where,'sort_num asc');
        return $items;
    }
    private static function getArrayTreeInternal($category, $parentId = 0, $level = 0)
    {
        $items = self::getChildren($category,$parentId);
    
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
    public function beforeDelete()
    {
        $childrenIds = $this->getChildrenIds();
        self::deleteAll(['id'=>$childrenIds]);
        return true;
    }
}
