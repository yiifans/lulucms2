<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\LuLu;
use source\models\MenuCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$category=LuLu::getGetValue('category');
$categoryModel = MenuCategory::findOne(['id'=>$category]);

$this->title = '菜单项';
$this->addBreadcrumbs([
		['菜单管理',['/menu']],
		[$categoryModel['name'],['/menu/default/index','category'=>$category]],
		$this->title,
		]);

?>
                <div class="mod">
                    <div class="mod-head">
                        <h3>
                            <span class="pull-left"><?= $categoryModel['name'] ?></span>
            
                             
                            <span class="pull-right"><?= Html::a('新建', ['create','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
                            <span class="pull-right"><?= Html::a('返回', ['/menu/menu-category'], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
                             
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
					return str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $model->level).Html::a($model->name,['/menu/default/update','id'=>$model->id]);
				}
			], 
			[
			'attribute'=>'url',
			'headerOptions'=>['width'=>'500px']
			],
            [
            'attribute'=>'sort_num',
            'headerOptions'=>['width'=>'120px']
            ],
            [
                'attribute'=>'enabled',
                'headerOptions'=>['width'=>'120px']
            ],
            ['class' => 'source\core\grid\ActionColumn',
				'queryParams'=>['view'=>['category'=>$category]]
			],
        ],
    ]); ?>

                    </div>
                    
                   
                </div>
			
