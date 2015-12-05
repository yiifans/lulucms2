<?php

use yii\helpers\Html;
use source\LuLu;
use source\modules\menu\models\MenuCategory;


/* @var $this yii\web\View */
/* @var $model source\models\Menu */

$category=LuLu::getGetValue('category');
$categoryModel = MenuCategory::findOne(['id'=>$category]);

$this->title = '新建菜单项';
$this->addBreadcrumbs([
		['菜单管理',['/menu']],
		[$categoryModel['name'],['/menu/default/index','category'=>$category]],
		$this->title,
		]);
?>

<?= $this->render('_form', [
        'model' => $model,
    ]) ?>