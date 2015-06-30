<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TakonomyContent */

$this->title = 'Create Takonomy Content';
$this->params['breadcrumbs'][] = ['label' => 'Takonomy Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takonomy-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
