<?php
/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

echo "<?php\n";
?>

namespace source\modules\<?= $generator->moduleDir?>;

use source\LuLu;

class <?= $generator->getModuleClassName()?>Service extends \source\core\modularity\ModuleService
{
    
    public $id = '<?= $generator->moduleDir?>Service';


    public function init()
    {
        parent::init();
    }
}
