<?php

use yii\helpers\Html;
use source\LuLu;
use source\core\Common;
use source\modules\taxonomy\models\TaxonomyCategory;

/* @var $this yii\web\View */
/* @var $model app\models\Taxonomy */

$category=$model['category_id'];

$this->title = '更新分类项: '. $model->name;

$categoryModel = TaxonomyCategory::findOne(['id'=>$category]);
$this->addBreadcrumbs([
		['分类管理',['/taxonomy']],
		[$categoryModel['name'],['/taxonomy/taxonomy','category'=>$category]],
		$this->title,
		]);


?>
<div class="taxonomy-update">

    <?= $this->render('_form', [
        'model' => $model,
    		'category'=>$category
    ]) ?>

</div>
