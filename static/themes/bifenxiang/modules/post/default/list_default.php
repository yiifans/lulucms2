<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Takonomy;
/* @var $this yii\web\View */
$this->title = $takonomyModel['name'];


?>


<div class="content-wrap">
    <div class="content">
        <?php 
        $this->loopData($rows,'/views/_inc/content_default');
        $this->linkPager($pager);
        ?>
    </div>
</div>
<aside class="sidebar">
    <?php echo $this->render(Resource::getThemePath('/views/_inc/takonomy'),['takonomyId'=>'post_takonomy']);?>
    <div class="widget d_postlist">
        <div class="title">
            <h2>热评文章</h2>
        </div>
        <ul>
            <?php
            $datas = $this->getDataSource(null,'comment_count desc',3);
            $this->loopData($datas,'/views/_inc/item_pic');
            ?>
        </ul>
    </div>
    <div class="widget ds-widget-recent-visitors">
        <div class="title">
            <h2>最近访客</h2>
        </div>
        <ul class="ds-recent-visitors" data-num-items="15" data-show-time="0" data-avatar-size="50">
        </ul>
    </div>

</aside>



