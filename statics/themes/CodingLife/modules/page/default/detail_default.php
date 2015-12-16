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

<div id="post_detail">
    <!--done-->
    <div id="topics">
        <div class="post">
            <h1 class="postTitle">
                <?php echo $model['title']?>
            </h1>
            <div class="clear"></div>
            <div class="postBody">
                <div id="cnblogs_post_body">
                    <?php echo $model['body_body'] ?>
                </div>

            </div>
            <div class="postDesc">posted @ <span id="post-date"><?php echo DateTimeHelper::formatTime($model['created_at']) ?></span> 阅读(<span id="post_view_count"><?php echo $model['view_count']?></span>) 评论(<span id="post_comment_count"><?php echo $model['comment_count']?></span>)</div>
        </div>


    </div>
    <!--end: topics 文章、评论容器-->
</div>


