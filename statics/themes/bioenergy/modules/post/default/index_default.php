<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\libs\DataSource;


/* @var $this yii\web\View */
$this->title = '文章';

?>

<?php 
$this->loopData($rows,'//_inc/content_default');
$this->showPager([
    'pagination' => $pager
]);
?>

