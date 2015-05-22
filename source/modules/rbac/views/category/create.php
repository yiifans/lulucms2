<?php

use yii\helpers\Html;
use app\modules\rbac\models\Category;
use source\LuLu;


/* @var $this yii\web\View */
/* @var $model app\modules\rbac\models\Category */
$type=LuLu::getGetValue('type');

$this->title = '新建分类';
$this->params['breadcrumbs'][] = ['label' => Category::getTypes($type), 'url' => ['index','type'=>$type]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
