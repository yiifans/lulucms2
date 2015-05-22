<?php
use yii\helpers\Html;

use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use source\libs\Resource;
use source\models\Menu;

/* @var $this \yii\web\View */
/* @var $content string */


Resource::registerCommon('/libs/bootstrap/3.0.2/css/bootstrap.css');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    <?php $this->registerLinkTag(['rel'=>'archives','title'=>'Yii2|Yii爱好者中文社区门户','href'=>'test']);?>
</head>
<body>

<?php $this->beginBody() ?>
	<div class="header">
		<ul>
			<?php foreach (Menu::findAll(['category_id'=>'main','parent_id'=>0],'sort_num desc') as $menu):?>
			<li><a href="<?php echo $menu['url']?>"><?php echo $menu['name']?></a> </li>
			<?php endforeach;?>
		</ul>
	</div>
    <div class="wrap">
       

        <div class="container">
        
            
            <?= $content ?>
            
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
