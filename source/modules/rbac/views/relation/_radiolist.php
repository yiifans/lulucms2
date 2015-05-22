<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */
?>

<div id="permission-<?php echo $permission['key']?>">
	<?php
	
	$options = explode("\r\n", $permission['options']);
	
	foreach ($options as $option){
		$item = explode("|", $option);
		if(count($item)!==2)
		{
			$item[]=$item[0];
		}
	?>
	<div class="radio">
	<label><input type="radio" name="Permission[<?php echo $permission['key']?>]" value="<?php echo $item[0]?>" <?php if($value===$item[0]){echo 'checked';}?>><?php echo $item[1]?></label>
	</div>
	<?php }?>
</div>
