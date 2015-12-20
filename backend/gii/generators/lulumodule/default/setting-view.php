<?php
echo "<?php\n";
?>

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;
use source\core\grid\GridView;
use source\core\widgets\ActiveForm;
use source\modules\<?= $generator->moduleDir?>\models\Setting;

/* @var $this source\core\back\BackView */


?>

<?= "<?php " ?> $form = ActiveForm::begin(); ?>

    <?= "<?= " ?> $form->field($model, 'post_taxonomy')->dropDownList(ArrayHelper::map($categories, 'id', 'name')) ?>
   
    <?= "<?= " ?> $form->defaultButtons() ?>
<?= "<?php " ?> ActiveForm::end(); ?>