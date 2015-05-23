<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use source\models\Takonomy;
use source\libs\Resource;
use source\LuLu;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

 $this->title = $this->getConfigValue('sys_site_name');
?>

<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="blank" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo $this->title?> —— 管理中心</title>
    
    
    <base href="<?php echo LuLu::getAlias('@web');?>" />
    <?php Resource::registerAdmin('/css/bootstrap.css?v=20150409');?>
    <?php Resource::registerAdmin('/css/icon.css?v=20150409');?>

    <script type="text/javascript">
        var G_INDEX_SCRIPT = "?/";
        var G_BASE_URL = "http://localhost/WeCenter/?";
        var G_STATIC_URL = "http://localhost/WeCenter/static";
        var G_UPLOAD_URL = "http://localhost/WeCenter/uploads";
        var G_USER_ID = "1";
        var G_POST_HASH = "";
    </script>
    
    <?php Resource::registerAdmin('/css/common.css?v=20150409');?>
    
    <?php Resource::registerAdmin('/js/jquery.2.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/aws_admin.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/aws_admin_template.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/jquery.form.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/framework.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/global.js?v=20150409');?>
    
   
    <!--[if lte IE 8]>
    <?php Resource::registerAdmin('/js/respond.js');?>
    <![endif]-->
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
    <div class="aw-header">
        <button class="btn btn-sm mod-head-btn pull-left">
            <i class="icon icon-bar"></i>
        </button>

        <div class="mod-header-user">
            <ul class="pull-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle mod-bell" data-toggle="dropdown">
                        <i class="icon icon-bell"></i>
                    </a>
                    <ul class="dropdown-menu mod-chat">
                        <p>没有通知</p>
                    </ul>
                </li>

                <li class="dropdown username">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo Resource::getAdminUrl('/images/avatar-mid-img.png')?>" class="img-circle" width="30">
                        admin888                    <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu pull-right mod-user">
                        <li>
                            <a href="<?php echo LuLu::getAlias('@web');?>"><i class="icon icon-home"></i>首页</a>
                        </li>

                        <li>
                            <a href="<?php echo LuLu::getAlias('@web');?>"><i class="icon icon-ul"></i>概述</a>
                        </li>

                        <li>
                            <a href="<?php echo LuLu::getAlias('@web');?>"><i class="icon icon-logout"></i>退出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="aw-side" id="aw-side">
        <div class="mod">
            <div class="mod-logo">
                
                <h1>LuLu CMS</h1>
            </div>
            <ul class="mod-bar">
                <li>
                    <?php echo Html::a('<span>概述</span>',['/site/welcome'],['target'=>'mainFrame','class'=>'icon icon-home active'])?>
                </li>
                <li>
                    <a href="javascript:;" class=" icon icon-setting " data="icon">
                        <span>全局设置</span>
                    </a>

                    <ul class="hide">
                        <li>
                            <?php echo Html::a('<span>站点信息</span>',['/system/setting/basic'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>注册与访问控</span>',['/system/setting/access'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>时间设置</span>',['/system/setting/datetime'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>邮件设置</span>',['/system/setting/email'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>模块管理</span>',['/modularity'],['target'=>'mainFrame'])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class=" icon icon-reply" data="icon">
                        <span>类目管理</span>
                    </a>

                    <ul class="hide">
                        <li>
                            <?php echo Html::a('<span>菜单管理</span>',['/menu'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>分类管理</span>',['/takonomy'],['target'=>'mainFrame'])?>
                        </li>
                        
                    </ul>
                </li>
              
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
                    <a href="javascript:;" class=" icon icon-user" data="icon">
                        <span><?php echo $moduleInfo['instance']->name;?></span>
                    </a>

                    <ul class="hide">
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
                            
                            $title = isset($menu['title'])?$menu['title']: $menu[0];
                        ?>
                        <li>
                            <?php echo Html::a('<span>'.$title.'</span>',$url,['target'=>'mainFrame'])?>
                        </li>
                        <?php }?>
                    </ul>
                </li>
                
                <?php }?>  
                       
                <!-- 
                <li>
                    <a href="javascript:;" class=" icon icon-report" data="icon">
                        <span>页面管理</span>
                    </a>

                    <ul class="hide">
                        <li>
                            <?php echo Html::a('<span>新建</span>',['/page/default/create'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>所有页面</span>',['/page'],['target'=>'mainFrame'])?>
                        </li>
                       
                    </ul>
                </li>

                
                <li>
                    <a href="javascript:;" class=" icon icon-signup" data="icon">
                        <span>界面</span>
                    </a>

                    <ul class="hide">
                        <li>
                            <?php echo Html::a('<span>主题</span>',['/page/default/create'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>菜单</span>',['/page/default/create'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>小工具</span>',['/page/default/create'],['target'=>'mainFrame'])?>
                        </li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class=" icon icon-share" data="icon">
                        <span>用户管理</span>
                    </a>

                    <ul class="hide">
                        <li>
                            <?php echo Html::a('<span>用户列表</span>',['/page/default/create'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>用户组</span>',['/page/default/create'],['target'=>'mainFrame'])?>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class=" icon icon-inbox" data="icon">
                        <span>邮件群发</span>
                    </a>

                    <ul class="hide">
                        <li>
                            <a href="http://localhost/WeCenter/?/admin/edm/tasks/">
                                <span>任务管理</span>
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/WeCenter/?/admin/edm/groups/">
                                <span>用户群管理</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class=" icon icon-job" data="icon">
                        <span>工具</span>
                    </a>

                    <ul class="hide">
                        <li>
                            <a href="http://localhost/WeCenter/?/admin/tools/">
                                <span>系统维护</span>
                            </a>
                        </li>
                    </ul>
                </li>
                 -->
            </ul>
        </div>
    </div>

    <div class="aw-content-wrap">
        <div class="main-content" >
        
            <iframe  id="mainFrame" name="mainFrame" width="100%" height="100%" frameborder="0" scrolling="yes" src="<?php echo Url::to(['/site/welcome'])?>"  onLoad="iFrameHeight()"></iframe>
          
            <script type="text/javascript" language="javascript">
            function iFrameHeight() 
            {
            	var contentHeight = document.body.scrollHeight-100;
            	
            	console.log(contentHeight);
            	
            	var ifm= document.getElementById("mainFrame");
            	ifm.height = contentHeight;
            	//ifm.height=300;
            }
            </script> 
        </div>
        
    </div>

    <div class="aw-footer">
        <p>Copyright &copy; 2015 - Powered By <a href="http://www.yiifans.com/" target="blank">LuLu CMS</a></p>
    </div>

    <!-- DO NOT REMOVE -->
    <div id="aw-ajax-box" class="aw-ajax-box"></div>


    <div style="display: none;" id="__crond">
        
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
