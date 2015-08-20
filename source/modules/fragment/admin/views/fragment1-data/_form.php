<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\libs\Common;
use source\libs\Constants;
use source\LuLu;

/* @var $this source\core\back\BackView */
/* @var $model source\modules\fragment\models\Fragment1Data */
/* @var $form source\core\widgets\ActiveForm */
?>

<?php  $this->toolbars([
    Html::a('返回', ['index','fid'=>LuLu::getGetValue('fid')], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>

<div class="fragment1-data-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>

    <?php  $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>

</div>
