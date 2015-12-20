<?php
echo "<?php\n";
?>

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;
use source\core\grid\GridView;
use source\core\widgets\ActiveForm;

/* @var $this source\core\back\BackView */


?>
<?= "<?php " ?> $form = ActiveForm::begin(); ?>				
    <div class="mod">
        <div class="mod-head">
            <h3>
                <span class="pull-left"><?= "<?= " ?> $this->title ?></span>

                <!-- 
                <span class="pull-right"><?= "<?= " ?> Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
                 -->
            </h3>
        </div>
        <div class="tab-content mod-content">
        content
        </div>
        
        <div class="tab-content mod-content mod-one-btn">
            <div class="center-block">
                <?= "<?= " ?> Html::submitButton($model->isNewRecord ? '新建' : '保存设置', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>
<?= "<?php " ?> ActiveForm::end(); ?>
