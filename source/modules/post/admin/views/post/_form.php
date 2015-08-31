<?php
use yii\helpers\Html;
use source\LuLu;
use source\libs\Common;
use source\core\widgets\ActiveForm;
use source\models\Taxonomy;
use source\models\Content;
use source\libs\TreeHelper;
use source\libs\Resource;
use source\libs\Constants;
use source\core\widgets\KindEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Content */
/* @var $form yii\widgets\ActiveForm */

$filedOptions = [
];


$taxonomy = $this->getConfigValue('post_taxonomy');
$taxonomies = $this->taxonomyService->getTaxonomiesAsTree($taxonomy);

$options = TreeHelper::buildTreeOptions($taxonomies, $model->taxonomy_id);

LuLu::setViewParam(['defaultLayout'=>false]);

$template2="{label}\n{input}\n{error}\n{hint}";
$template4="{label}\n<div class=\"da-form-item small\" style=\"margin-left:0px;\">{input}\n{error}</div>\n{hint}";
//$template4="<div class=\"da-form-col-4-8\">{label}</div>\n<div class=\"da-form-col-2-8\" style=\"margin-left:0px;\">{input}\n{error}</div>\n{hint}";
?>

    <?php

$form = ActiveForm::begin([
					'options'=>['enctype'=>'multipart/form-data','class'=>'da-form'],
					'fieldConfig'=>[
					    'size'=>'default',
                    ]
				]);
				?>
    <div class="da-form-inline">
    
            <div class="grid_3">
                <div class="da-panel">
                    <div class="da-panel-header">
                        <span class="da-panel-title">
                            <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/16/pencil.png" alt="">
                            <?= $this->title ?>
                        </span>
                    </div>
                  
                    <div class="da-panel-content">
            		    <?= $form->field($model, 'title',$filedOptions)->textInput(['maxlength' => 256,'placeholder'=>'请输入标题'])?>
            		    <?= $form->field($model, 'sub_title',$filedOptions)->textInput(['maxlength' => 256,'placeholder'=>'请输入副标题'])?>
            		    <?= $form->field($model, 'url_alias',$filedOptions)->textInput(['maxlength' => 256,'placeholder'=>'Url 地址'])?>
            		    <?= $form->field($model, 'redirect_url',$filedOptions)->textInput(['maxlength' => 256])?>
            		
            		    <?= $form->field($bodyModel, 'body',['size'=>'large'])->textarea(['rows' => 22]) ?>	
            		    <?php echo KindEditor::widget(['inputId'=>'#'.Html::getInputId($bodyModel, 'body')])?>
            		    
            		    
            		    <?= $form->field($model, 'summary',$filedOptions)->textarea(['rows' => 6])?>
            		    
            		    <?= $form->field($model, 'thumb')->fileInput(['class'=>'da-custom-file'])?>
            		   
            			  
                    </div>
                </div>
            </div>
                                    
                                    
            <div class="grid_1">
            
                <div class="da-panel">
                    <div class="da-panel-header">
                        <span class="da-panel-title">
                            <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/16/pencil.png" alt="">
                            发布
                        </span>
                    </div>
            
                    <div class="da-panel-content">
                    
            	       <div class="da-form-row">       
            			<?= $form->field($model, 'taxonomy_id',['template'=>$template2,'options'=>['class'=>'da-form-col-12']])->dropDownList($options)?>
                       </div>                    
          	      
            	      <div class="da-form-row">
            		    <?= $form->field($model, 'recommend',['template'=>$template2,'options'=>['class'=>'da-form-col-4 alpha']])->dropDownList(Constants::getRecommendItems())?>
            		    <?= $form->field($model, 'headline',['template'=>$template2,'options'=>['class'=>'da-form-col-4']])->dropDownList(Constants::getHeadlineItems())?>
            		    <?= $form->field($model, 'sticky',['template'=>$template2,'options'=>['class'=>'da-form-col-4 omega']])->dropDownList(Constants::getStickyItems())?>
                      </div>
                                               
            	       <div class="da-form-row">       
            			<?= $form->field($model, 'status',['template'=>$template2,'options'=>['class'=>'da-form-col-4 alpha']])->dropDownList(Constants::getStatusItemsForContent(),[],false)?>
            			<?= $form->field($model, 'visibility',['template'=>$template2,'options'=>['class'=>'da-form-col-4']])->dropDownList(Constants::getVisibilityItems(),[],false)?>
            			<?= $form->field($model, 'allow_comment',['template'=>$template2,'options'=>['class'=>'da-form-col-4 omega']])->dropDownList(Constants::getYesNoItems(),[],false)?>
                       </div>


                       
                        
                       <?= $form->defaultButtons() ?>  
                    </div>
                </div>
 
                <div class="da-panel collapsible collapsed">
                    <div class="da-panel-header">
                        <span class="da-panel-title">
                            <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/16/pencil.png" alt="">
                            属性设置
                        </span>
                    </div>
            
                    <div class="da-panel-content">
                    
            		
                       <!--                   		   
            	       <div class="da-form-row">            		    
            		    <?= $form->field($model, 'view_count',['template'=>$template2,'options'=>['class'=>'da-form-col-3 alpha']])->textInput()?>
            		    <?= $form->field($model, 'comment_count',['template'=>$template2,'options'=>['class'=>'da-form-col-3']])->textInput()?>
            		    <?= $form->field($model, 'agree_count',['template'=>$template2,'options'=>['class'=>'da-form-col-3']])->textInput()?>
            		    <?= $form->field($model, 'against_count',['template'=>$template2,'options'=>['class'=>'da-form-col-3 omega']])->textInput()?>   
                       </div>
                        -->
              	      <div class="da-form-row">
            		    <?= $form->field($model, 'sort_num',['template'=>$template2,'options'=>['class'=>'da-form-col-6 alpha']])->textInput()?>
                      </div> 
            		
                    </div>
                </div>  
                <div class="da-panel collapsible collapsed">
                    <div class="da-panel-header">
                        <span class="da-panel-title">
                            <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/16/pencil.png" alt="">
                            SEO设置
                        </span>
                    </div>
            
                    <div class="da-panel-content">
                    
            		
            		    <?= $form->field($model, 'seo_title',['options'=>['class'=>'da-form-row da-form-block'],'size'=>'large'])->textInput(['maxlength' => 256])?>
            		    <?= $form->field($model, 'seo_keywords',['options'=>['class'=>'da-form-row da-form-block'],'size'=>'large'])->textInput(['maxlength' => 256])?>
            		    <?= $form->field($model, 'seo_description',['options'=>['class'=>'da-form-row da-form-block'],'size'=>'large'])->textarea(['maxlength' => 256,'rows'=>5])?>
            		
                    </div>
                </div>   
                <div class="da-panel collapsible collapsed">
                    <div class="da-panel-header">
                        <span class="da-panel-title">
                            <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/16/pencil.png" alt="">
                            模板设置
                        </span>
                    </div>
            
                    <div class="da-panel-content">
                    
            		
            		    <?= $form->field($model, 'view',['options'=>['class'=>'da-form-row da-form-block'],'size'=>'large'])->textInput(['maxlength' => 64])?>
            		    <?= $form->field($model, 'layout',['options'=>['class'=>'da-form-row da-form-block'],'size'=>'large'])->textInput(['maxlength' => 64])?>
            		
                    </div>
                </div>                             
            </div>

</div>			
<?php ActiveForm::end(); ?>
