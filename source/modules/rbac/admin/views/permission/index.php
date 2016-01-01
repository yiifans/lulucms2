<?php

use yii\helpers\Html;
use source\core\grid\GridView;
use source\LuLu;
use source\modules\rbac\models\Permission;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\PermissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$categoryId = LuLu::getGetValue('category');

$this->title = '权限管理';
$this->params['breadcrumbs'][] = $this->title;

$columns =  [
        
    [
        'attribute'=>'id',
        'width'=>'150px',
    ],
    [
        'attribute'=>'name',
        'width'=>'250px',
    ],
    [
        'attribute'=>'description',
        'width'=>'auto'
    ],
	[
		'attribute' => 'form',
		'value' => function($model){
			return Permission::getFormItems($model->form);
		}
	],

	['class' => 'source\core\grid\SortColumn'],
    ['class' => 'source\core\grid\ActionColumn'],
];
?>
<?php $this->toolbars([
    Html::a('新建权限', ['create','category'=>$categoryId], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>

    <div class="da-ex-tabs">
        <ul>
            <!-- <li><a href="#tabs-<?php echo Permission::Category_Basic?>">基本权限</a></li> -->
            <li><a href="#tabs-<?php echo Permission::Category_Controller?>">控制器权限</a></li>
            <li><a href="#tabs-<?php echo Permission::Category_System?>">系统权限</a></li>
        </ul>
        
        <!-- 
        <div id="tabs-<?php echo Permission::Category_Basic?>">
    <?= GridView::widget([
        'dataProvider' => $basicsDataProvider,
        'columns' => $columns,
    ]); ?>        
        </div>
         -->
         
        <div id="tabs-<?php echo Permission::Category_Controller?>">
    <?= GridView::widget([
        'dataProvider' => $controllersDataProvider,
        'columns' => $columns,
    ]); ?>        
        </div>
        <div id="tabs-<?php echo Permission::Category_System?>">
    <?= GridView::widget([
        'dataProvider' => $systemsDataProvider,
        'columns' => $columns,
    ]); ?>        
        </div>      
    </div>
    
