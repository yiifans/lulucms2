<?php

use yii\helpers\Html;
use source\LuLu;
use source\libs\Common;
use source\core\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */


?>
<?php  $form = ActiveForm::begin(); ?>				
    <div class="mod">
        <div class="mod-head">
            <h3>
                <span class="pull-left"><?=  $this->title ?></span>
            </h3>
        </div>
        <div class="tab-content mod-content">
        content
        </div>
        
        <div class="tab-content mod-content mod-one-btn">
            <div class="center-block">
                <button type="submit"  class="btn btn-primary" >保存设置</button>
            </div>
        </div>
    </div>
<?php  ActiveForm::end(); ?>
