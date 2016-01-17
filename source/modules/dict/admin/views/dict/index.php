<?php

use yii\helpers\Html;
use yii\helpers\Url;
use source\LuLu;
use source\libs\Constants;
use source\core\grid\GridView;
use source\modules\dict\models\DictCategory;

/* @var $this source\core\back\BackView */
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
            'class'=>'source\core\grid\IdColumn',
            ],            
			[
				'attribute'=>'name',
			    'width'=>'250px',
			], 
            [
                'attribute'=>'value',
                'format'=>'ntext',
                'width'=>'auto',
            ],            
            
            // 'description',
            // 'thumb',
            [
              'class'=>'source\core\grid\SortColumn',
            ],
            [
              'class'=>'source\core\grid\StatusColumn',
            ],
            ['class' => 'source\core\grid\ActionColumn',
				'queryParams'=>['view'=>['category'=>$category]]
			],

        ],
    ]); ?>