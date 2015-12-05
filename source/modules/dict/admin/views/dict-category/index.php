<?php

use yii\helpers\Html;
use source\core\grid\GridView;
use source\LuLu;
use yii\helpers\Url;
use source\libs\Constants;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\DictCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '字典';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->toolbars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
						
						return Html::a($model->name,['/dict/dict/index','category'=>$model->id]);
					}
			],
            [
                'attribute'=>'description',
                'width'=>'auto',
            ],

            ['class' => 'source\core\grid\ActionColumn'],
        ],
    ]); ?>