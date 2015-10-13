<?php

use yii\helpers\Html;
use yii\helpers\Url;
use source\LuLu;
use source\libs\Constants;
use source\core\grid\GridView;
use source\modules\fragment\models\Fragment;


/* @var $this source\core\back\BackView */
/* @var $searchModel source\modules\fragment\models\search\Fragment2DataSearch */
/* @var $dataProvider source\core\data\ActiveDataProvider */

$fid = LuLu::getGetValue('fid');
$fragmentModel = Fragment::findOne(['id'=>$fid]);

$this->title = $fragmentModel->name.'(静态碎片)';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php  $this->toolbars([
    Html::a('返回', ['fragment/index','type'=>2], ['class' => 'btn btn-xs btn-primary mod-site-save']),
    Html::a('新建', ['create','fid'=>$fid], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            ['class' => 'source\core\grid\IdColumn'],
            [
                'attribute'=>'title',
                'width'=>'auto',
                'value'=>function($model,$key,$index,$column)
                {
                    return Html::a($model->title,['fragment2-data/update','id'=>$model->id,'type'=>2,'fid'=>$model->fragment_id]);
                }
            ],
            [
                'label'=>'图片',
                'value'=>function($model){
                    return $model->thumb;
                },
                'format'=>'image'
            ],
            [
                'class' => 'source\core\grid\DateTimeColumn',
                'attribute'=>'created_at'
            ],
            // 'created_by',
            ['class' => 'source\core\grid\SortColumn'],
            ['class' => 'source\core\grid\StatusColumn'],

            ['class' => 'source\core\grid\ActionColumn'],
        ],
    ]); ?>


</div>
