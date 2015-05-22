<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */

$this->title = 'Create Relation';
$this->params['breadcrumbs'][] = ['label' => 'Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
