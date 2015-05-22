<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\LuLu;
use source\models\Content;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$type='post';
$this->title = '页面管理';
$this->params['breadcrumbs'][] = $this->title;


?>
            <div class="mod">
                <div class="mod-head">
                    <h3>
                        <span class="pull-left"><?= Html::encode($this->title) ?></span>
        
                        <span class="pull-right"><?= Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
                    </h3>
                </div>
                
                <div class="tab-content mod-content">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
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

                </div>
                <!-- 
                <div class="tab-content mod-content mod-one-btn">
                    <div class="center-block">
                        <input type="button" value="保存设置" class="btn btn-primary" onclick="AWS.ajax_post($('#settings_form'));" />
                    </div>
                </div>
                 -->
            </div>
