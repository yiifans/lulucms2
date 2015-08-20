<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaxonomyType */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 64]) ?>

    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>