<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\DateTimeHelper;
use yii\helpers\StringHelper;
/* @var $this source\core\front\FrontView */

?>



<div class="day">
    <div class="dayTitle">
        <?php echo Html::a(date('Y年m月d日',$row['created_at']),$row['url'])?>
    </div>


    <div class="postTitle">
        <?php echo Html::a($row['title'],$row['url'],['class'=>'postTitle2'])?>
    </div>
    <div class="postCon">
        <?php if(!empty($row['thumb'])):?>
        <!-- 截图 -->
        <div class="thumbnail">
            <a href="<?php echo $row['url']?>" rel="bookmark" title="<?php echo $row['title']?>">
                <img width="180" height="160" src="<?php echo $row['thumb']?>" class="attachment-thumbnail wp-post-image" alt="U9947P827DT20150402093723" /></a>
        </div>
        <?php endif;?>

        <div class="c_b_p_desc">摘要: 
            <?php echo $row['summary']?>
            <?php echo Html::a('阅读全文',$row['url'],['class'=>'c_b_p_desc_readmore'])?>
        </div>
        <div class="postDesc">posted @ <?php echo $row['createdAt']?> <?php echo $row['user_name']?> 阅读(<?php echo $row['view_count']?>) 评论(<?php echo $row['comment_count']?>) </div>
    </div>
    <div class="clear"></div>
    
    <div class="clear"></div>

</div>
