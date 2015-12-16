<?php 

use source\libs\Resource;
use source\models\Menu;
use source\LuLu;



$title = $this->getConfigValue('sys_seo_title');
if(empty($title))
{
    $title = $this->getConfigValue('sys_site_name');
}


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->title?> —— <?php echo $title?></title>
    <meta name="keywords" content="<?php echo $this->getConfigValue('sys_seo_keywords')?>">
    <meta name="description" content="<?php echo $this->getConfigValue('sys_seo_description')?>">
    
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="<?php echo $this->getThemeUrl()?>/css/base1.css" />
    <link rel="stylesheet" href="<?php echo $this->getThemeUrl()?>/css/style.css" type="text/css" media="screen" />
    <link rel='stylesheet' id='themememe-icons-css' href='<?php echo $this->getThemeUrl()?>/css/fonts/font-awesome.min.css?ver=1419744126' type='text/css' media='all' />
    
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/jquery.min.js?ver=1419744126'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/jquery-migrate.min.js?ver=1419744126'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/jquery.dropkick.min.js?ver=1419744126'></script>
   
    <!--[if lt IE 9]>
<script src="<?php echo $this->getThemeUrl()?>/js/html5.js"></script>
<script src="<?php echo $this->getThemeUrl()?>/js/selectivizr.js"></script>
<script src="<?php echo $this->getThemeUrl()?>/js/respond.js"></script>
<![endif]-->
    <style type="text/css" id="custom-background-css">
        body.custom-background { background-color: #f0f0f0; }
    </style>
</head>

<body class="home blog custom-background chrome">
    <div class="site-top">
        <div class="clearfix container">
            <div class="site-branding">
                <h1 class="site-title"><a href="<?php echo $this->getHomeUrl()?>" rel="home" title="<?php echo $this->getConfigValue('sys_site_name');?>">
                    <?php echo $this->getConfigValue('sys_site_name');?></a></h1>
            </div>
            <nav class="site-menu" role="navigation">
                <div class="menu-toggle"><i class="fa fa-bars"></i></div>
                <div class="menu-text"></div>
                <div class="clearfix menu-bar">
                    <ul id="menu-main" class="menu">
                        
                        <?php $this->renderMenu('main');?>
                        <li id="menu-item-yiifans" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-yiifans"><a href="http://www.yiifans.com" target="_blank">Yii2 交流社区</a></li>
                    </ul>
                </div>
                <!-- .site-menu -->
            </nav>

            <div class="site-search">
                <div class="search-toggle"><i class="fa fa-search"></i></div>
                <div class="search-expand">
                    <div class="search-expand-inner">
                        
                    </div>
                </div>
                <!-- .site-search -->
            </div>
        </div>
        <!-- .site-top -->
    </div>
    <div class="site-main">
        <div class="clearfix container">
            <div class="row">
