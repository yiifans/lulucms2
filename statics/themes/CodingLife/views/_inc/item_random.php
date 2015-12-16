<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;

/* @var $this yii\web\View */

?>

<li class="random-post-link">
    <?php echo Html::a($row['title'],$row['url'])?>
</li>

