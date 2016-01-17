<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\models\Taxonomy;
use source\models\Content;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\DateTimeHelper;

/* @var $this source\core\front\FrontView */
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
    <div id="comment">
        <!-- 多说评论框 start -->
        <div class="ds-thread" data-thread-key="<?php echo $model['id']?>" data-title="<?php echo $model['title']?>" data-url="<?php echo Url::to(['/post/default/detail','id'=>$model['id']])?>"></div>
        <!-- 多说评论框 end -->
        <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
        <script type="text/javascript">
            var duoshuoQuery = { short_name: "lulucms" };
            (function () {
                var ds = document.createElement('script');
                ds.type = 'text/javascript'; ds.async = true;
                ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                ds.charset = 'UTF-8';
                (document.getElementsByTagName('head')[0]
                 || document.getElementsByTagName('body')[0]).appendChild(ds);
            })();
        </script>
        <!-- 多说公共JS代码 end -->
    </div>
</div>


