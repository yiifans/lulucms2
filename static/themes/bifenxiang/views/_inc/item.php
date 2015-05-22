<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
/* @var $this yii\web\View */



$themeUrl= Resource::getThemeUrl();
$url = Url::to(['/'.$content['content_type'].'/default/detail','id'=>$content['id']]);
?>

<li><i class="fa fa-minus"></i><?php echo Html::a($content['title'],$url)?> </li>