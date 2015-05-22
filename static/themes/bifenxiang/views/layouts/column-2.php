<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ContentDecorator;

/* @var $this \yii\web\View */
/* @var $content string */


?>


	//指定view 文件（别名或者路径）
     <?php $this->beginContent('@app/views/layouts/main.php'); ?>
    
     <?php echo $content;?>
     
     <?php $this->endContent(); ?>
     
    