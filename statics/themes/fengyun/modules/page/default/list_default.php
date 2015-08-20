<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Taxonomy;
/* @var $this yii\web\View */
$this->title = $taxonomyModel['name'];

?>

<?php if(!empty($taxonomyModel->id)):?>
    <header class="page-header">
    <h1 class="page-title"><?php echo $taxonomyModel->name ?></h1>
    <div class="taxonomy-description"><?php echo $taxonomyModel->description?></div>
    </header>
<?php endif;?>

<?php 
$this->loopData($rows,'//_inc/content_default');
        echo \statics\themes\fengyun\functions\LinkPager::widget([
            'pagination' => $pager
        ]);
?>


