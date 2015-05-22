<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\LuLu;
use app\modules\rbac\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\rbac\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$type = LuLu::getGetValue('type');

$this->title = Category::getTypes($type);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <p>
        <?= Html::a('新建分类', ['create','type'=>$type], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'sort_num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
