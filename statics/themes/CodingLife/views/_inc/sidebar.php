<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;

/* @var $this yii\web\View */

?>
<div id="sideBar">
    <div class="sidebar-block">
        <h3 class="catListTitle">关于</h3>
        <div id="blog-news" style="">
            <div id="profile_block">
                <?php echo $this->getConfigValue('sys_site_about')?>
            </div>
        </div>
    </div>
    <?php echo $this->render('//_inc/taxonomy');?>
    <div class="sidebar-block">
        <h3 class="catListTitle">热评文章</h3>

        <div>
            <ul>
                <?php
                $datas = $this->getDataSource(null,'view_count desc',10);
                $this->loopData($datas,'//_inc/item_random');
                ?>
            </ul>
        </div>

    </div>
    <div class="sidebar-block">
        <h3 class="catListTitle">随便看看</h3>

        <div>
            <ul>
                <?php
            $datas = $this->getDataSource(null,'view_count desc',10);
            $this->loopData($datas,'//_inc/item_random');
            ?>
            </ul>
        </div>

    </div>
</div>
