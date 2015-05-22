<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveFormAsset;
use source\LuLu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\RelationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$user = LuLu::getGetValue('user');

$this->title = '用户名：'.$user;
$this->params['breadcrumbs'][] = ['label' => '指派角色', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="relation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $form=ActiveForm::begin();?>
    
    <div>
    	<ul>
    		<?php foreach ($allRoles as $role):?>
    		<?php 
    			$checked='';
    			if($userRoles!=null&&isset($userRoles[$role['key']]))
    			{
    				
    				$checked='checked="checked"';
    			}
    			
    		?>
    		<li>
    			<label><input type="checkbox" name="roles[]" value="<?php echo $role['key']?>" <?php echo $checked?>/><?php echo $role['name']?></label>
    			(<?php echo Html::a('查看权限',['relation/index','role'=>$role['key']])?>)
    		</li>
    		
    		<?php endforeach;?>
    	</ul>
    </div>
    <div>
    <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end();?>
    
</div>
