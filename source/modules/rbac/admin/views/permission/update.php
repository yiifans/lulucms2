<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Permission */

$this->title = '修改权限: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '权限管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>