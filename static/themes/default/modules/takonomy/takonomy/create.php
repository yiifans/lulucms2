<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Takonomy */

$this->title = 'Create Takonomy';
$this->params['breadcrumbs'][] = ['label' => 'Takonomies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="takonomy-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
