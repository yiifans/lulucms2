<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use source\models\config\BasicConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title = 'Email 设置';
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
	<div class="tab-content mod-content"></div>

	<div class="tab-content mod-content mod-one-btn">
		<div class="center-block">
			<button type="submit" class="btn btn-primary">保存设置</button>
		</div>
	</div>
</div>
<?php ActiveForm::end(); ?>
                    