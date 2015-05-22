<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
/* @var $this yii\web\View */



$themeUrl= Resource::getThemeUrl();
if(!isset($orderBy))
{
	$orderBy = 'created_at desc';
}
if(!isset($limit))
{
	$limit = 5;
}

$contents = 	Content::findAll(null,$orderBy,$limit);
?>

<?php foreach ($contents as $content):?>
<li><a href="<?php echo Url::to(['/post/detail','id'=>$content['id']]);?>" title="<?php echo $content['title']?>"><span class="thumbnail"><img src="<?php echo $content['thumb']?>?h=64&w=100&q=90&zc=1&ct=1" alt="这狗也能享受和人一样的待遇" /></span><span class="text"><?php echo $content['title']?></span><span class="muted"><?php echo $content['createdAt']?></span><span class="muted"><span class="ds-thread-count" data-thread-key="3718" data-replace="1"><?php echo $content['comments']?>评论</span></span></a></li>
<?php endforeach;?>
