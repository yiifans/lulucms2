<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'created_at',
            'modified_at',
            'allow_comment',
            // 'comments',
            // 'views',
            // 'diggs',
            // 'burys',
            // 'sticky',
            // 'password',
            // 'visibility',
            // 'status',
            // 'thumb',
            // 'title',
            // 'alias',
            // 'excerpt',
            // 'content:ntext',
            // 'content_type',
            // 'template',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
