<?php
echo "<?php\n";
?>

use yii\helpers\Html;
use source\LuLu;
use source\libs\Common;
use source\helpers\ArrayHelper;
use source\core\widgets\ActiveForm;
use source\modules\<?= $generator->moduleDir?>\models\Setting;

/* @var $this source\core\front\FrontView */
/* @var $generator yii\gii\generators\module\Generator */


?>

<?= "<?php " ?> $form = ActiveForm::begin(); ?>

    <?= "<?= " ?> $form->field($model, 'post_taxonomy')->dropDownList(ArrayHelper::map($categories, 'id', 'name')) ?>
   
    <?= "<?= " ?> $form->defaultButtons() ?>
<?= "<?php " ?> ActiveForm::end(); ?>