<?php
use yii\helpers\Html;
use source\core\widgets\ActiveForm;

use source\modules\system\models\config\DatetimeConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title = '时间设置';
$this->addBreadcrumbs([
    $this->title
]);
?>


<?php $form = ActiveForm::begin(); ?>
	    <?= $form->field($model, 'sys_datetime_timezone')->dropDownList(DatetimeConfig::getTimezoneItems()); ?>
	    <?= $form->field($model, 'sys_datetime_date_format')?>
	    <?= $form->field($model, 'sys_datetime_time_format')->radioList(['24'=>'24 小时制','12'=>'12 小时制','0'=>'不显示时间'])?>
	    <?= $form->field($model, 'sys_datetime_pretty_format')->radioList(['1'=>'是','0'=>'否'])?>
    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>
           
