<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaxonomyContent */

$this->title = 'Update Taxonomy Content: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Taxonomy Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taxonomy-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
