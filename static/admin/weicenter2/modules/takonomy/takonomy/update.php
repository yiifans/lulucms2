<?php

use yii\helpers\Html;
use source\LuLu;
use source\core\Common;
use source\models\TakonomyCategory;

/* @var $this yii\web\View */
/* @var $model app\models\Takonomy */

$category=$model['category_id'];

$this->title = '更新分类项: '. $model->name;

$categoryModel = TakonomyCategory::findOne(['id'=>$category]);
$this->addBreadcrumbs([
		['分类管理',['/takonomy']],
		[$categoryModel['name'],['/takonomy/takonomy','category'=>$category]],
		$this->title,
		]);


?>
<div class="takonomy-update">

    <?= $this->render('_form', [
        'model' => $model,
    		'category'=>$category
    ]) ?>

</div>
