<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveFormAsset;
use source\LuLu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\RelationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$role = LuLu::getGetValue('role');

$this->title = '设定权限';
$this->params['breadcrumbs'][] = ['label' => '角色管理', 'url' => ['role/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="relation-index">

    <h1><?= $role ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?php $form=ActiveForm::begin();?>

    		<?php foreach ($allPermissions as $permission):?>
    		<?php 
    			$checked='';
    			$value='';
    			
    			if($rolePermissions!=null&&isset($rolePermissions[$permission['key']]))
    			{
    				
    				$checked='checked="checked"';
    				$value=$rolePermissions[$permission['key']]['value'];
    			}
    			
    		?>
    		    <div class="form-group field-permission-<?php echo $permission['key']?>">
					<label class="control-label" for="permission-<?php echo $permission['key']?>"><?php echo $permission['name']?></label>
					
					<?php echo $this->render($permission['formView'], ['value'=>$value,'permission'=>$permission]);?>
					<div class="help-block"></div>
				</div>
	
    		<?php endforeach;?>
    	
    <div>
    <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end();?>
    
</div>
