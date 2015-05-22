<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
/* @var $this yii\web\View */



$themeUrl= Resource::getThemeUrl();


?>

<article class="excerpt">
    <header>
    	<?php if(isset($model->takonomy)):?>
    	<a class="label label-important" href="http://bb178.com/category/uncategorized"><?php echo $model->takonomy->name; ?><i class="label-arrow"></i></a>
    	<?php endif;?>
        
        <h2><?php echo Html::a($model['title'],['/post/detail','id'=>$model['id']])?></h2>
    </header>

    <?php if(!empty($model['thumb'])):?>
    <div class="focus">
        <a target="_blank" href="<?php echo Url::to(['/post/detail','id'=>$model['id']]);?>"><img src="<?php echo $model['thumb']?>?imageView2/1/w/630/h/200" alt="再分享一个用托盘DIY制作花盆" class="wp-post-image" width="630" height="200" /></a>
    </div>
			<?php endif;?>
			
    <span class="note">
    <?php echo $model['summary']?>
    </span>
    <p class="auth-span">
        <span class="muted"><i class="fa fa-clock-o"></i> <?php echo $model['createdAt']?></span>	<span class="muted"><i class="fa fa-eye"></i> <?php echo $model['views']?>℃</span>	<span class="muted"><i class="fa fa-comments-o"></i> <a target="_blank" href="http://bb178.com/2015/4132.html#comments"><?php echo $model['comments']?>评论</a></span><span class="muted">
            <a href="javascript:;" data-action="ding" data-id="4132" id="Addlike" class="action"><i class="fa fa-heart-o"></i><span class="count"><?php echo $model['diggs']?></span>喜欢</a>
        </span>
    </p>
</article>
