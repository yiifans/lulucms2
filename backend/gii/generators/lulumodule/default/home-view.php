<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;
use source\core\grid\GridView;
use source\core\widgets\ActiveForm;

/* @var $this source\core\front\FrontView */


?>
<div class="<?= $generator->moduleID . '-default-index' ?>">
    <h1><?= "<?= " ?>$this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= "<?= " ?>$this->context->action->id ?>".
        The action belongs to the controller "<?= "<?= " ?>get_class($this->context) ?>"
        in the "<?= "<?= " ?>$this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= "<?= " ?>__FILE__ ?></code>
    </p>
</div>
