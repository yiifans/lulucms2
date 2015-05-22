<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */

$value=explode(',', $value);
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
	<div class="checkbox">
	<label><input type="checkbox" name="Permission[<?php echo $permission['key']?>][]" value="<?php echo $item[0]?>" <?php if(in_array($item[0], $value)){echo 'checked';}?>><?php echo $item[1]?></label>
	</div>
	<?php }?>
</div>
