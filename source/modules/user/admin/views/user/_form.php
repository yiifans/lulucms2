<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\models\Menu;
use source\libs\Common;
use source\libs\Constants;
use source\libs\TreeHelper;
use yii\helpers\ArrayHelper;
use source\modules\rbac\models\Role;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255,'readonly'=>$model->isNewRecord?null:'readonly']) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map($this->rbacService->getAllRoles(), 'id', 'name','category')) ?>
    
    <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>
  

    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>