<?php

use yii\helpers\Html;
use source\core\grid\GridView;
use source\LuLu;
use source\models\Content;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$type='post';
$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;


?>

<?php $this->toolbars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>

     
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
          
    		[
    		'attribute'=>'id',
    		'headerOptions'=>['style'=>'width:80px;']
    		],
    		
    		'title',
          
    		[
    		'attribute'=>'updated_at',
    		'format'=>'datetime',
    		'headerOptions'=>['style'=>'width:200px;']
    		],
            //'allow_comment',
            //'comments',
    		[
    		'attribute'=>'user_id',
    		'headerOptions'=>['style'=>'width:80px;']
    		],
            [
    			'attribute'=>'comment_count',
    			'headerOptions'=>['style'=>'width:80px;']
			],
    		[
    		'attribute'=>'view_count',
    		'headerOptions'=>['style'=>'width:80px;']
    		],
    		[
    		'attribute'=>'status',
    		'headerOptions'=>['style'=>'width:80px;']
    		],
            // 'diggs',
            // 'burys',
            // 'sticky',
            // 'password',
            // 'visibility',
            //'status',
            // 'thumb',
            // 
            // 'alias',
            // 'excerpt',
            // 'content:ntext',
            // 'content_type',
            // 'template',

            ['class' => 'source\core\grid\ActionColumn'],
        ],
    ]); ?>                
             
           