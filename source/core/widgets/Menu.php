<?php
namespace source\core\widgets;

use Yii;
use yii\helpers\Html;

class Menu extends BaseWidget
{

    public $menuId;

    public $parentId = 0;

    public $itemOptions = [];

    public $rootOptions = [];

    public $subOptions = [];

    public function init()
    {
        parent::init();
    }

    private function getChildrenMenus($parentId)
	{
		$menus = \source\models\Menu::findAll(['category_id'=>$this->menuId,'parent_id'=>$parentId,'enabled'=>1],'sort_num desc');
		return $menus;
	}
   
	public function getMenu($menus)
	{
		$ret='';
		
		foreach ($menus as $menu)
		{
			$ret.='<li class="menu_item menu_'.$this->menuId.'_item" id="menu_item_'.$menu['id'].'">'.Html::a($menu['name'],$menu['url'],['target'=>$menu['target']]).'</li>';
            $children = $this->getChildrenMenus($menu['id']);
            if (count($children) !== 0)
            {
                $ret .= '<ul class="menu_' . $this->menuId . '_sub">';
                $ret .= $this->getMenu($children);
                $ret .= '</ul>';
            }
        }
        return $ret;
	}

    public function showMenu()
    {
        $ret = '<ul class="menu_' . $this->menuId . '">';
        
        $ret .= $this->getMenu($this->menuId);
        
        $ret .= '</ul>';
        
        return $ret;
    }
}
