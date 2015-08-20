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

<section class="title-section" style="padding: 0px; margin-bottom:20px;">
    <h1 class="title-header"><?php echo $model['title']?></h1>
</section>
<article id="post-<?php echo $model['id']?>" class="post-<?php echo $model['id']?> post type-post status-publish format-standard has-post-thumbnail hentry category-guandian tag-redian tag-yingxiao clearfix">
    <div class="post_content">
        <?php echo $model['body_body'] ?>
        <div class="clear"></div>
    </div>
    
    <div class="post_meta meta_type_line">
        <div class="post_meta_unite clearfix">
            <div class="meta_group clearfix"> 
                <div class="post_category">
                    <i class="icon-bookmark"></i>
                    <a href="#" rel="category tag">Nam elit agna,endrerit sit amet</a> 
                </div>
                <div class="post_date">
                    <i class="icon-calendar"></i>
                    <time><?php echo DateTimeHelper::formatTime($model['created_at']) ?></time> 
                </div>
                <div class="post_author">
                    <i class="icon-user"></i>
                    <a href="#" title="Posts by admin" rel="author"><?php echo $model['user_name']?></a> 
                </div>
                <div class="post_comment">
                    <i class="icon-comments"></i>
                    <a href="#" class="comments-link" title="Comment on Etiam commodo convallis"><?php echo $model['comment_count']?> 条评论</a> 
                </div>
            </div>
            <div class="meta_group clearfix"></div>
            <div class="meta_group clearfix"></div>
        </div>
    </div>
            
    <!-- #post-<?php echo $model['id']?> -->
</article>
