<?php

use yii\helpers\Html;
use source\core\lib\Common;
use source\LuLu;
use source\modules\taxonomy\models\TaxonomyCategory;


/* @var $this yii\web\View */
/* @var $model app\models\Taxonomy */
$category= LuLu::getGetValue('category');

$this->title = '新建分类项';

$category=LuLu::getGetValue('category');
$categoryModel = TaxonomyCategory::findOne(['id'=>$category]);
$this->addBreadcrumbs([
			['分类管理',['/taxonomy']],
			[$categoryModel['name'],['/taxonomy/taxonomy','category'=>$category]],
			$this->title,
		]);




?>
<div class="taxonomy-create">

    <?= $this->render('_form', [
        'model' => $model,
    		'category'=>$category,
    ]) ?>

</div>
