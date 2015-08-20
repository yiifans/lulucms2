<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TaxonomyType */

$this->title = 'Update Taxonomy Type: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Taxonomy Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taxonomy-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
