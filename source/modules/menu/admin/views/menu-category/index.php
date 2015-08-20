<?php

use yii\helpers\Html;
use source\core\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\MenuCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '菜单管理';
$this->addBreadcrumbs([
	$this->title,
]);
?>
<?php $this->toolbars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        
        'columns' => [
          
            [
              'class'=>'source\core\grid\TextIdColumn',
            ],
            [
    			'attribute'=>'name',
    			'format'=>'html',
                'width'=>'250px',
				'value'=>function ($model,$key,$index,$column)
					{
						return Html::a($model->name,['/menu/menu/index','category'=>$model->id]);
					}
			],
            [
            'attribute'=>'description',
            'width'=>'auto'
            ],
            ['class' => 'source\core\grid\ActionColumn'],
        ],
    ]); ?>

                   