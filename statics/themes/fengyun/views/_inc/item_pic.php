<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
/* @var $this yii\web\View */


?>

<li><a href="<?php echo $row['url'];?>" title="<?php echo $row['title']?>">
    <span class="thumbnail"><img src="<?php echo $row['thumb']?>?h=64&w=100&q=90&zc=1&ct=1" /></span>
    <span class="text"><?php echo $row['title']?></span>
    <span class="muted"><?php echo $row['createdAt']?></span>
    <span class="muted"><span class="ds-thread-count" data-thread-key="3718" data-replace="1"><?php echo $row['comment_count']?>评论</span></span></a>
</li>

