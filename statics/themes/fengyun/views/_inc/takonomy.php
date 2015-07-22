<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
use source\models\Takonomy;
use source\LuLu;


/* @var $this yii\web\View */


$moduleId = LuLu::$app->controller->module->id;

$takonomies = Takonomy::getArrayTree($this->getConfigValue($moduleId.'_takonomy'));

if(!empty($takonomies))
{
    
?>
    <h3 class="widget-title">分类</h3>
    <div class="hot widget">
        <ul>
            <li><?php echo Html::a('所有',['/'.$moduleId.'/default/list'])?></li>
            <?php foreach ($takonomies as $takonomy):?>
            <li><?php echo Html::a($takonomy['name'],['/'.$moduleId.'/default/list','takonomy'=>$takonomy['id']])?></li>
            <?php endforeach;?>

        </ul>
        <div class="clear"></div>
    </div>
<?php }?>