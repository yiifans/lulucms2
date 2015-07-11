<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ContentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="content-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'modified_at') ?>

    <?= $form->field($model, 'allow_comment') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'views') ?>

    <?php // echo $form->field($model, 'diggs') ?>

    <?php // echo $form->field($model, 'burys') ?>

    <?php // echo $form->field($model, 'sticky') ?>

    <?php // echo $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'visibility') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'thumb') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'alias') ?>

    <?php // echo $form->field($model, 'excerpt') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'content_type') ?>

    <?php // echo $form->field($model, 'template') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
