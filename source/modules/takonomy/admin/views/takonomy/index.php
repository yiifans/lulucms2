<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\LuLu;
use source\core\lib\Common;
use source\models\Takonomy;
use source\models\TakonomyCategory;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TakonomySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title='分类项';
$category=LuLu::getGetValue('category');
$categoryModel = TakonomyCategory::findOne(['id'=>$category]);
$this->addBreadcrumbs([
		['分类管理',['/takonomy']],
		$categoryModel['name'],
]);

?>
                <div class="mod">
                    <div class="mod-head">
                        <h3>
                            <span class="pull-left"><?= $categoryModel['name']?></span>
            
                             
                            <span class="pull-right"><?= Html::a('新建', ['create','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
                            <span class="pull-right"><?= Html::a('返回', ['/takonomy/takonomy-category/index'], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
                             
                        </h3>
                    </div>
                    <div class="tab-content mod-content">
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
	
				'attribute'=>'name',
				'format'=>'html',
				 'value'=>function ($model,$key,$index,$column){
						return str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $model->level).Html::a($model->name,['takonomy/update','id'=>$model->id]);
				    }
			],
           
            // 'description',
            // 'contents',
            
            [
            'attribute'=>'url_alias',
            'headerOptions'=>['width'=>'500px']
            ],
            [
                'attribute'=>'sort_num',
                'headerOptions'=>['width'=>'120px']
            ],
            ['class' => 'source\core\grid\ActionColumn',
				'queryParams'=>['view'=>['category'=>$category]]
],
        ],
    ]); ?>


                    </div>
                    
                   
                </div>
