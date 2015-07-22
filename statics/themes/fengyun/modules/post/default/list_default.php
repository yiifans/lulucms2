<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Takonomy;
/* @var $this yii\web\View */
$this->title = $takonomyModel['name'];


?>

<?php if(!empty($takonomyModel->id)):?>
    <header class="page-header">
    <h1 class="page-title"><?php echo $takonomyModel->name ?></h1>
    <div class="taxonomy-description"><?php echo $takonomyModel->description?></div>
    </header>
<?php endif;?>
				
<?php 
$this->loopData($rows,'//_inc/content_default');
        echo \statics\themes\fengyun\functions\LinkPager::widget([
            'pagination' => $pager
        ]);
?>


