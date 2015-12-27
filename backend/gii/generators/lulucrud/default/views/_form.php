<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Inflector;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\core\widgets\ActiveForm;
use source\libs\Common;
use source\libs\Constants;
use source\libs\Resource;

/* @var $this source\core\back\BackView */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form source\core\widgets\ActiveForm */
?>

<?= "<?php " ?> $this->toolbars([
    Html::a('返回', ['index'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>



    <?= "<?php " ?>$form = ActiveForm::begin(); ?>

<?php foreach ($generator->getColumnNames() as $attribute) {
    if (in_array($attribute, $safeAttributes)) {
        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
    }
} ?>
    <?= "<?php " ?> $form->defaultButtons() ?>

    <?= "<?php " ?>ActiveForm::end(); ?>

