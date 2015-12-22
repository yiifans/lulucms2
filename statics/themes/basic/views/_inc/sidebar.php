<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;

/* @var $this yii\web\View */

?>

<div class="col-md-4 site-sidebar" role="complementary">
    <h3 class="widget-title">关于本站</h3>
    
    <div class="feed-mail widget">
        <?php echo $this->getConfigValue('sys_site_about')?>
        <form action="http://list.qq.com/cgi-bin/qf_compose_send" target="_blank" method="post">
            <input type="hidden" name="t" value="qf_booked_feedback">
            <input type="hidden" name="id" value="da5aefb0325d18729a2b2dffca28413a7e0650dbc78b315a">
            <input id="to" onfocus="if (this.value == '输入邮箱 订阅本站') {this.value = '';}" onblur="if (this.value == '') {this.value = '输入邮箱 订阅本站';}" value="输入邮箱 订阅本站" name="to" type="text" class="feed-mail-input"><input class="feed-mail-btn" type="submit" value="订阅">
        </form>
        <div class="clear"></div>
    </div>

    <?php echo $this->render('//_inc/taxonomy');?>
    
    <h3 class="widget-title">随便看看</h3>
    <div class="box_r widget">
        <ul class="random-post-link">
            <?php
            $datas = $this->getDataSource(null,'view_count desc',10);
            $this->loopData($datas,'//_inc/item_random');
            ?>

        </ul>
        <div class="clear"></div>
    </div>
    <h3 class="widget-title">热评文章</h3>
    <div class="hot widget">
        <ul>
            <?php
            $datas = $this->getDataSource(null,'view_count desc',10);
            $this->loopData($datas,'//_inc/item_random');
            ?>

        </ul>
        <div class="clear"></div>
    </div>

</div>
