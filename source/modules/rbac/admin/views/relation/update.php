<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Relation */

$this->title = '修改权限: ' . ' ' . $model->role;
$this->params['breadcrumbs'][] = ['label' => '权限管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="relation-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
