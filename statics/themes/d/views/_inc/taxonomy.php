<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
use source\models\Taxonomy;
use source\LuLu;


/* @var $this yii\web\View */


$moduleId = LuLu::$app->controller->module->id;

$taxonomies = LuLu::getService('taxonomy')->getTaxonomiesAsTree($this->getConfigValue($moduleId.'_taxonomy'));

if(!empty($taxonomies))
{
    
?>
    <h3 class="widget-title">分类</h3>
    <div class="hot widget">
        <ul>
            <li><?php echo Html::a('所有',['/'.$moduleId.'/default/list'])?></li>
            <?php foreach ($taxonomies as $taxonomy):?>
            <li><?php echo Html::a($taxonomy['name'],['/'.$moduleId.'/default/list','taxonomy'=>$taxonomy['id']])?></li>
            <?php endforeach;?>

        </ul>
        <div class="clear"></div>
    </div>
<?php }?>