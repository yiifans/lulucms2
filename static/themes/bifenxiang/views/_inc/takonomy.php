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
            	<div class="title"><h2>分类</h2></div>
            	<ul>
            		<li><?php echo Html::a('所有',['/'.$moduleId])?></li>
            		<?php foreach ($takonomies as $takonomy):?>
            		<li><?php echo Html::a($takonomy['name'],['/'.$moduleId.'/default/list','takonomy'=>$takonomy['id']])?></li>
            		<?php endforeach;?>
            	</ul>
            </div>
<?php }?>