<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use source\models\Taxonomy;
use source\libs\Resource;
use source\LuLu;
use yii\helpers\Url;
use source\modules\menu\models\Menu;

/* @var $this \yii\web\View */
/* @var $content string */

$rbacService = LuLu::getService('rbac');

?>

<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- iOS webapp icons -->
    <link rel="apple-touch-icon" href="touch-icon-iphone.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="touch-icon-ipad.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="touch-icon-retina.png" />

    <?php Resource::registerAdmin([
        '/css/reset.css',
        '/css/fluid.css',
        '/css/dandelion.theme.css',
        '/css/dandelion.css',
        '/css/demo.css',
       
    ]);?>


    <!-- jQuery JavaScript File -->
    <?php Resource::registerAdmin('/js/jquery-1.7.2.min.js');?>

    <!-- jQuery-UI JavaScript Files -->
    
    <?php Resource::registerAdmin([
        '/plugins/jui/js/jquery-ui-1.8.20.min.js',
        '/plugins/jui/js/jquery.ui.timepicker.min.js',
        '/plugins/jui/js/jquery.ui.touch-punch.min.js',
        '/plugins/jui/css/jquery.ui.all.css',
    ]);
    
    ?>

    <!-- Plugin Files -->
    <?php Resource::registerAdmin([
        '/plugins/fileinput/jquery.fileinput.js',
        '/plugins/placeholder/jquery.placeholder.js',
        '/plugins/mousewheel/jquery.mousewheel.js',
        '/plugins/tinyscrollbar/jquery.tinyscrollbar.min.js',
        '/plugins/tipsy/jquery.tipsy-min.js',
        '/plugins/tipsy/tipsy.css',
    ]);?>

    <!-- Demo JavaScript Files -->
    <?php Resource::registerAdmin([
        '/js/demo/demo.validation.js',
        '/js/demo/demo.ui.js',
        '/js/demo/demo.tables.js',
    ]);?>

    <!-- Core JavaScript Files -->
    <?php Resource::registerAdmin([
        '/js/core/dandelion.core.js',
        //'/js/core/dandelion.customizer.js',
    ]);?>

    <title><?php echo $this->title ?> - <?php echo $this->getConfigValue('sys_site_name')?></title>
    <script type="text/javascript">
        function toggleMenu(id) {
            $(".menu-item").hide();
            $("#menu-item-" + id).show();
        }
    </script>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
  

    <!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
    <div id="da-wrapper" class="fluid">

        <!-- Header -->
        <div id="da-header">

            <div id="da-header-top">

                <!-- Container -->
                <div class="da-container clearfix">

                    <!-- Logo Container. All images put here will be vertically centere -->
                    <div id="da-logo-wrap">
                        <div id="da-logo">
                            <div id="da-logo-img">
                                <a href="<?php echo LuLu::getAlias('@web').'/admin.php';?>">
                                    <img src="<?php echo Resource::getAdminUrl()?>/images/logo.png" alt="Dandelion Admin" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="da-header-menu">
                        <?php foreach($this->menuService->getChildren('admin') as $item):?>
                        <div class="da-header-menu-item" id="menu-<?php echo $item['id']?>" onclick="toggleMenu(<?php echo $item['id']?>);"><?php echo $item['name']?></div>
                        <?php endforeach;?>
                    </div>
                    <!-- Header Toolbar Menu -->
                    <!-- Header Toolbar Menu -->
                    <div id="da-header-toolbar" class="clearfix">
                        <div id="da-user-profile">
                            <div id="da-user-avatar">
                                <img src="<?php echo Resource::getAdminUrl()?>/images/pp.jpg" alt="" />
                            </div>
                            <div id="da-user-info">
                                <?php echo LuLu::$app->user->identity->username?>
                            </div>
                            <ul class="da-header-dropdown">
                                <li class="da-dropdown-caret">
                                    <span class="caret-outer"></span>
                                    <span class="caret-inner"></span>
                                </li>
                                <li class="da-dropdown-divider"></li>
                                <li><a href="<?php echo LuLu::getAlias('@web').'/index.php';?>" target="_blank">站点首页</a></li>
                            </ul>
                            
                        </div>
                        <div id="da-header-button-container">
                            <ul>
                                <li class="da-header-button logout">
                                    <?php echo Html::a('退出',['/site/logout'])?>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Content -->
        <div id="da-content">

            <!-- Container -->
            <div class="da-container clearfix">

                <!-- Sidebar -->
                <div id="da-sidebar-separator"></div>
                <div id="da-sidebar">

                    <!-- Main Navigation -->
                    <div id="da-main-nav" class="da-button-container">
                        <ul>
                        <?php echo Menu::getAdminMenu();?>
                        </ul>
                    </div>

                </div>

                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">

                    <!-- Content Area -->
                    <div id="da-content-area">
                        <?php if(LuLu::getViewParam('defaultLayout')===null):?>
                        <div class="grid_4">
                            <div class="da-panel">
                                <div class="da-panel-header">
                                    <span class="da-panel-title">
                                        <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/16/pencil.png" alt="">
                                        <?= $this->title ?>
                                    </span>


                                </div>
                                <?php if(($toolbars = LuLu::getViewParam('toolbars'))!==null):?>
                                <div class="da-panel-toolbar top">
                                    <ul>
                                        <?php foreach ($toolbars as $bar):?>
                                        <li><?php echo $bar;?></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                                <?php endif;?>

                                <div class="da-panel-content">
                                    <?php if($message = LuLu::getFlash('error')):?>
                                    <div class="da-message error">
                                        <?php 
                                        if(is_array($message))
                                        {
                                            echo '<ul>';
                                            foreach ($message as $item)
                                            {
                                                echo '<li>'.$item.'</li>';
                                            }
                                            echo '</ul>';
                                        }
                                        else
                                        {
                                            echo $message;
                                        }
                                        ?>
                                    </div>
                                    <?php endif;?>
                                    <?php echo $content ?>
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                            <?php echo $content ?>
                        <?php endif;?>
                    </div>

                </div>

            </div>

        </div>

        <!-- Footer -->
        <div id="da-footer">
            <div class="da-container clearfix">
                <p>
                Copyright 2012. LuLu CMS Admin. All Rights Reserved.
            </div>
        </div>

    </div>
    <?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>
