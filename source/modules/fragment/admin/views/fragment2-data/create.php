<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model source\modules\fragment\models\Fragment2Data */

$this->title = '添加内容';
$this->params['breadcrumbs'][] = ['label' => 'Fragment2 Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
