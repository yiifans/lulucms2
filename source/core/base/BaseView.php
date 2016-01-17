<?php
namespace source\core\base;

use Yii;
use source\models\search\UserSearch;
use yii\web\View;
use source\models\Config;
use source\libs\Common;
use source\core\widgets\LoopData;
use source\libs\Resource;
use source\core\widgets\LinkPager;
use source\libs\DataSource;
use source\LuLu;
use yii\helpers\FileHelper;
use source\traits\CommonTrait;

/**
 *
 * @property \source\modules\modularity\ModularityService $modularityService 
 * @property \source\modules\rbac\RbacService $rbacService 
 * @property \source\modules\taxonomy\TaxonomyService $taxonomyService
 * @property \source\modules\menu\MenuService $menuService 
 *
 */
class BaseView extends View
{
    const EVENT_AFTER_PAGE = 'afterPage';

    use CommonTrait;
    
    public $layout=null;
    
    public function init()
    {
        parent::init();
    }

    public function renderFile($viewFile, $params = [], $context = null)
    {
        if ($this->theme == null)
        {
            $this->setTheme();
        }
        return parent::renderFile($viewFile, $params, $context);
    }

    public function setTheme()
    {
    }
    
    public function getHomeUrl($url=null)
    {
        return LuLu::getHomeUrl($url);
    }
	
	public function addBreadcrumbs($items)
	{
		foreach ($items as $item)
		{
			if(is_array($item))
			{
				if(isset($item[2]))
				{
					$this->params['breadcrumbs'][] = ['label' => $item[0], 'url' => $item[1], 'img'=>$item[2]];
				}
				else
				{
					$this->params['breadcrumbs'][] = ['label' => $item[0], 'url' => $item[1]];
				}
			}
			else
			{
				$this->params['breadcrumbs'][] = $item;
			}
		}
	}

    public function getThemeUrl($url=null)
    {
        $themeUrl = Resource::getThemeUrl($url);
        return $themeUrl;
    }

    public function getDataSource($where = null, $orderBy = null, $limit = 10, $options = [])
    {
        $datas = DataSource::getContents($where, $orderBy, $limit, $options);
        return $datas;
    }

    public function loopData($dataSource, $item, $appendOptions = [])
    {
        $options = [];
        $options['dataSource'] = $dataSource;
        $options['item'] = $item;
        
        echo LoopData::widget($options);
    }

    public function beginLoopData($dataSource, $item, $appendOptions = [])
    {
        $options = [];
        $options['dataSource'] = $dataSource;
        $options['item'] = $item;
        
        return LoopData::begin($options);
    }

    public function endLoopData()
    {
        LoopData::end();
    }

    public function beginWidget($name,$opitons=[])
    {
        return $name::begin($opitons);
    }
    public function endWidget($name)
    {
        $name::end();
    }
    
    public function showWidget($name,$params)
    {
        $currentTheme = Resource::checkHomeThemeFile('/misc/'.$name);
        if($currentTheme)
        {
            $class='\\statics\\themes\\'.$currentTheme.'\\misc\\'.$name;
            
            echo $class::widget($params);
        }
        else
        {
            echo 'the widget '.$name.' does not exist';
        }
    }
    
    public function showPager($params)
    {
        $this->showWidget('LinkPager', $params);
    }
    
    public function endPage($ajaxMode = false)
    {
        parent::endPage($ajaxMode);
        $this->afterPage();
    }
    public function afterPage()
    {
        $this->trigger(self::EVENT_AFTER_PAGE);
    }
}
