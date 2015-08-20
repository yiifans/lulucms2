<?php
use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\models\Content;
use source\models\Taxonomy;
use source\libs\Common;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */

$filedOptions = [
	'template' => "{label}{input}\n{error}", 
	'labelOptions' => [
		'class' => 'control-label'
	]
]
;

$taxonomies = Taxonomy::getArrayTree('post');

$options = Common::buildTreeOptions($taxonomies, $model->taxonomy_id);

?>

<div class="content-form ">



    <?php
				
$form = ActiveForm::begin([
					'options'=>['enctype'=>'multipart/form-data',],
					'fieldConfig' => [
						'template' => "{label}<div class=\"col-md-8\">{input}</div>\n{error}", 
						'labelOptions' => [
							'class' => 'col-md-4 control-label no-padding-left no-padding-right align-left'
						]
					], 
					
				]);
				?>
    
<div class="row">
		<div class="col-md-9">
		    <?= $form->field($model, 'title',$filedOptions)->textInput(['maxlength' => 256,'placeholder'=>'请输入标题'])->label(false)?>
		
		    <?= $form->field($model, 'url_alias',$filedOptions)->textInput(['maxlength' => 128,'placeholder'=>'Url 地址'])?>
		
		    <?= $form->field($bodyModel, 'body',$filedOptions)->textarea(['rows' => 12]) ?>	
		    
		    <?= $form->field($model, 'summary',$filedOptions)->textarea(['rows' => 6])?>
		    
		     <div class="form-group field-content-thumb">
				<label class="control-label" for="content-thumb">缩略图</label>
				<div class="file-box">
					<input type="text" id="content-thumb" class="form-control" style="display: inline-block; width:500px; " name="Content[thumb]" value="<?php echo $model['thumb']?>" maxlength="128">
					<input type='button' class='form-control' style="display: inline-block;width:60px;" value='浏览...' /> 
					<input type="file" name="Content[thumb]" class="file" onchange="document.getElementById('content-thumb').value=getFilePath(this);" /> 
				</div>
				
	
				<div class="help-block"></div>
			</div>
		</div>

		<div class="col-md-3 form-horizontal" >
	
			<?= $form->field($model, 'status')->dropDownList(Content::getStatusItems())?>
			<?= $form->field($model, 'visibility')->dropDownList(Content::getVisibilityItems())?>
			
			<?= $form->field($model, 'password')->passwordInput(['maxlength' => 64])?>
		
		    <?= $form->field($model, 'allow_comment')->checkbox([],false)?>
		    
		    <?= $form->field($model, 'is_sticky')->checkbox([],false)?>
		   
	
	        <?= $form->field($model, 'taxonomy_id')->dropDownList($options,['prompt'=>'请选择'])?>
	
		    <?= $form->field($model, 'template')->textInput(['maxlength' => 64])?>
		     <?= $form->field($model, 'comment_count')->textInput()?>
		
		    <?= $form->field($model, 'view_count')->textInput()?>
		
		    <?= $form->field($model, 'agree_count')->textInput()?>
		
		    <?= $form->field($model, 'against_count')->textInput()?>
						
    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>
