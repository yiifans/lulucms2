<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\DateTimeHelper;
use yii\helpers\StringHelper;
/* @var $this source\core\front\FrontView */

?>
<div class="post_wrapper">
    <article id="post-<?php echo $row['id'];?>" class="post-<?php echo $row['id'];?> post type-post status-publish format-standard has-post-thumbnail hentry category-tincidunt-ac-viverra-sed-nulla-porta-diam-eu-massa post__holder cat-9-id">
        <header class="post-header">
            <h2 class="post-title"><a href="<?php echo $row['url'];?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a></h2>
        </header>
        
        <?php if(!empty($row['thumb'])):?>
        <figure class="featured-thumbnail thumbnail ">
            <a href="<?php echo $row['url'];?>" title="<?php echo $row['title'];?>">
                <img src="<?php echo $row['thumb'];?>" alt="Lorem ipsum est dolore sit" style="display: inline; width:200px;height:150px;"></a>
        </figure>
        <?php endif;?>
        
        <div class="post_content">
            <div class="excerpt">
                <?php if(!empty($row['thumb'])):?>
                <?php echo StringHelper::subString($row['summary'],220)?>&#8230;&#8230;
                <?php else:?>
                <?php echo $row['summary']?>&#8230;&#8230;
                <?php endif;?>
            </div>
            <a href="<?php echo $row['url'];?>" class="btn btn-primary">Read more</a>
            <div class="clear"></div>
        </div>
    </article>
</div>
