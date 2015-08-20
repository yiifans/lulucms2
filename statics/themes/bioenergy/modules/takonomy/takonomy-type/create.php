<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TaxonomyType */

$this->title = 'Create Taxonomy Type';
$this->params['breadcrumbs'][] = ['label' => 'Taxonomy Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taxonomy-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
