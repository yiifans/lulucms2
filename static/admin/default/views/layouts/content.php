<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use source\models\Takonomy;
use source\libs\Resource;

/* @var $this \yii\web\View */
/* @var $content string */


Resource::registerCommon('/libs/bootstrap/3.0.2/css/bootstrap.css');
Resource::registerCommon('/js/common.js');
Resource::registerAdmin('/css/site.css');

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
</head>
<body>

<?php $this->beginBody() ?>

 <?= $content ?>
  
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
