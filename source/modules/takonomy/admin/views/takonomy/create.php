<?php

use yii\helpers\Html;
use source\core\lib\Common;
use source\LuLu;
use source\models\TakonomyCategory;


/* @var $this yii\web\View */
/* @var $model app\models\Takonomy */
$category= LuLu::getGetValue('category');

$this->title = '新建分类项';

$category=LuLu::getGetValue('category');
$categoryModel = TakonomyCategory::findOne(['id'=>$category]);
$this->addBreadcrumbs([
			['分类管理',['/takonomy']],
			[$categoryModel['name'],['/takonomy/takonomy','category'=>$category]],
			$this->title,
		]);




?>
<div class="takonomy-create">

    <?= $this->render('_form', [
        'model' => $model,
    		'category'=>$category,
    ]) ?>

</div>
