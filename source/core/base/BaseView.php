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


class BaseView extends View
{

    public $layout=null;
    
    /**
     * @var ModularityService
     */
    public $modularityService;
    /**
     * @var RbacService
     */
    public $rbacService;
    /**
     * @var TaxonomyService
     */
    public $taxonomyService;
    
    public function init()
    {
        parent::init();
        
        $this->modularityService = LuLu::getService('modularity');
        $this->rbacService = LuLu::getService('rbac');
        $this->taxonomyService = LuLu::getService('taxonomy');
    }

    public function renderFile($viewFile, $params = [], $context = null)
    {
        if ($this->theme == null)
        {
            $this->setTheme();
        }
        return parent::renderFile($viewFile, $params, $context);
    }

    public function getHomeUrl($url=null)
    {
        return LuLu::getHomeUrl($url);
    }
    
    public function setTheme()
    {
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

    public function getConfig($id)
    {
        return Common::getConfig($id);
    }

    public function getConfigValue($id)
    {
        return Common::getConfigValue($id);
    }
}
