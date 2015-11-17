<?php

use yii\helpers\Html;
use source\LuLu;
use source\libs\Common;
use yii\helpers\ArrayHelper;
use source\core\widgets\ActiveForm;
use source\modules\tools\models\Setting;

/* @var $this source\core\front\FrontView */
/* @var $generator yii\gii\generators\module\Generator */

$this->title = '缓存管理';

?>

<?php  $form = ActiveForm::begin(); ?>

    <?=  $form->field($model, 'cache')->checkbox([],false) ?>
    <?=  $form->field($model, 'asset')->checkbox([],false) ?>
   
    <?=  $form->defaultButtons() ?>
<?php  ActiveForm::end(); ?>