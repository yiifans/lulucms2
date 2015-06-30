<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model source\models\Dict */

$this->title = '新建字典';
$this->params['breadcrumbs'][] = ['label' => 'Dicts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
