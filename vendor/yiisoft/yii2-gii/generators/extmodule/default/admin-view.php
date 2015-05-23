<?php
echo "<?php\n";
?>
use yii\helpers\Html;
use source\LuLu;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */
?>
<div class="mod">
    <div class="mod-head">
        <h3>
            <span class="pull-left"><?= "<?= " ?> $this->title ?></span>

            <span class="pull-right"><?= "<?= " ?> Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save']) ?></span>
        </h3>
    </div>
    
    <div class="tab-content mod-content">
    content
    </div>
</div>

