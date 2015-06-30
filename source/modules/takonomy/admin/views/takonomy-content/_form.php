<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TakonomyContent */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'takonomy_id')->textInput() ?>

    <?= $form->field($model, 'content_id')->textInput() ?>

    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>