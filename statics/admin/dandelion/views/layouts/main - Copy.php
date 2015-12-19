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

/* @var $this \yii\web\View */
/* @var $content string */

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
    ]);?>

    <!-- Plugin Files -->
    <?php Resource::registerAdmin([
        '/plugins/fileinput/jquery.fileinput.js',
        '/plugins/placeholder/jquery.placeholder.js',
        '/plugins/mousewheel/jquery.mousewheel.js',
        '/plugins/tinyscrollbar/jquery.tinyscrollbar.js',
        '/plugins/tipsy/jquery.tipsy-min.js',
        '/plugins/tipsy/tipsy.css',
    ]);?>

    <!-- Demo JavaScript Files -->
    <?php Resource::registerAdmin([
        '/js/demo/demo.validation.js',
    ]);?>

    <!-- Core JavaScript Files -->
    <?php Resource::registerAdmin([
        '/js/core/dandelion.core.js',
        '/js/core/dandelion.customizer.js',
    ]);?>

    <title><?php echo $this->title ?> - <?php echo $this->getConfigValue('sys_site_name')?></title>
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
                                <a href="dashboard.html">
                                    <img src="<?php echo Resource::getAdminUrl()?>/images/logo.png" alt="Dandelion Admin" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div id="da-header-menu">
                        <div class="da-header-menu-item">首页</div>
                        <div class="da-header-menu-item">首页</div>
                        <div class="da-header-menu-item">首页</div>
                        <div class="da-header-menu-item">首页</div>
                        <div class="da-header-menu-item">首页</div>
                        <div class="da-header-menu-item">首页</div>
                        <div class="da-header-menu-item">首页</div>
                        <div class="da-header-menu-item">首页</div>
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
                            <li>
                                <a href="<?php echo Url::to(['/site/welcome'])?>">
                                    <!-- Icon Container -->
                                    <span class="da-nav-icon">
                                        <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/32/home.png" alt="Dashboard" />
                                    </span>
                                    首页
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- Icon Container -->
                                    <span class="da-nav-icon">
                                        <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/32/graph.png" alt="Charts" />
                                    </span>
                                    设置
                                </a>
                                <ul class="closed">
                                    <li><?php echo Html::a('站点信息',['/system/setting/basic'])?></li>
                                    <li><?php echo Html::a('注册与访问控制',['/system/setting/access'])?></li>
                                    <li><?php echo Html::a('SEO设置',['/system/setting/seo'])?></li>
                                    <li><?php echo Html::a('时间设置',['/system/setting/datetime'])?></li>
                                    <li><?php echo Html::a('邮件设置',['/system/setting/email'])?></li>
                                    <li><?php echo Html::a('模块管理',['/modularity'])?></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- Icon Container -->
                                    <span class="da-nav-icon">
                                        <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/32/day_calendar.png" alt="Calendar" />
                                    </span>
                                    基础功能
                                </a>
                                <ul class="closed">
                                    <li><?php echo Html::a('菜单管理',['/menu'])?></li>
                                    <li><?php echo Html::a('分类管理',['/taxonomy'])?></li>
                                    <li><?php echo Html::a('数据字典',['/dict/dict-category'])?></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- Icon Container -->
                                    <span class="da-nav-icon">
                                        <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/32/file_cabinet.png" alt="File Handling" />
                                    </span>
                                    内容
                                </a>
                                <ul class="closed">

                                    <?php 
                                    foreach (LuLu::$app->activeModules as $id => $moduleInfo){
                                        $module = LuLu::$app->getModule($id);
                                        if(!($module instanceof \source\core\base\BaseModule))
                                        {
                                            continue;
                                        }
                                        $menus = $module->getMenus();
                                        if(count($menus)===0)
                                        {
                                            continue;
                                        }
                                    ?>
                                    <li>
                                        <a href="javascript:;" class=" icon" data="icon">
                                            <?php echo $moduleInfo['instance']->name;?>
                                        </a>

                                        <ul class="closed">
                                            <?php 
                                            foreach ($menus as $menu)
                                            {
                                                if(isset($menu['url']))
                                                {
                                                    $url = $menu['url'];
                                                }
                                                else if(isset($menu[1]))
                                                {
                                                    $url = $menu[1];
                                                }
                                                else
                                                {
                                                    continue;
                                                }
                                            
                                                $title = isset($menu['title'])? $menu['title']: $menu[0];
                                                echo '<li><span style="padding-left: 20px;">'. Html::a($title,$url).'</span></li>';
                                            }?>
                                        </ul>
                                    </li>

                                    <?php }?>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- Icon Container -->
                                    <span class="da-nav-icon">
                                        <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/32/table_1.png" alt="Table" />
                                    </span>
                                    用户
                                </a>
                                <ul class="closed">
                                    <li><?php echo Html::a('用户列表',['/page/default/create'])?></li>
                                    <li><?php echo Html::a('用户组',['/page/default/create'])?></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- Icon Container -->
                                    <span class="da-nav-icon">
                                        <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/32/create_write.png" alt="Form" />
                                    </span>
                                    主题
                                </a>
                                <ul class="closed">
                                    <li><?php echo Html::a('主题',['/page/default/create'])?></li>
                                    <li><?php echo Html::a('菜单',['/page/default/create'])?></li>
                                    <li><?php echo Html::a('小工具',['/page/default/create'])?></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- Icon Container -->
                                    <span class="da-nav-icon">
                                        <img src="<?php echo Resource::getAdminUrl()?>/images/icons/black/32/settings.png" alt="" />
                                    </span>
                                    工具
                                </a>
                                <ul class="closed">
                                    <li><a href="grids.html">任务管理</a></li>
                                    <li><a href="typography.html">用户群管理</a></li>
                                    <li><a href="typography.html">系统维护</a></li>
                                </ul>
                            </li>
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
