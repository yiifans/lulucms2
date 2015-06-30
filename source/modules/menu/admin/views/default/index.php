<?php

use yii\helpers\Html;
use source\core\grid\GridView;
use source\LuLu;
use source\models\MenuCategory;
use yii\helpers\Url;
use source\libs\Constants;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$category=LuLu::getGetValue('category');
$categoryModel = MenuCategory::findOne(['id'=>$category]);

$this->title = $categoryModel['name'];
$this->addBreadcrumbs([
		['菜单管理',['/menu']],
		[$categoryModel['name'],['/menu/default/index','category'=>$category]],
		$this->title,
		]);

?>

<?php $this->toolbars([
    Html::a('返回', ['/menu/menu-category'], ['class' => 'btn btn-xs btn-primary mod-site-save']),
    Html::a('新建', ['create','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
			[
				'attribute'=>'name',
				'format'=>'html',
				'value'=>function ($model,$key,$index,$column){
					return str_repeat(Constants::TabSize, $model->level).Html::a($model->name,['/menu/default/update','id'=>$model->id]);
				}
			], 
			[
			'attribute'=>'url',
			'headerOptions'=>['width'=>'500px']
			],
			[
    			'attribute'=>'targetText',
    			'headerOptions'=>['width'=>'80px'],
			],
            [
            'attribute'=>'sort_num',
            'headerOptions'=>['width'=>'80px']
            ],
            [
                'attribute'=>'statusText',
                'headerOptions'=>['width'=>'80px'],
            ],
            ['class' => 'source\core\grid\ActionColumn',
				'queryParams'=>['view'=>['category'=>$category]]
			],
        ],
    ]); ?>

                 
