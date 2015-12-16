<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\models\Taxonomy;
use source\models\Content;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\DateTimeHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model['title'];


?>

<article id="post-<?php echo $model['id']?>" class="post-<?php echo $model['id']?> post type-post status-publish format-standard has-post-thumbnail hentry category-guandian tag-redian tag-yingxiao clearfix">
    <header class="entry-header">
        <h1 class="entry-title title1"><?php echo $model['title']?></h1>

        <div class="entry-meta">
            <span class="byline"><i class="fa fa-user"></i><span class="author vcard"><a href="#" title="由<?php echo $model['user_name']?>发布" rel="author"><?php echo $model['user_name']?></a></span></span>
            <span class="posted-on"><i class="fa fa-calendar"></i><a><time><?php echo DateTimeHelper::formatTime($model['created_at']) ?></time></a></span>
            <span class="comments-link">
                <i class="fa fa-comments"></i>
                <a href="#" class="ds-thread-count" data-thread-key="4682" title="《<?php echo $model['title']?>》上的评论"><?php echo $model['comment_count']?> 条评论</a>
            </span>
            <span class="eye">
                <i class="fa fa-eve"></i>
                <?php echo $model['view_count']?>°
            </span>
            <!-- .entry-meta -->
        </div>
        <!-- .entry-header -->
    </header>
    <div class="clearfix entry-content entry1" style="padding-top: 10px;">
        <?php echo $model['body_body'] ?>
    </div>
    
    <!-- #post-<?php echo $model['id']?> -->
</article>


