<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
/* @var $this yii\web\View */



$themeUrl= Resource::getThemeUrl();
$url = Url::to(['/'.$content['content_type'].'/default/detail','id'=>$content['id']]);
?>

<li class="related_box">
                                <a href="<?php echo $url?>" title="<?php echo $content['title']?>">
                                    <img src="<?php echo $content['thumb']?>?h=110&w=185&q=90&zc=1&ct=1" alt="<?php echo $content['title']?>" /><br><span class="r_title"><?php echo $content['title']?></span>
                                </a>
                            </li>