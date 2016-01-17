<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\libs\Common;
use source\libs\Constants;
use source\LuLu;
use source\modules\fragment\models\FragmentCategory;

/* @var $this source\core\back\BackView */
/* @var $model source\modules\fragment\models\Fragment */
/* @var $form source\core\widgets\ActiveForm */

$type = LuLu::getGetValue('type');

?>

<?php  $this->toolbars([
    Html::a('返回', ['index','type'=>$type], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => 63]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 63]) ?>
    <?= $form->field($model, 'category_id')->dropDownList(FragmentCategory::getCategories($type)) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => 256]) ?>

    <?php  $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>


