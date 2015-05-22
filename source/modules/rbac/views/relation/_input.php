<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */
?>


<div id="permission-<?php echo $permission['key']?>">
<input type="text" class="form-control" name="Permission[<?php echo $permission['key']?>]" value="<?php echo $value?>"/>
</div>
