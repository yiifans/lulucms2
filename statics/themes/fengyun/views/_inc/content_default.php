<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\DateTimeHelper;
use yii\helpers\StringHelper;
/* @var $this source\core\front\FrontView */

?>
<div class="thumbnail_box">
    <div class="thumbnail_t">
    </div>
    <?php if(!empty($row['thumb'])):?>
    <!-- 截图 -->
    <div class="thumbnail">
        <a href="<?php echo $row['url']?>" rel="bookmark" title="<?php echo $row['title']?>">
            <img width="128" height="96" src="<?php echo $row['thumb']?>" class="attachment-thumbnail wp-post-image" alt="U9947P827DT20150402093723" /></a>
    </div>
    <?php endif;?>
</div>
<article id="post-<?php echo $row['id']?>" class="post-<?php echo $row['id']?> post type-post status-publish format-standard has-post-thumbnail hentry category-dudian tag-chengzhang tag-shenghuo clearfix">
    <header class="entry-header">
        <h2 class="entry-title"><?php echo Html::a($row['title'],$row['url'])?></h2>

        <div class="entry-meta">
            <span class="byline"><i class="fa fa-user"></i><span class="author vcard"><a href="#" title="由<?php echo $row['user_name']?>发布" rel="author"><?php echo $row['user_name']?></a></span></span>
            <span class="posted-on"><i class="fa fa-calendar"></i><a><time><?php echo $row['createdAt']?></time></a></span>
            <span class="comments-link">
                <i class="fa fa-comments"></i>
                <a href="#comments" class="ds-thread-count" data-thread-key="<?php echo $row['id']?>" title="《<?php echo $row['title']?>》上的评论"><?php echo $row['comment_count']?> 条评论</a>			</span>
            <span class="eye">
                <i class="fa fa-eve"></i>
                <?php echo $row['view_count']?>°
            </span>
            <!-- .entry-meta -->
        </div>
        <!-- .entry-header -->
    </header>

    <div class="clearfix entry-content">
        <div class="article-summary">
        <?php if(!empty($row['thumb'])):?>
        <p><?php echo StringHelper::subString($row['summary'],90)?>&#8230;&#8230;</p>
        <?php else:?>
        <p><?php echo $row['summary']?>&#8230;&#8230;</p>
        <?php endif;?>
            
        </div>

        <!-- .entry-content -->
        <footer class="entry-meta entry-footer">
            <?php if(isset($row->taxonomy)):?>
            <span class="cat-links">
                <i class="fa fa-folder-open"></i>
                <a href="<?php echo Url::to(['/'.$row['content_type'].'/default/list','taxonomy'=>$row->taxonomy['id']])?>" rel="category tag"><?php echo $row->taxonomy->name; ?></a>			</span>
            <?php endif;?>


            <!-- .entry-footer -->
        </footer>
    </div>

    <!-- #post-4777 -->
</article>
