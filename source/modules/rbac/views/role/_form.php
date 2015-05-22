<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\rbac\models\Category;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Role */
/* @var $form yii\widgets\ActiveForm */

$categories = Category::getAllCategories(Category::Type_Role);
?>

<div class="role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => 64,'readonly'=>$model->isNewRecord ? false : true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($categories) ?>

    <?= $form->field($model, 'name')->checkboxList(['0'=>'早','2'=>'aa','3'=>'dd']) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
