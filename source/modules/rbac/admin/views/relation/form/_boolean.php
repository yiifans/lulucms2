<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */

$value=intval($value);
?>

<ul class="da-form-list inline">
    <li><label><input type="radio" name="Permission[<?php echo $permission['id']?>]" value="1" <?php if($value===1){echo 'checked';}?>> 是</label></li>
    <li><label><input type="radio" name="Permission[<?php echo $permission['id']?>]" value="0" <?php if($value!==1){echo 'checked';}?>> 否</label></li>
</ul>
                                                    