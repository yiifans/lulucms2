<?php
/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

echo "<?php\n";
?>

namespace source\modules\<?= $generator->moduleDir?>;

use source\LuLu;

class <?= $generator->getModuleClassName()?>Info extends \source\core\modularity\ModuleInfo
{

    public function init()
    {
        parent::init();
        
        $this->id='<?= $generator->getModuleId()?>';
        $this->name = '<?= $generator->getModuleClassName()?> Module';
        $this->version = '1.0';
        $this->description = '<?= $generator->getModuleClassName()?> description';
    }
}
