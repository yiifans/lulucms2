<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\core\widgets\ListView;
use source\core\widgets\LinkPager;
use source\libs\DataSource;
use source\core\widgets\LoopData;

/* @var $this source\core\front\FrontView */
$this->title = $this->getConfigValue('sys_seo_title');
if($this->title==='')
{
    $this->title='首页';
}

?>

<div class="content-wrap">
	<div class="content">
        <?php 
        $this->loopData($rows,'/views/_inc/content_default');
        $this->linkPager($pager);
        ?>
    </div>
</div>
<aside class="sidebar">

	<div class="widget d_postlist">
		<div class="title">
			<h2>为您推荐</h2>
		</div>
		<ul>
            <?php 
            $data=$this->getDataSource(null,null,5,['is_pic'=>true]);
            $this->loopData($data,'/views/_inc/item_pic');
            ?>
        </ul>
	</div>
	<div class="widget d_postlist">
		<div class="title">
			<h2>热评文章</h2>
		</div>
		<ul>
            <?php 
            $data=$this->getDataSource(null,'view_count desc',5,['is_pic'=>true]);
            $this->loopData($data,'/views/_inc/item_pic');
            ?>
        </ul>
	</div>
	<div class="widget ds-widget-recent-visitors">
		<div class="title">
			<h2>最近访客</h2>
		</div>
		<ul class="ds-recent-visitors" data-num-items="15" data-show-time="0"
			data-avatar-size="50">
		</ul>
	</div>
</aside>

