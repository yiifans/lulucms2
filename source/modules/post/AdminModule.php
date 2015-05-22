<?php
namespace source\modules\post;

class AdminModule extends \source\core\modularity\BaseBackModule
{

    public $controllerNamespace = 'source\modules\post\admin';

   
    public function getMenus()
    {
        return [
            ['新建',['/post/default/create']],
            ['所有文章',['/post']],
            ['设置',['/post/setting']],
        ];
    }
}
