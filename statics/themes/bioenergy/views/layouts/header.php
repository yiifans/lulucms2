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
<!--[if lt IE 7 ]><html class="ie ie6" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en-US"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $this->title;?> | <?php echo $title?></title>
    <meta name="keywords" content="<?php echo $this->getConfigValue('sys_seo_keywords')?>">
    <meta name="description" content="<?php echo $this->getConfigValue('sys_seo_description')?>">
    
    <link rel="icon" href="<?php echo $this->getThemeUrl()?>/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->getThemeUrl()?>/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->getThemeUrl()?>/css/responsive.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->getThemeUrl()?>/css/camera.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->getThemeUrl()?>/css/style.css" />
    
    <link rel='stylesheet' id='flexslider-css' href='<?php echo $this->getThemeUrl()?>/js/FlexSlider/flexslider.css?ver=2.2.0' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-css' href='<?php echo $this->getThemeUrl()?>/js/owl-carousel/owl.carousel.css?ver=1.24' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-theme-css' href='<?php echo $this->getThemeUrl()?>/js/owl-carousel/owl.theme.css?ver=1.24' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-css' href='<?php echo $this->getThemeUrl()?>/css/font-awesome.css?ver=3.2.1' type='text/css' media='all' />
    <link rel='stylesheet' id='cherry-plugin-css' href='<?php echo $this->getThemeUrl()?>/css/cherry-plugin.css?ver=1.2.3' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css' href='<?php echo $this->getThemeUrl()?>/css/styles.css?ver=4.1.1' type='text/css' media='all' />
    <link rel='stylesheet' id='theme53431-css' href='<?php echo $this->getThemeUrl()?>/css/main-style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css' href='<?php echo $this->getThemeUrl()?>/css/magnific-popup.css?ver=0.9.3' type='text/css' media='all' />

    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/jquery-1.7.2.min.js?ver=1.7.2'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/jquery-migrate-1.2.1.min.js?ver=1.2.1'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/swfobject.js?ver=2.2-20120417'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/modernizr.js?ver=2.0.6'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/jflickrfeed.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/jquery.easing.1.3.js?ver=1.3'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/custom.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/bootstrap.min.js?ver=2.3.0'></script>
    <script type='text/javascript' src='<?php echo $this->getThemeUrl()?>/js/elasti-carousel/jquery.elastislide.js?ver=1.2.3'></script>
   
    <style type='text/css'>
        body {
            background-color: #3f3f3f;
        }
    </style>
    <style type='text/css'>
        h1 {
            font: normal 30px/35px Ubuntu;
            color: #393939;
        }

        h2 {
            font: normal 22px/22px Ubuntu;
            color: #474747;
        }

        h3 {
            font: normal 18px/18px Ubuntu;
            color: #393939;
        }

        h4 {
            font: normal 14px/18px Ubuntu;
            color: #393939;
        }

        h5 {
            font: normal 12px/18px Ubuntu;
            color: #393939;
        }

        h6 {
            font: normal 12px/18px Ubuntu;
            color: #393939;
        }

        body {
            font-weight: normal;
        }

        .logo_h__txt, .logo_link {
            font: bold 48px/40px Ubuntu;
            color: #393939;
        }

        .sf-menu > li > a {
            font: bold 14px/18px Archivo Narrow;
            color: #4b4b4b;
        }

        .nav.footer-nav a {
            font: normal 12px/18px Arial,Helvetica,sans-serif;
            color: #0088CC;
        }
    </style>
    <!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
	</div>
	<![endif]-->
   
    <script type="text/javascript">
        // Init navigation menu
        jQuery(function () {
            // main navigation init
            jQuery('ul.sf-menu').superfish({
                delay: 50, // the delay in milliseconds that the mouse can remain outside a sub-menu without it closing
                animation: {
                    opacity: "show",
                    height: "show"
                }, // used to animate the sub-menu open
                speed: "normal", // animation speed
                autoArrows: true, // generation of arrow mark-up (for submenu)
                disableHI: true // to disable hoverIntent detection
            });

        })
    </script>
    <?php $this->head() ?>
</head>
<body class="home page page-id-203 page-template page-template-page-home page-template-page-home-php">
    <?php $this->beginBody() ?>
    <div id="motopress-main" class="main-holder">

        <header class="motopress-wrapper header">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span3">

                                <div class="logo pull-left">
                                    <a href="<?php echo $this->getHomeUrl();?>" class="logo_h logo_h__img">
                                        <img src="<?php echo $this->getThemeUrl()?>/images/logo.png" alt="<?php echo $this->getConfigValue('sys_site_name')?>" title="<?php echo $this->getConfigValue('sys_site_name')?>"></a>
                                    <p class="logo_tagline"><?php echo $this->getConfigValue('sys_site_description')?></p>
                                </div>
                            </div>
                            <div class="span9">

                                <nav class="nav nav__primary clearfix">
                                    <ul id="topnav" class="sf-menu">
                                        <?php $this->renderMenu();?>
                                        <li id="menu-item-yiifans" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-yiifans"><a href="http://www.yiifans.com" target="_blank">Yii2 交流社区</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="motopress-wrapper content-holder clearfix">
