<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
/* @var $this yii\web\View */



$themeUrl= Resource::getThemeUrl();
?>

<li><a href="<?php echo Url::to(['/post/detail','id'=>$post['id']]);?>" title="<?php echo $post['title']?>"><span class="thumbnail"><img src="<?php echo $post['thumb']?>?h=64&w=100&q=90&zc=1&ct=1" alt="这狗也能享受和人一样的待遇" /></span><span class="text"><?php echo $post['title']?></span><span class="muted"><?php echo $post['createdAt']?></span><span class="muted"><span class="ds-thread-count" data-thread-key="3718" data-replace="1"><?php echo $post['comments']?>评论</span></span></a></li>

