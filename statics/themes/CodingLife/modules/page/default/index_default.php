<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Taxonomy;
use source\core\widgets\LinkPager;
use source\libs\DataSource;

/* @var $this source\core\front\FrontView */

$this->title = '页面';


?>


<?php 
$this->loopData($rows,'//_inc/content_default');
$this->showPager([
    'pagination' => $pager
]);
?>


