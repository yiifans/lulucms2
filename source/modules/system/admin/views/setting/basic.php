<?php
use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\models\config\BasicConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title = '站点信息';
$this->addBreadcrumbs([
    $this->title
]);
?>
    
<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'sys_site_name')?>
    <?= $form->field($model, 'sys_site_description')?>
    <?= $form->field($model, 'sys_site_email')?>
    <?= $form->field($model, 'sys_lang')->dropDownList(['zh-CN'=>'中文','en-US'=>'英文'])?>
    <?= $form->field($model, 'sys_icp')?>
    <?= $form->field($model, 'sys_stat')->textarea(['rows'=>5])?>
    <?= $form->field($model, 'sys_status')->radioList(['1'=>'正常','0'=>'关闭'])?>
    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>
           