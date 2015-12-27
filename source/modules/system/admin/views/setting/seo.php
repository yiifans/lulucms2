<?php
use yii\helpers\Html;
use source\core\widgets\ActiveForm;

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
	    <?= $form->field($model, 'sys_seo_title'); ?>
	    <?= $form->field($model, 'sys_seo_keywords')?>
	    <?= $form->field($model, 'sys_seo_description')->textarea()?>
	    <?= $form->field($model, 'sys_seo_head')->textarea()?>
    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>
           
