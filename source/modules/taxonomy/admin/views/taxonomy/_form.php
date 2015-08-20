<?php

use yii\helpers\Html;

use source\modules\taxonomy\models\Taxonomy;
use source\helpers\StringHelper;
use source\libs\Common;
use source\core\widgets\ActiveForm;
use source\libs\TreeHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Taxonomy */
/* @var $form yii\widgets\ActiveForm */


$category=$model->category_id;


$taxonomies = Taxonomy::getArrayTree($category);

$options = TreeHelper::buildTreeOptionsForSelf($taxonomies, $model);


?>

<?php $this->toolbars([
    Html::a('返回', ['index','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>


    <?php $form = ActiveForm::begin(); ?>
            
<div class="da-form-row">
    <label>父结点</label>
    <div class="da-form-item small">
        <?php echo Html::activeHiddenInput($model, 'category_id');?>
        <select id="taxonomy-parent_id" class="form-control" name="Taxonomy[parent_id]">
        <?php echo $options?>
        </select>
    </div>
</div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'url_alias')->textInput(['maxlength' => 64]) ?>
    
    <?= $form->field($model, 'redirect_url')->textInput(['maxlength' => 128]) ?>
    
    <?= $form->field($model, 'thumb')->fileInput(['class'=>'da-custom-file']) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => 256]) ?>
    
    <?= $form->field($model, 'page_size')->textInput() ?>

    <?= $form->field($model, 'sort_num',['options'=> ['class' => 'da-form-row','style'=>'border-bottom: 0;']])->textInput() ?>
    
    <fieldset class="da-form-inline">
    	<legend>模板 设置</legend>
    	<?= $form->field($model, 'list_view')->textInput(['maxlength' => 64]) ?>
    	<?= $form->field($model, 'list_layout')->textInput(['maxlength' => 64]) ?>
    	<?= $form->field($model, 'detail_view')->textInput(['maxlength' => 64]) ?>
    	<?= $form->field($model, 'detail_layout')->textInput(['maxlength' => 64]) ?>
        
    </fieldset>
    
    <fieldset class="da-form-inline">
    	<legend>SEO 设置</legend>
    	<?= $form->field($model, 'seo_title')->textInput(['maxlength' => 256]) ?>
    	<?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 256]) ?>
    	<?= $form->field($model, 'seo_description')->textarea(['maxlength' => 256]) ?>
        
    </fieldset>
                                        
    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>
           