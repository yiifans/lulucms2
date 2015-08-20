<?php

use yii\helpers\Html;
use source\core\grid\GridView;
use source\LuLu;
use source\models\Content;
use source\libs\Constants;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$type='post';
$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;


?>

<?php $this->toolbars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save']),
    Html::a('设置', ['setting/index'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>

     
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
          
            [
            'class'=>'source\core\grid\IdColumn',
            ],
    		
            [
                'attribute'=>'title',
                'headerOptions'=>['width'=>'auto'],
            ],
          
            [
                'class'=>'source\core\grid\DateTimeColumn',
                'attribute' => 'updated_at',
            ],
            //'allow_comment',
            //'comments',
    		'userText',
            'comment_count',
    		'view_count',
            [
                'attribute'=>'status',
                'width'=>'25px',
                'content'=>function($model,$key,$index,$gridView){
                    return Constants::getStatusItemsForContent($model->status);
                },
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
             
           