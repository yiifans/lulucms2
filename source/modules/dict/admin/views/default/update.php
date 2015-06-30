<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model source\models\Dict */

$this->title = 'Update Dict: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dicts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dict-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
