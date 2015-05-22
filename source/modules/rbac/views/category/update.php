<?php

use yii\helpers\Html;
use app\modules\rbac\models\Category;
use source\LuLu;

/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Category */
$type=$model->type;

$this->title = '修改分类: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Category::getTypes($type), 'url' => ['index','type'=>$type]];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
