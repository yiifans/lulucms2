<?php
namespace source\modules\post;

class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\post\admin';

   
    public function getMenus()
    {
        return [
            ['新建',['/post/post/create']],
            ['所有文章',['/post/post']],
            ['设置',['/post/setting']],
        ];
    }
}
