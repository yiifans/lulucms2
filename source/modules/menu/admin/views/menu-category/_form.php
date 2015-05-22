<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model source\models\MenuCategory */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>
<div class="mod">
	<div class="mod-head">
		<h3>
			<span class="pull-left"><?= $this->title ?></span> <span
				class="pull-right"><?= Html::a('返回', ['index'], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
		</h3>
	</div>
	<div class="tab-content mod-content">
        <?= $form->field($model, 'id')->textInput(['maxlength' => 64,'readonly'=>$model->isNewRecord?null:'readonly'])?>
    
        <?= $form->field($model, 'name')->textInput(['maxlength' => 64])?>
    
        <?= $form->field($model, 'description')->textInput(['maxlength' => 512])?>

    </div>

	<div class="tab-content mod-content mod-one-btn">
		<div class="center-block">
                            <?= Html::submitButton($model->isNewRecord ? '添加' : '保存设置', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
                        </div>
	</div>
</div>
<?php ActiveForm::end(); ?>