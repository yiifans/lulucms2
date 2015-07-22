<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TakonomyType */

$this->title = 'Create Takonomy Type';
$this->params['breadcrumbs'][] = ['label' => 'Takonomy Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takonomy-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
