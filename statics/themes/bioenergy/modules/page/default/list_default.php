<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Taxonomy;

/* @var $this yii\web\View */
$this->title = $taxonomyModel['name'];

?>

<?php 
$this->loopData($rows,'//_inc/content_default');
$this->showPager([
    'pagination' => $pager
]);
?>


