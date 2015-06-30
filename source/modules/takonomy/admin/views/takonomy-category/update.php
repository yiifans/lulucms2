<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model source\models\TakonomyCategory */

$this->title = '修改: ' . ' ' . $model->name;

$this->addBreadcrumbs([
		['分类管理',['/takonomy']],
		$this->title,
		]);


?>
 <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
