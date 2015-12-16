<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TaxonomyContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taxonomy Contents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taxonomy-content-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Taxonomy Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'taxonomy_id',
            'content_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
