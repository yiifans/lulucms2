<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\modules\dict\models\Dict;
use source\libs\Common;
use source\libs\Constants;
use source\libs\TreeHelper;

/* @var $this yii\web\View */
/* @var $model source\models\Menu */
/* @var $form yii\widgets\ActiveForm */

$category=$model->category_id;


$categories = Dict::getArrayTree($category);

$options = TreeHelper::buildTreeOptionsForSelf($categories, $model);

?>

<?php $this->toolbars([
    Html::a('返回', ['index','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>

    <?php $form = ActiveForm::begin(); ?>

    <div class="da-form-row">
        <label>父结点</label>
        <div class="da-form-item small">
            <?php echo Html::activeHiddenInput($model, 'category_id')?>
            <select type="text" id="menu-parent_id" class="form-control" name="Dict[parent_id]">
            <?php echo $options?>
            </select>
        </div>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'value')->textarea() ?>

    <?= $form->field($model, 'thumb')->textInput(['maxlength' => 512]) ?>
    <?= $form->field($model, 'description')->textarea(['maxlength' => 512]) ?>    

    <?= $form->field($model, 'sort_num')->textInput() ?>
    <?= $form->field($model, 'status')->radioList(Constants::getStatusItems()) ?>

    <?= $form->defaultButtons() ?>

    <?php ActiveForm::end(); ?>

