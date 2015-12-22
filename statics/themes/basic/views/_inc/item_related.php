<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
/* @var $this yii\web\View */

?>

<li class="related_box">
    <a href="<?php echo $row['url']?>" title="<?php echo $row['title']?>"> 
        <img src="<?php echo $row['thumb']?>" alt="<?php echo $row['title']?>" /><br>
    	<span class="r_title"><?php echo $row['title']?></span></a>
</li>