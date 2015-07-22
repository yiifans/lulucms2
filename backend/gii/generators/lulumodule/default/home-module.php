<?php
/**
 * This is the template for generating a module class file.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */



echo "<?php\n";
?>

namespace source\modules\<?= $generator->moduleDir?>\home;

use source\LuLu;

class HomeModule extends \source\core\modularity\FrontModule
{
    
    public $controllerNamespace = 'source\modules\<?= $generator->moduleDir?>\home\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        //['首页',['/<?= $generator->moduleID?>']],
    //        //['设置',['/<?= $generator->moduleID?>/setting']],
    //    ];
    //}
}
