<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */
?>


<textarea rows="5" class="form-control" name="Permission[<?php echo $permission['id']?>]" ><?php echo $value?></textarea>