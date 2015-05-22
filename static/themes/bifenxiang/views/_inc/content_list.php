<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\models\Content;
use source\LuLu;
/* @var $this yii\web\View */


if(!isset($orderBy))
{
	$orderBy = 'created_at desc';
}
if(!isset($limit))
{
	$limit = 5;
}
if(!isset($item))
{
    $item='item_pic';
}
$where=[];
if(!isset($isPic))
{
    $isPic = true;
}

$moduleId = LuLu::$app->controller->module->id;
if( $moduleId!=='app-frontend')
{
    $where = ['content_type'=>$moduleId];
}

$query = 	Content::findQuery($where,$orderBy);
if($isPic)
{
    $query->andWhere(['!=','thumb','']);
}
$query->limit($limit);
$contents = $query->all();



?>

<?php foreach ($contents as $content):?>
<?php echo $this->render(Resource::getThemePath('/views/_inc/'.$item),['content'=>$content]);?>
<?php endforeach;?>
