<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */

$this->title = $model->role;
$this->params['breadcrumbs'][] = ['label' => 'Relations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'role' => $model->role, 'permission' => $model->permission], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'role' => $model->role, 'permission' => $model->permission], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'role',
            'permission',
            'rule',
            'data:ntext',
            'note:ntext',
        ],
    ]) ?>

</div>
