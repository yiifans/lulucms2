<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
use source\models\Takonomy;
use source\LuLu;


/* @var $this yii\web\View */


if(isset($takonomyId))
{
    $moduleId = LuLu::$app->controller->module->id;
    
    $takonomies = Takonomy::getArrayTree($this->getConfigValue($takonomyId));
?>

<div class="widget d_postlist">
    <div class="title">
        <h2>分类</h2>
    </div>
    <ul>
        <li><?php echo Html::a('所有',['/'.$moduleId.'/default/list'])?></li>
        <?php foreach ($takonomies as $takonomy):?>
        <li><?php echo Html::a($takonomy['name'],['/'.$moduleId.'/default/list','takonomy'=>$takonomy['id']])?></li>
        <?php endforeach;?>
    </ul>
</div>
<?php }?>

<ul class="nav">
	<li id="menu-item-2333" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2333"><a href=".">首页</a></li>
	<?php foreach (Menu::findAll(['category_id'=>'main','parent_id'=>0],'sort_num desc') as $menu):?>
	<li id="menu-item-<?php echo $menu['id']?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-<?php echo $menu['id']?>"><a href="<?php echo $menu['url']?>"><?php echo $menu['name']?></a></li>
	<?php endforeach;?>
    <li id="menu-item-yiifans" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-yiifans"><a href="http://www.yiifans.com" target="_blank">Yii交流社区</a></li>
</ul>