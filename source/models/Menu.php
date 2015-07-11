<?php

namespace source\models;

use Yii;
use source\libs\TreeHelper;
use source\libs\Constants;
use source\libs\Resource;
use yii\helpers\Url;
use source\LuLu;

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
 * @property integer $status
 * @property integer $sort_num
 */
class Menu extends \source\core\base\BaseActiveRecord
{
    public function init()
    {
        $this->target=Constants::Target_Self;
        $this->status = Constants::Status_Enable;
        
        parent::init();
    }
    
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
            [['parent_id', 'status', 'sort_num'], 'integer'],
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
            'targetText' => '打开方式',
            'description' => '描述',
            'thumb' => '图片',
            'status' => '状态',
            'statusText' => '状态',
            'sort_num' => '排序',
        ];
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
            $this->_parentIds=TreeHelper::getParentIds(Menu::className(), $this->parent_id);
        }
        return $this->_parentIds;
    }
    
    private $_childrenIds;
    public function getChildrenIds()
    {
        if($this->_childrenIds===null)
        {
            $this->_childrenIds= TreeHelper::getChildrenIds(Menu::className(), $this->id);
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
        $items = self::findAll($where,'sort_num desc');
        return $items;
    }
    
    private static function getArrayTreeInternal($category, $parentId = 0, $level = 0,$status=null)
    {
    	$items = self::getChildren($category,$parentId,$status);
    	 
    	$dataList=[];
    	foreach ($items as $item)
    	{
    		$item->level=$level;
    		$dataList[$item['id']]=$item;
    		$temp = self::getArrayTreeInternal($category,$item->id, $level + 1,$status);
    		$dataList = array_merge($dataList, $temp);
    	}
    	 
    	return $dataList;
    }
    
    public static function getArrayTree($category,$status=null)
    {
    	return self::getArrayTreeInternal($category,0,0);
    }
    
    public static function getMenuHtmlInternal($category,$items)
    {
        $html='';
        foreach ($items as $menu)
        {
            $html .= '<li id="menu-item-'.$menu['id'].'" class="menu-item menu-item-type-'.$category.' menu-item-'.$menu['id'].'"><a href="'.$menu['url'].'" target="'.$menu['target'].'">'.$menu['name'].'</a>';
            $children = self::getChildren($category,$menu['id'],1);
            if(count($children)>0)
            {
                $html.='<ul class="children-menus menu-children-'.$menu['id'].'">';
                $html.=self::getMenuHtmlInternal($category, $children);
                $html.='</ul>';
            }
            $html.='</li>';
        }
   	    return $html;
    }
    
    public static function getMenuHtml($category,$parentId)
    {
        $items = self::getChildren($category,$parentId,1);
        return self::getMenuHtmlInternal($category, $items);
    }
   
    public static function getAdminMenu()
    {
        $html='';
        
        $adminUrl = Resource::getAdminUrl();
        
        $action = LuLu::getApp()->requestedAction;
        $urlArray = explode('/', $action->uniqueId);
     
        $roots = self::getChildren('admin', 0, 1);
        foreach ($roots as $menu)
        {
            $url= $menu['url']==='#'? '#':Url::to([$menu['url']]);
            $title='<span class="da-nav-icon"><img src="'.$adminUrl.'/images/icons/black/32/'.$menu['thumb'].'" alt="'.$menu['name'].'" /></span>'.$menu['name'];
            
            $html .= '<li id="menu-item-'.$menu['id'].'"><a href="'.$url.'">'.$title.'</a>';
            
            $children = self::getChildren('admin',$menu['id'],1);
            if(count($children)>0)
            {
                $opened=false;
                $childHtml='';
                foreach ($children as $child)
                {
                    $menuUrlArray = explode('/',trim($child['url'],'/'));
                    if(in_array($urlArray[0],$menuUrlArray))
                    {
                        $opened=true;
                    }
                    $childUrl= $child['url']==='#'? '#':Url::to([$child['url']]);
                    $childHtml.='<li id="menu-item-'.$child['id'].'"><a href="'.$childUrl.'">'.$child['name'].'</a></li>';
                }
                
                $html.= $opened?'<ul>':'<ul class="closed">';
                $html.=$childHtml;
                $html.='</ul>';
            }
            $html.='</li>';
        }
        
        return $html;
    }
    
    
    public function beforeDelete()
    {
        $childrenIds = $this->getChildrenIds();
        self::deleteAll(['id'=>$childrenIds]);
        return true;
    }
}
