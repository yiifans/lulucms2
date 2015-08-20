<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model source\modules\fragment\models\FragmentCategory */

$this->title = '新建分类';
$this->params['breadcrumbs'][] = ['label' => 'Fragment Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
