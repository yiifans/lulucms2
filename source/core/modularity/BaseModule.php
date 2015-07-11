<?php
namespace source\core\modularity;

use source\LuLu;
class BaseModule extends \source\core\base\BaseModule
{

    const Status_Installed = 'Installed';

    const Status_Uninstalled = 'Uninstalled';

    const Status_Activity = 'Activity';

    const Status_Inactivity = 'Inactivity';

    public $status;

    public $modularityService;
    
    public $moduleInfo;
    
    public function init()
    {
        parent::init();
        
        $this->modularityService=LuLu::getService('modularity');
    }
	
	public function getMenus()
	{
	    return [];
	    $menus = [
	        ['title'=>'新建','url'=>'www.yiifans.com'],
	        ['url'=>'www.yiifans.com','title'=>'新建'],
	        ['title','url'],
	    ];
	    return $menus;
	}
	
	public function getRoutings()
	{
	    
	}
	
	public function getPermissions()
	{
	    $permissions = [
	        ['key'=>'create','title'=>'create post','description'=>'create a new post'],
	    ];
	}
	
}
