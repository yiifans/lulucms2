<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\libs\Common;
use source\libs\Constants;
use source\modules\fragment\models\Fragment;

/* @var $this source\core\back\BackView */
/* @var $model source\modules\fragment\models\FragmentCategory */
/* @var $form source\core\widgets\ActiveForm */
?>

<?php  $this->toolbars([
    Html::a('返回', ['index'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?php if($model->isNewRecord):?>
    <?= $form->field($model, 'type')->radioList(Fragment::getTypeItems()) ?>
    <?php else:?>
    <?= $form->field($model, 'type')->reayOnly(Fragment::getTypeItems($model->type)) ?>
    <?php endif;?>
    
   
    <?php  $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>

