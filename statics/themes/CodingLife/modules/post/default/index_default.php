<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Taxonomy;
use source\libs\DataSource;
use source\core\widgets\LinkPager;

/* @var $this source\core\front\FrontView */

$this->title = '文章';

?>

<?php 
$this->loopData($rows,'//_inc/content_default');
$this->showPager([
    'pagination' => $pager
]);
      
?>

