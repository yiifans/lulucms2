<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\DateTimeHelper;
/* @var $this yii\web\View */

?>

<article class="excerpt">
    <header>
    	<?php if(isset($content->taxonomy)):?>
    	<a class="label label-important" href=""><?php echo $post->taxonomy->name; ?><i class="label-arrow"></i></a>
    	<?php endif;?>
        
        <h2><?php echo Html::a($content['title'],$content['url'])?></h2>
    </header>

    <?php if(!empty($content['thumb'])):?>
    <div class="focus">
        <a href="<?php echo $url;?>"><img src="<?php echo $content['thumb']?>?imageView2/1/w/630/h/200" alt="再分享一个用托盘DIY制作花盆" class="wp-post-image" width="630" height="120" style="height:120px;" /></a>
    </div>
	<?php endif;?>
			
    <span class="note">
    <?php echo $content['summary']?>
    </span>
    <p class="auth-span">
        <span class="muted"><i class="fa fa-clock-o"></i> <?php echo $content['createdAt']?></span>	
        <span class="muted"><i class="fa fa-eye"></i> <?php echo $content['view_count']?>℃</span>	
        <span class="muted"><i class="fa fa-comments-o"></i> <a target="_blank" href="<?php echo $url?>"><?php echo $content['comment_count']?>评论</a></span>
        <span class="muted"><a href="javascript:;" data-action="ding" data-id="4132" id="Addlike" class="action"><i class="fa fa-heart-o"></i><span class="count"><?php echo $content['agree_count']?></span>喜欢</a></span>
    </p>
</article>
