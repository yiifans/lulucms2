<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\TakonomyCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类管理';
$this->addBreadcrumbs([
	$this->title,
]);


?>
                <div class="mod">
                    <div class="mod-head">
                        <h3>
                            <span class="pull-left"><?= $this->title ?></span>
            
                             
                            <span class="pull-right"><?= Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
                             
                        </h3>
                    </div>
                    <div class="tab-content mod-content">
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
            'attribute'=>'id',
            'headerOptions'=>['width'=>'120px']
            ],
            [
                'attribute'=>'name',
                'format'=>'html',
                'headerOptions'=>['width'=>'250px'],
                'value'=>function ($model,$key,$index,$column)
                {
            
                    return Html::a($model->name,['/takonomy/takonomy/index','category'=>$model->id]);
                }
            ],
            'description',

            [
				'class' => 'source\core\grid\ActionColumn',
				
				'buttons'=>['view'=>function ($url, $model,$key,$index,$column){
						
						return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['takonomy/index','category'=>$key]), [
							'title' => Yii::t('yii', 'View'),
							'data-pjax' => '0',
						]);
					}
				],
			],
        ],
    ]); ?>


                    </div>
                    
                   
                </div>
