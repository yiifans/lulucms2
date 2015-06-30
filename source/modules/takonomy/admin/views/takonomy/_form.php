<?php

use yii\helpers\Html;

use source\models\Takonomy;
use source\helpers\StringHelper;
use source\libs\Common;
use source\core\widgets\ActiveForm;
use source\libs\TreeHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Takonomy */
/* @var $form yii\widgets\ActiveForm */


$category=$model->category_id;


$takonomies = Takonomy::getArrayTree($category);

$options = TreeHelper::buildTreeOptionsForSelf($takonomies, $model);


?>

<?php $this->toolbars([
    Html::a('返回', ['index','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>


    <?php $form = ActiveForm::begin(); ?>
            
<div class="da-form-row">
    <label>父结点</label>
    <div class="da-form-item small">
        <?php echo Html::activeHiddenInput($model, 'category_id');?>
        <select id="takonomy-parent_id" class="form-control" name="Takonomy[parent_id]">
        <?php echo $options?>
        </select>
    </div>
</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'url_alias')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 256]) ?>

    <?= $form->field($model, 'sort_num')->textInput() ?>

    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>
           