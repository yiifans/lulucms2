<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
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
						
						return Html::a($model->name,['/menu/default/index','category'=>$model->id]);
					}
			],
            'description',
            ['class' => 'source\core\grid\ActionColumn'],
        ],
    ]); ?>

                    </div>
                    
                   
                </div>
