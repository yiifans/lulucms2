<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Content */


$this->title = '修改文章';
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
        'bodyModel'=>$bodyModel,
    ]) ?>