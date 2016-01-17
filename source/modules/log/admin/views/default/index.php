<?php

use yii\helpers\Inflector;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\core\grid\GridView;
use source\libs\Common;
use source\libs\Constants;
use source\libs\Resource;


/* @var $this source\core\back\BackView */
/* @var $searchModel source\modules\log\models\search\LogSearch */
/* @var $dataProvider source\core\data\ActiveDataProvider */

$this->title = '日志管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'source\core\grid\IdColumn'],
            
            'category',
            
            // 'message:ntext',
        [
            'attribute'=>'message',
            'headerOptions'=>['width'=>'auto'],
        ],
        
        [
        'attribute'=>'log_time',
        'value' => function ($data) {
                $time = intval($data['log_time']);
                return date('m-d H:i',$time);
            },
        ],
       
        'prefix:ntext',
        [
            'class' => 'source\core\grid\ActionColumn',
            'template'=>'{delete}',
            //'buttons' =>[
            //    'data'=>function ($url, $model, $key, $index, $gridView)
            //    {
            //        return Html::a('<img src="'.Resource::getAdminUrl().'/images/icons/color/magnifier.png">', $url, [
            //            'title' => '查看内容', 
            //        ]);
            //    },
            //    'add-data'=>function ($url, $model, $key, $index, $gridView)
            //    {
            //        return Html::a('<img src="'.Resource::getAdminUrl().'/images/icons/color/magnifier.png">', $url, [
            //            'title' => '添加内容', 
            //        ]);
            //    }
            //]
        ],            
    ],
]); ?>



