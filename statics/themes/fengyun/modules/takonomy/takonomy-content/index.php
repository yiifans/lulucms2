<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TakonomyContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Takonomy Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takonomy-content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Takonomy Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'takonomy_id',
            'content_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
