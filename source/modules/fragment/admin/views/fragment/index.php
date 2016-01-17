<?php

use yii\helpers\Html;
use yii\helpers\Url;
use source\LuLu;
use source\libs\Constants;
use source\core\grid\GridView;
use source\modules\fragment\models\Fragment;
use source\libs\Resource;


/* @var $this source\core\back\BackView */
/* @var $searchModel source\modules\fragment\models\search\FragmentSearch */
/* @var $dataProvider source\core\data\ActiveDataProvider */


$type = LuLu::getGetValue('type');

$this->title = Fragment::getTypeItems($type);
$this->params['breadcrumbs'][] = $this->title;
?>
<?php  $this->toolbars([
    Html::a('新建', ['create','type'=>$type], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'source\core\grid\IdColumn'],
            'code',
            [
                'attribute'=>'name',
                'width'=>'250px',    
                'value'=>function($model,$key,$index,$column)
                {
                    $indexUrl = Url::to(['fragment'.$model->type.'-data/index','fid'=>$model->id,'type'=>$model->type]);
                    return Html::a($model->name,$indexUrl);
                }
            ],
            [
                'attribute'=>'description',
                'width'=>'auto',
            ],

            [
                
                'class' => 'source\core\grid\ActionColumn',
                'width' => '60px',
                'template'=>'{data-create}{update} {delete}',
                'buttons' =>[
                    'data-create'=>function ($url, $model, $key, $index, $gridView)
                    {
                        $addUrl = Url::to(['fragment'.$model->type.'-data/create','fid'=>$model->id,'type'=>$model->type]);
                        return Html::a('<img src="'.Resource::getAdminUrl().'/images/icons/color/text_signature.png">', $addUrl, [
                            'title' => '添加内容', 
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


