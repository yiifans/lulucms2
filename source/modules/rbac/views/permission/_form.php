<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\rbac\models\Category;
use app\modules\rbac\models\Permission;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Permission */
/* @var $form yii\widgets\ActiveForm */

$categories = Category::getAllCategories(Category::Type_Permission);
?>

<div class="permission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => 64,'readonly'=>$model->isNewRecord ? false : true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($categories) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'form')->radioList(Permission::getForms()) ?>

    <?= $form->field($model, 'options')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'default_value')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
