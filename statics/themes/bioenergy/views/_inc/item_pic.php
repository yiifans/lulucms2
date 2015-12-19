<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */


?>
<li>
    <a href="<?php echo $row['url'];?>" title="<?php echo $row['title'];?>">
    <img class="alignleft size-full wp-image-1976" src="<?php echo $row['thumb'];?>" alt="home2" width="125" height="90" style="margin-right: 5px;"/>
    </a>
    <div class="title-box clearfix home3-title">
        <h2 class="title-box_primary"><a href="<?php echo $row['url'];?>" title="<?php echo $row['title'];?>"><?php echo $row['title'];?></a></h2>
    </div>
    <?php echo StringHelper::subString($row['summary'],40);?>
    <a href="<?php echo $row['url'];?>" title="more">[more]</a>
</li>


