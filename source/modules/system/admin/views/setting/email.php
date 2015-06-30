<?php
use yii\helpers\Html;
use source\core\widgets\ActiveForm;
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
    <?= $form->defaultButtons() ?>
<?php ActiveForm::end(); ?>
           
                    