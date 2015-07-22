<?php
/**
 * This is the template for generating a module class file.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */



echo "<?php\n";
?>

namespace source\modules\<?= $generator->moduleDir?>\admin;

use source\LuLu;

class AdminModule extends \source\core\modularity\BackModule
{

    public $controllerNamespace = 'source\modules\<?= $generator->moduleDir?>\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    
    //public function getMenus()
    //{
    //    return [
    //        ['首页',['/<?= $generator->moduleID?>']],
    //        ['设置',['/<?= $generator->moduleID?>/setting']],
    //    ];
    //}
}
