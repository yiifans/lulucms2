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
<div class="takonomy-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
