<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Taxonomy;
use source\libs\DataSource;
use source\core\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = '文章';

?>

<?php 
$this->loopData($rows,'//_inc/content_default');
        echo \statics\themes\fengyun\functions\LinkPager::widget([
            'pagination' => $pager
        ]);
?>

