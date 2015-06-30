<?php

use yii\helpers\Html;
use source\core\grid\GridView;
use source\LuLu;
use source\models\Content;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$type='post';
$this->title = '页面管理';
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
    		'headerOptions'=>['style'=>'width:60px;']
    		],
    		
    		'title',
          
    		[
    		'attribute'=>'updated_at',
    		'format'=>['datetime', 'php:Y-m-d H:m:s'],
    		'headerOptions'=>['style'=>'width:120px;']
    		],
            //'allow_comment',
            //'comments',
    		[
    		'attribute'=>'userText',
    		'headerOptions'=>['style'=>'width:60px;']
    		],
            [
    			'attribute'=>'comment_count',
    			'headerOptions'=>['style'=>'width:60px;']
			],
    		[
    		'attribute'=>'view_count',
    		'headerOptions'=>['style'=>'width:60px;']
    		],
    		[
    		'attribute'=>'statusText',
    		'headerOptions'=>['style'=>'width:60px;']
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

