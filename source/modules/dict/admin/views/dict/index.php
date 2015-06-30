<?php

use yii\helpers\Html;
use source\core\grid\GridView;
use source\LuLu;
use source\models\DictCategory;
use yii\helpers\Url;
use source\libs\Constants;

/* @var $this yii\web\View */
/* @var $searchModel source\models\search\DictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$category=LuLu::getGetValue('category');
$categoryModel = DictCategory::findOne(['id'=>$category]);

$this->title = '字典';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->toolbars([
    Html::a('返回', ['/dict/dict-category'], ['class' => 'btn btn-xs btn-primary mod-site-save']),
    Html::a('新建', ['create','category'=>$category], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
            
			[
				'attribute'=>'name',
			], 
            'value:ntext',
            // 'description',
            // 'thumb',
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