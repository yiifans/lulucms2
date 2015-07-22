<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TakonomyType */

$this->title = 'Update Takonomy Type: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Takonomy Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="takonomy-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
