<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;

/* @var $this yii\web\View */

?>

<div class="sidebar span4" id="sidebar" data-motopress-type="static-sidebar" data-motopress-sidebar-file="sidebar.php">
    <?php echo $this->render('taxonomy');?>
    
    
    <div id="my-recent-comments-6" class="widget">
        <h3>热门文章</h3>
        <ul class="comments-custom unstyled">
            <?php
            $datas = $this->getDataSource(null,null,4,['is_pic'=>true]);
            $this->loopData($datas,'//_inc/item_pic');
            ?>
        </ul>
    </div>
</div>
