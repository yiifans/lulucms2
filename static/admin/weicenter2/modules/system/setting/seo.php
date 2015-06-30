<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use source\modules\system\models\config\DatetimeConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title = 'SEO设置';
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
	    <?= $form->field($model, 'sys_seo_title'); ?>
	    <?= $form->field($model, 'sys_seo_keywords')?>
	    <?= $form->field($model, 'sys_seo_description')->textarea(['rows'=>5])?>
    </div>

	<div class="tab-content mod-content mod-one-btn">
		<div class="center-block">
			<button type="submit" class="btn btn-primary">保存设置</button>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>

