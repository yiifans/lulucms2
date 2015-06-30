<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\DateTimeHelper;
/* @var $this source\core\front\FrontView */

?>

<article class="excerpt">
    <header>
        <?php if(isset($row->takonomy)):?>
        <a class="label label-important" href="<?php echo Url::to(['/'.$row['content_type'].'/default/list','takonomy'=>$row->takonomy['id']])?>"><?php echo $row->takonomy->name; ?><i class="label-arrow"></i></a>
        <?php endif;?>
        <h2><?php echo Html::a($row['title'],$row['url'])?></h2>
    </header>

    <?php if(!empty($row['thumb'])):?>
    <div class="focus">
        <a href="<?php echo $row['url'];?>">
            <img src="<?php echo $row['thumb']?>?imageView2/1/w/630/h/200" alt="再分享一个用托盘DIY制作花盆" class="wp-post-image" width="630" height="120" style="height:120px;" /></a>
    </div>
    <?php endif;?>

    <span class="note">
        <?php echo $row['summary']?>
    </span>
    <p class="auth-span">
        <span class="muted"><i class="fa fa-clock-o"></i><?php echo $row['createdAt']?></span>
        <span class="muted"><i class="fa fa-eye"></i><?php echo $row['view_count']?>℃</span>
        <span class="muted"><i class="fa fa-comments-o"></i><a target="_blank" href="<?php echo $row['url']?>"><?php echo $row['comment_count']?>评论</a></span>
        <span class="muted"><a href="javascript:;" data-action="ding" data-id="4132" id="Addlike" class="action"><i class="fa fa-heart-o"></i><span class="count"><?php echo $row['agree_count']?></span>喜欢</a></span>
    </p>
</article>
