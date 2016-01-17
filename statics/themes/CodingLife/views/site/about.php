<?php
use yii\helpers\Html;
use yii\web\View;
use components\widgets\InhritLayout;

/* @var $this source\core\front\FrontView */

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$this->registerLinkTag(['rel'=>'archives','title'=>'Yii2|Yii爱好者中文社区门户','href'=>'2'],'addlink');
$this->registerLinkTag(['rel'=>'archives','title'=>'Yii2|Yii爱好者中文社区门户','href'=>'1'],'addlink');


$this->registerMetaTag(['name'=>'generator','content'=>'Discuz! X3.2']);
$this->registerMetaTag(['name'=>'author','content'=>'Discuz! Team and Comsenz UI Team']);


$cssString='body{margin:0px;padding:0px;}';
$this->registerCss($cssString);
$this->registerCssFile('css/site.css');

$jsString='$("#id").height(5)';
$this->registerJs($jsString,View::POS_READY);
$this->registerJsFile('assets/35aad32d/gii.js',['depends'=>['yii\web\YiiAsset'],'position'=>View::POS_HEAD]);

$this->blocks['content']='';
$this->blocks['sidebar']='';

$context = $this->context;
$context->actionAbout();
?>


	<div class="site-about">
	    <h1><?= Html::encode($this->title) ?></h1>
	
	    <p>
	        This is the About page. You may modify the following file to customize its content:
	    </p>
	    <?php echo $test;?><br>
	    test data is
	<?php echo $context->testData2;?><br>
	    <code><?= __FILE__ ?></code>
	</div>

















