<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model source\models\Dict */

$this->title = 'Create Dict';
$this->params['breadcrumbs'][] = ['label' => 'Dicts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dict-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
