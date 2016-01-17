<?php

use yii\helpers\Html;
use source\core\grid\GridView;
use source\LuLu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->toolbars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            ['class' => 'source\core\grid\IdColumn'],
            [
                'attribute'=>'username',
                'width'=>'auto',
            ],
            [
                'attribute'=>'email',
                'width'=>'120px',
            ],

            [
                'class' => 'source\core\grid\DateTimeColumn',
                'attribute'=>'created_at'
            ],
            ['class' => 'source\core\grid\StatusColumn'],
            // 'created_at',
            // 'updated_at',

            ['class' => 'source\core\grid\ActionColumn'],
        ],
    ]); ?>