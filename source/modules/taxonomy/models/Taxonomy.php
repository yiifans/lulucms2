<?php

namespace source\modules\taxonomy\models;

use Yii;
use source\libs\TreeHelper;
use source\libs\Constants;
use source\LuLu;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%taxonomy}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $category_id
 * @property string $name
 * @property string $url_alias
 * @property string $redirect_url
 * @property string $thumb
 * @property string $description
 * @property integer $page_size
 * @property string $list_view
 * @property string $list_layout
 * @property string $detail_view
 * @property string $detail_layout
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * @property integer $contents
 * @property integer $sort_num
 
 */
class Taxonomy extends \source\core\base\BaseActiveRecord
{
    const CachePrefix = 'taxonomy_';
    
    public function behaviors()
    {
        return [
            'treeBehavior'=>['class'=>'source\core\behaviors\TreeBehavior']
        ];
    }

	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%taxonomy}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'parent_id', 'name', 'sort_num'], 'required'],
            [['parent_id','page_size', 'contents', 'sort_num'], 'integer'],
            [['category_id','name', 'url_alias','list_view','list_layout','detail_view','detail_layout'], 'string', 'max' => 64],
            [['redirect_url', 'thumb'], 'string', 'max' => 128],
            [['description', 'seo_title', 'seo_keywords', 'seo_description'], 'string', 'max' => 256]
        ];
    }

    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => '编号',
            'parent_id' => '父结点',
            'category_id' => '分类',
            'name' => '名称',
            'url_alias' => '别名',
            'redirect_url' => '跳转链接',
            'thumb' => '缩略图',
            'description' => '描述',
            'page_size' => '每页大小',
            'list_view' => '列表面view',
            'list_layout' => '列表面layout',
            'detail_view' => '内容页view',
            'detail_layout' => '内容页layout',
            'seo_title' => '标题',
            'seo_keywords' => '关键字',
            'seo_description' => '描述',
            'contents' => '内容数量',
            'sort_num' => '排序',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    
    
    private static function getArrayTreeInternal($category, $parentId = 0, $level = 0)
    {
        $children = self::findAll(['category_id'=>$category,'parent_id'=>$parentId],'sort_num asc');
    
        $items =[];
        foreach ($children as $child)
        {
            $child->level=$level;
            $items[$child['id']]=$child;
            $temp = self::getArrayTreeInternal($category,$child->id, $level + 1);
            $items = ArrayHelper::merge($items, $temp);
        }
    
        return $items;
    }
    
    public static function getTaxonomiesByCategory($category,$fromCache = true)
    {
        $cachekey = self::CachePrefix.$category;
    
        $values = $fromCache? LuLu::getCache($cachekey) : false;
    
        if($values===false)
        {
            $values = self::getArrayTreeInternal($category,0,0);
            LuLu::setCache($cachekey, $values);
        }
        return $values;
    }
    
    public static function getTaxonomyById($id,$fromCache = true)
    {
        if($id<0 || empty($id))
        {
            return null;
        }
        
        $cacheKey = self::CachePrefix.$id;
        $value = $fromCache?LuLu::getCache($cacheKey):false;
        if($value === false)
        {
            $value = self::findOne(['id'=>$id]);
            if($value!==null)
            {
                LuLu::setCache($cacheKey, $value);
            }
        }
        return $value;
    }
    
    public static function clearCachedTaxonomies($category,$id)
    {
        LuLu::deleteCache(self::CachePrefix.$category);
        LuLu::deleteCache(self::CachePrefix.$id);
    }
    
    
    public static function getArrayTree($category)
    {
        return self::getTaxonomiesByCategory($category);
    }
    
   
    
    public function beforeDelete()
    {
        $childrenIds = $this->getChildrenIds();
        self::deleteAll(['id'=>$childrenIds]);
        return true;
    }
    
    public function clearCache()
    {
        self::clearCachedTaxonomies($this->category_id,$this->id);
    }
}
