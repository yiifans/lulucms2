<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaxonomyContent */

$this->title = 'Create Taxonomy Content';
$this->params['breadcrumbs'][] = ['label' => 'Taxonomy Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taxonomy-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
