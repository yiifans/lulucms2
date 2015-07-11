<?php
namespace source\modules\page;

class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\page\admin';

    public function getMenus()
    {
        return [
            ['新建',['/page/page/create']],
            ['所有单面',['/page/page']],
            ['设置',['/page/setting']],
        ];
    }
}
