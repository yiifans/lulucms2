<?php

namespace source\modules\menu\models;

use Yii;
use source\libs\Constants;
use source\libs\Resource;
use yii\helpers\Url;
use source\LuLu;
use yii\helpers\ArrayHelper;

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
    const CachePrefix = 'menu_';
    
    public function behaviors()
    {
        return [
            'treeBehavior'=>['class'=>'source\core\behaviors\TreeBehavior']
        ];
    }
        
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
        return '{{%menu}}';
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

    public static function getAttributeLabels($attribute = null)
    {
        $items = [
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
        return ArrayHelper::getItems($items, $attribute);
    }
    
    

    public function getTargetText()
    {
        return Constants::getTargetItems($this->target);
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
            $items = array_merge($items, $temp);
        }
    
        return $items;
    }
    
    public static function getMenusByCategory($category,$fromCache = true)
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
    
    public static function clearCachedMenus($category)
    {
        $cachekey = self::CachePrefix.$category;
        LuLu::deleteCache($cachekey);
    }

//     public static function getMenusWidthStatus($category,$status=false,$fromCache = true)
//     {
//         $menus = self::getMenusByCategory($category,$fromCache);
//         if($status==false)
//         {
//             return $menus;
//         }
        
//         $rets = [];
        
//         $disabledMenu = false;
        
//         foreach ($menus as $menu)
//         {
//             if($disabledMenu!==false)
//             {
//                 if($menu->level > $disabledMenu->level)
//                 {
//                     continue;
//                 }
//                 else
//                 {
//                     $disabledMenu = false;
//                 }
//             }
            
//             if($menu->status)
//             {
//                 $rets[]=$menu;
//             }
//             else 
//             {
//                 $disabledMenu = $menu;
//             }
//         }
//         return $rets;
//     }

    
    

    public static function getChildren($category,$parentId,$status=null)
    {
        $items = [];
        $menus = self::getMenusByCategory($category);
        foreach ($menus as $menu)
        {
            if($menu->parent_id === $parentId)
            {
                if($status && $menu->status!==1)
                {
                    continue;
                }
                $items[]=$menu;
            }
        }
        return $items;
    }
    
    public static function getArrayTree($category)
    {
        return self::getMenusByCategory($category);
    }
    
    public static function getMenuHtml($category,$parentId)
    {
        $items = self::getChildren($category,$parentId,1);
        return self::getMenuHtmlInternal($category, $items);
    }
    private static function getMenuHtmlInternal($category,$items)
    {
        $html='';
        foreach ($items as $menu)
        {
            $children = self::getChildren($category,$menu['id'],1);
    
            if(count($children)>0)
            {
                $html .= '<li id="menu-item-'.$menu['id'].'" class="menu-item menu-item-type-'.$category.' menu-item-'.$menu['id'].' menu-item-has-children"><a href="'.$menu['url'].'" target="'.$menu['target'].'">'.$menu['name'].'</a>';
                $html.='<ul class="sub-menu sub-menu-'.$menu['id'].'">';
                $html.=self::getMenuHtmlInternal($category, $children);
                $html.='</ul>';
                $html.='</li>';
            }
            else
            {
                $html .= '<li id="menu-item-'.$menu['id'].'" class="menu-item menu-item-type-'.$category.' menu-item-'.$menu['id'].'"><a href="'.$menu['url'].'" target="'.$menu['target'].'">'.$menu['name'].'</a>';
                $html.='</li>';
            }
        }
        return $html;
    }
   
    
    public static function getAdminMenu()
    {
        $html='';
        
        $adminUrl = Resource::getAdminUrl();
        
        $action = LuLu::getApp()->requestedAction;
        $urlArray = explode('/', $action->uniqueId);
     
        $showHome='';
        
        $roots = self::getChildren('admin', 0, 1);
        foreach ($roots as $menu)
        {
            $url= $menu['url']==='#'? '#':Url::to([$menu['url']]);
            $title='<span class="da-nav-icon"><img src="'.$adminUrl.'/images/icons/black/32/'.$menu['thumb'].'" alt="'.$menu['name'].'" /></span>'.$menu['name'];
            
            $html .= '<li id="menu-item-'.$menu['id'].'" '.$showHome.' class="menu-item"><a href="'.$url.'">'.$title.'</a>';
            $showHome=' style="display:none;"';
            
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
                    $childHtml.='<li id="menu-item-'.$child['id'].'"><a href="'.$childUrl.'" target="mainFrame">'.$child['name'].'</a></li>';
                }
                
                //$html.= $opened?'<ul>':'<ul class="closed">';
                $html.= '<ul>';
                $html.=$childHtml;
                $html.='</ul>';
            }
            $html.='</li>';
        }
        
        return $html;
    }
    
    public function beforeDelete()
    {
        //删除子节点
        $childrenIds = $this->getChildrenIds();
        self::deleteAll(['id'=>$childrenIds]);
        
        return true;
    }
    
    public function clearCache()
    {
        self::clearCachedMenus($this->category_id);
    }
}
