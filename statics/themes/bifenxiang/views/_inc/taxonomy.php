<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
use source\modules\taxonomy\models\Taxonomy;
use source\LuLu;


/* @var $this yii\web\View */


if(isset($taxonomyId))
{
    $moduleId = LuLu::$app->controller->module->id;
    
    $taxonomies = Taxonomy::getArrayTree($this->getConfigValue($taxonomyId));
?>

<div class="widget d_postlist">
    <div class="title">
        <h2>分类</h2>
    </div>
    <ul>
        <li><?php echo Html::a('所有',['/'.$moduleId.'/default/list'])?></li>
        <?php foreach ($taxonomies as $taxonomy):?>
        <li><?php echo Html::a($taxonomy['name'],['/'.$moduleId.'/default/list','taxonomy'=>$taxonomy['id']])?></li>
        <?php endforeach;?>
    </ul>
</div>
<?php }?>