<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model source\modules\fragment\models\Fragment1Data */

$this->title = '新建内容';
$this->params['breadcrumbs'][] = ['label' => 'Fragment1 Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
