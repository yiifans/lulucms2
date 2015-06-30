<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model source\models\MenuCategory */

$this->title = '修改菜单分类: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Menu Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= $this->render('_form', [
        'model' => $model,
    ]) ?>