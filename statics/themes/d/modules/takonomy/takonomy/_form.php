<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Taxonomy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taxonomy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'contents')->textInput() ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
