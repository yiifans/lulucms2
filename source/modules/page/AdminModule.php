<?php
namespace source\modules\page;

class AdminModule extends \source\core\modularity\BaseBackModule
{

    public $controllerNamespace = 'source\modules\page\admin';

    public function getMenus()
    {
        return [
            ['新建',['/page/default/create']],
            ['所有页面',['/page']],
            ['设置',['/page/setting']],
        ];
    }
}
