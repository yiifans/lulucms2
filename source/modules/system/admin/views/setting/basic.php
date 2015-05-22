<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use source\models\config\BasicConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title = '站点设置';
$this->addBreadcrumbs([
    $this->title
]);
?>
    
<?php $form = ActiveForm::begin(); ?>
<div class="mod">
	<div class="mod-head">
		<h3>
			<span class="pull-left"><?= $this->title ?></span>
		</h3>
	</div>
	<div class="tab-content mod-content">
        <?= $form->field($model, 'sys_site_name')?>
        <?= $form->field($model, 'sys_site_description')?>
	    <?= $form->field($model, 'sys_site_email')?>
	    <?= $form->field($model, 'sys_lang')->dropDownList(['zh-CN'=>'中文','en-US'=>'英文'])?>
	    <?= $form->field($model, 'sys_icp')?>
	    <?= $form->field($model, 'sys_stat')->textarea(['rows'=>5])?>
	    <?= $form->field($model, 'sys_status')->radioList(['1'=>'正常','0'=>'关闭'])?>
    </div>

	<div class="tab-content mod-content mod-one-btn">
		<div class="center-block">
			<button type="submit" class="btn btn-primary">保存设置</button>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>
           