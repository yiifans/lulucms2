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

$this->layout = 'main';
$this->title='留言板';

$locals = DataSource::getPagedContents();
?>

<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="1" data-title="留言板" data-url="http://www.lulucms.com/index.php?r=site/guestbook&id=1"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"lulucms"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
<!-- 多说公共JS代码 end -->