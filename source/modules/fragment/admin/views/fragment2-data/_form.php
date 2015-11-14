<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\libs\Common;
use source\libs\Constants;
use source\LuLu;

/* @var $this source\core\back\BackView */
/* @var $model source\modules\fragment\models\Fragment2Data */
/* @var $form source\core\widgets\ActiveForm */
?>

<?php
$this->toolbars([
    Html::a('返回', ['index', 'fid' => LuLu::getGetValue('fid')], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);
?>



<?php
$form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data', 'class' => 'da-form'],
        ]);
?>



<?= $form->field($model, 'title')->textInput(['maxlength' => 256]) ?>
<?= $form->field($model, 'sub_title')->textInput(['maxlength' => 256]) ?>

<!-- 
<?= $form->field($model, 'title_format')->textInput(['maxlength' => 64]) ?>
-->



<?= $form->field($model, 'url')->textInput(['maxlength' => 256]) ?>
<?= $form->field($model, 'thumb')->fileInput(['class' => 'da-custom-file']) ?>
<?php if (!$model->isNewRecord && $model->thumb): ?>
    <div class="da-form-row field-fragment2data-thumb">
        <label class="control-label" for="fragment2data-thumb-show">原缩略图</label>
        <div class="da-form-item small"><img id="fragment2data-thumb-show" src="<?= $model->thumb ?>"/></div>
    </div> 
<?php endif; ?>

<?= $form->field($model, 'summary')->textarea(['maxlength' => 512]) ?>

<?= $form->field($model, 'sort_num')->textInput() ?>

<?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>

<?php $form->defaultButtons() ?>

<?php ActiveForm::end(); ?>


