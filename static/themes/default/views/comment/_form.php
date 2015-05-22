<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reply_ids')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'content_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'user_email')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'user_url')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'user_ip')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'user_address')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
