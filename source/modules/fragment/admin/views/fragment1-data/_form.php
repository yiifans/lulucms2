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
<?php if (!$model->isNewRecord && $model->content): ?>
    <div class="da-form-row field-fragment2data-thumb">
        <label class="control-label" for="fragment2data-thumb-show">原内容</label>
        <div class="da-form-item small"><?=$model->content?></div>
    </div> 
<?php endif; ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>

    <?php  $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>

</div>
