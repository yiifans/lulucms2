<?php 

use source\libs\Resource;
use source\models\Menu;
use source\LuLu;

/* @var $this source\core\front\FrontView */

$title = $this->getConfigValue('sys_seo_title');
if(empty($title))
{
    $title = $this->getConfigValue('sys_site_name');
}


$seoHead = $this->getConfigValue('sys_seo_head');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->title?> —— <?php echo $title?></title>
    <meta name="keywords" content="<?php echo $this->getConfigValue('sys_seo_keywords')?>">
    <meta name="description" content="<?php echo $this->getConfigValue('sys_seo_description')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo $this->getThemeUrl()?>/css/blog-common.css">
    <link id="MainCss" type="text/css" rel="stylesheet" href="<?php echo $this->getThemeUrl()?>/css/bundle-CodingLife.css">
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/jquery.min.js?ver=1419744126'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/blog-common.js'></script>
    <?php $this->head() ?>
    <?php $this->showConfigValue('sys_seo_head');?>
</head>
<body>
    <?php $this->beginBody() ?>
    <a name="top"></a>

    <!--done-->
    <div id="home">
        <div id="header">
            <div id="blogTitle">
               
                <!--done-->
                <h1>
                    <a href="<?php echo $this->getHomeUrl()?>" rel="home" class="headermaintitle" title="<?php echo $this->getConfigValue('sys_site_name');?>">
                        <?php echo $this->getConfigValue('sys_site_name');?></a>
                </h1>
                <h2><?php echo $this->getConfigValue('sys_site_description')?></h2>




            </div>
            <!--end: blogTitle 博客的标题和副标题 -->
            <div id="navigator">

                <ul id="navList">
                    <?php
                    $menus = $this->getMenus();
      foreach($menus as $menu)
      {
          //var_dump($menu);
          
          echo '<li><a id="main_'.$menu['id'].'" class="menu" href="'.$menu['url'].'" target="'.$menu['target'].'">'.$menu['name'].'</a></li>';
      }
      
                    ?>

                </ul>
                
                <!--end: blogStats -->
            </div>
            <!--end: navigator 博客导航栏 -->
        </div>
        <!--end: header 头部 -->

        <div id="main">
