<?php

use yii\helpers\Html;
use source\core\widgets\ActiveForm;
use source\models\config\BasicConfig;
use source\libs\Common;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title='单面模块设置';
$this->addBreadcrumbs([
		'基本设置'
		]);
		
		$categories = Common::getTaxonomyCategories();
?>
    

                
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'page_taxonomy')->dropDownList(ArrayHelper::map($categories, 'id', 'name')) ?>
                   
                    <?= $form->defaultButtons() ?>
                <?php ActiveForm::end(); ?>
           