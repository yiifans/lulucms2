<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use source\models\config\BasicConfig;
use source\libs\Common;
use source\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title='文章模块设置';
$this->addBreadcrumbs([
		'基本设置'
		]);
		
		$categories = Common::getTakonomyCategories();
?>
    

                
                <?php $form = ActiveForm::begin(); ?>
                <div class="mod">
                    <div class="mod-head">
                        <h3>
                            <span class="pull-left"><?= $this->title ?></span>
                        </h3>
                    </div>
                    <div class="tab-content mod-content">
                    <?= $form->field($model, 'post_takonomy')->dropDownList(ArrayHelper::map($categories, 'id', 'name')) ?>
                   
                    </div>
                    
                    <div class="tab-content mod-content mod-one-btn">
                        <div class="center-block">
                            <button type="submit"  class="btn btn-primary" >保存设置</button>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
           