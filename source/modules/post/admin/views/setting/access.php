<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use source\models\config\BasicConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title='注册与访问控制';
$this->addBreadcrumbs([
		'基本设置'
		]);
?>



    <?php $form = ActiveForm::begin(); ?>
                <div class="mod">
                    <div class="mod-head">
                        <h3>
                            <span class="pull-left"><?= $this->title ?></span>
            
                            <!-- 
                            <span class="pull-right"><?= Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
                             -->
                        </h3>
                    </div>
                    <div class="tab-content mod-content">
                    <?= $form->field($model, 'sys_allow_register')->checkbox() ?>
            	    <?= $form->field($model, 'sys_default_role')->dropDownList(['subscriber'=>'订阅者','contributor'=>'投稿者','administrator'=>'管理员']) ?>
    
                    </div>
                    
                    <div class="tab-content mod-content mod-one-btn">
                        <div class="center-block">
                            <button type="submit"  class="btn btn-primary" >保存设置</button>
                        </div>
                    </div>
                </div>
    <?php ActiveForm::end(); ?>


