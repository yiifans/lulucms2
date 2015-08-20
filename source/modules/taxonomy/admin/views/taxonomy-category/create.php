<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model source\models\TaxonomyCategory */

$this->title = '新建分类';
$this->addBreadcrumbs([
		['分类管理',['/taxonomy']],
		$this->title,
		]);


?>
 <?= $this->render('_form', [
        'model' => $model,
    ]) ?>