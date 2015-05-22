<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\LuLu;
use app\modules\rbac\models\Permission;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\PermissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$categoryId = LuLu::getGetValue('category_id');

$this->title = '权限管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permission-index">


    <p>
        <?= Html::a('新建权限', ['create','category_id'=>$categoryId], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'key',
            //'category_id',
            'name',
			[
				'class' =>'yii\grid\DataColumn',
				'attribute' => 'form',
				'value' => function($model){
					return Permission::getForms($model->form);
				}
			],
            //'data:ntext',
            // 'created_at',
            // 'updated_at',
            // 'note:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
