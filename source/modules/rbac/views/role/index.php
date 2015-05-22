<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use source\LuLu;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$categoryId = LuLu::getGetValue('category_id');
$roles = Yii::$app->rbacManager->getPermissionsByUser('admin111'); //getPermissionsByUser

$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <p>
        <?= Html::a('新建角色', ['create','category_id'=>$categoryId], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'key',
            //'category_id',
            'name',
            //'created_at',
            //'updated_at',
            // 'note:ntext',

            ['class' => 'yii\grid\ActionColumn',
				'template'=>'{permission}{view}{update} {delete}',
				'buttons' =>['permission'=>function ($url,$model) {
					return Html::a('设定权限',Url::to(['relation/index','role'=>$model['key']]));
				}],
			],
        ],
    ]); ?>

</div>
