<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model source\models\DictCategory */

$this->title = '修改分类: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Dict Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
