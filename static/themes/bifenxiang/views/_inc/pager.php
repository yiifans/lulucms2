<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\core\widgets\LinkPager;


?>

<?php echo LinkPager::widget([
		'pagination' => $pager,
]);?>
