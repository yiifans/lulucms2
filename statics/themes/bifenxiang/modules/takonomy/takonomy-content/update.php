<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TakonomyContent */

$this->title = 'Update Takonomy Content: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Takonomy Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="takonomy-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
