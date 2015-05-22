<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use source\modules\system\models\config\DatetimeConfig;

/* @var $this yii\web\View */
/* @var $model app\models\config\Basic */
/* @var $form ActiveForm */

$this->title='时间设置';
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
	    <?= $form->field($model, 'sys_datetime_timezone')->dropDownList(DatetimeConfig::getTimezoneItems()); ?>
	    <?= $form->field($model, 'sys_datetime_date_format') ?>
	    <?= $form->field($model, 'sys_datetime_time_format') ?>
	    <?= $form->field($model, 'sys_datetime_pretty_format')->radioList(['1'=>'是','0'=>'否']) ?>
	   
                           </div>
                    
                    <div class="tab-content mod-content mod-one-btn">
                        <div class="center-block">
                            <button type="submit"  class="btn btn-primary" >保存设置</button>
                        </div>
                    </div>
                </div>
    <?php ActiveForm::end(); ?>

