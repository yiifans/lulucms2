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


$taxonomies = $this->taxonomyService->getTaxonomiesAsTree($this->getConfigValue($moduleId.'_taxonomy'));

if(!empty($taxonomies))
{
    
?>
    <div id="categories-2" class="widget">
        <h3>分类</h3>
        <ul>
            <li  class="cat-item cat-item-0"><?php echo Html::a('所有',['/'.$moduleId.'/default/list'])?></li>
            <?php foreach ($taxonomies as $taxonomy):?>
            <li class="cat-item cat-item-<?php echo $taxonomy['id']?>"><?php echo Html::a($taxonomy['name'],['/'.$moduleId.'/default/list','taxonomy'=>$taxonomy['id']])?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php }?>