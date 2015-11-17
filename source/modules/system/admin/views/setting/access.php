<?php
use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\models\config\BasicConfig;
use yii\helpers\ArrayHelper;
use source\modules\rbac\models\Role;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title = '注册与访问控制';
$this->addBreadcrumbs([
    $this->title
]);


?>


<?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sys_allow_register',['size'=>'small'])->checkbox([],false)?>
	    <?= $form->field($model, 'sys_default_role')->dropDownList(ArrayHelper::map(Role::buildOptions(), 'id', 'name','category')) ?>
	    
    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>
           

