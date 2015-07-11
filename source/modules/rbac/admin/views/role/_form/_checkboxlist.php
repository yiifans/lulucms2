<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */
/* @var $form yii\widgets\ActiveForm */

if(is_string($value))
{
    $value=explode(',', $value);
}
?>

    <ul class="da-form-list inline">
	<?php
        $options = explode("\r\n", $permission['default_value']);
        foreach ($options as $option)
        {
            $item = explode("|", $option);
            if($item[0]==='')
            {
                continue;
            }
            if(count($item)===1)
            {
                $item[]=$item[0];
            }
	?>
        <li><label><input type="checkbox" name="Permission[<?php echo $permission['id']?>][]" value="<?php echo $item[0]?>" <?php if(in_array($item[0], $value)){echo 'checked';}?>><?php echo $item[1]?></label></li>
	
	<?php }?>
	
    </ul>