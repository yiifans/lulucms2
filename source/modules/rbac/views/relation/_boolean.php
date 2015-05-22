<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */

$value=intval($value);
?>

<div id="permission-<?php echo $permission['key']?>">
<label><input type="radio" name="Permission[<?php echo $permission['key']?>]" value="1" <?php if($value===1){echo 'checked';}?>> 是</label>
<label><input type="radio" name="Permission[<?php echo $permission['key']?>]" value="0" <?php if($value!==1){echo 'checked';}?>> 否</label>
</div>
