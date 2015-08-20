<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model source\modules\fragment\models\Fragment2Data */

$this->title = '修改内容: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Fragment2 Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
