<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model source\modules\fragment\models\FragmentCategory */

$this->title = '修改分类: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fragment Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
