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
    <?php Resource::registerAdmin('/css/admin.css?v=20150409');?>
    <?php Resource::registerAdmin('/css/icon.css?v=20150409');?>

    <script type="text/javascript">
        var G_INDEX_SCRIPT = "?/";
        var G_BASE_URL = "";
        var G_STATIC_URL = "";
        var G_UPLOAD_URL = "";
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

<body style="margin: 0px; overflow: hidden;" scroll="no">
    <?php $this->beginBody() ?>
    <table id="frametable" cellpadding="0" cellspacing="0" width="100%" height="100%" style="width: 100%;">
        <tr>
            <td id="header" colspan="2">
                <div id="logo">
                    LuLu CMS
                </div>

                <div id="topMenu">
                    <ul>

                        <li>
                            <?php echo Html::a('首页',['/site/welcome'],['data-menu'=>'home','target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('设置',['/system/setting/basic'],['data-menu'=>'setting','target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('类目',['/menu'],['data-menu'=>'taxonomy','target'=>'mainFrame'])?>
                        </li>

                        <li>
                            <?php echo Html::a('内容',['/page'],['data-menu'=>'module','target'=>'mainFrame'])?>
                        </li>
                        <!--
                        <li>
                            <?php echo Html::a('用户',['/user'],['data-menu'=>'user','target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('工具',['/tool'],['data-menu'=>'tool','target'=>'mainFrame'])?>
                        </li>
                        -->
                    </ul>
                </div>


                <div id="info">
                    <ul>
                        <li>您好，<?php echo LuLu::$app->user->identity->username?>
                        </li>
                        <li>
                            <?php echo Html::a('退出',['/site/logout'])?>
                        </li>

                        <li>
                            <a href="<?php echo LuLu::getAlias('@web').'/index.php';?>" target="_blank">站点首页</a>
                        </li>

                    </ul>
                </div>
            </td>
        </tr>
        <tr>
            <td valign="top" id="leftContent">
                <div id="leftMenu">
                    <ul class="mod-bar" id="home">
                        <li>
                            <?php echo Html::a('<span>欢迎中心</span>',['/site/welcome'],['class'=>'active','target'=>'mainFrame'])?>
                        </li>
                    </ul>

                    <ul class="mod-bar" id="setting" style="display: none;">
                        <li>
                            <?php echo Html::a('<span>站点信息</span>',['/system/setting/basic'],['class'=>'active','target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>注册与访问控制</span>',['/system/setting/access'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>SEO设置</span>',['/system/setting/seo'],['target'=>'mainFrame'])?>
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

                    <ul class="mod-bar" id="taxonomy" style="display: none;">
                        <li>
                            <?php echo Html::a('<span>菜单管理</span>',['/menu'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>分类管理</span>',['/taxonomy'],['target'=>'mainFrame'])?>
                        </li>
                    </ul>

                    <ul class="mod-bar" id="module" style="display: none;">


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
                    </ul>
                    <ul class="mod-bar" id="user" style="display: none;">
                        <li>
                            <?php echo Html::a('<span>用户列表</span>',['/page/default/create'],['target'=>'mainFrame'])?>
                        </li>
                        <li>
                            <?php echo Html::a('<span>用户组</span>',['/page/default/create'],['target'=>'mainFrame'])?>
                        </li>
                    </ul>

                    <ul class="mod-bar" id="theme" style="display: none;">
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

                    <ul class="mod-bar" id="tool" style="display: none;">

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



                        <li>
                            <a href="http://localhost/WeCenter/?/admin/tools/">
                                <span>系统维护</span>
                            </a>
                        </li>

                    </ul>

                </div>

            </td>

            <td valign="top" class="mask" id="mainContent">

                <iframe  id="mainFrame" name="mainFrame" width="100%" height="100%" style="overflow: visible;display:" frameborder="0" scrolling="yes" src="<?php echo Url::to(['/site/welcome'])?>"  onLoad="iFrameHeight()"></iframe>

            </td>
        </tr>

    </table>

    <script type="text/javascript" language="javascript">
        $(document).ready(function () {
            $("#topMenu li a").click(function () {
                $("#leftMenu ul").hide();

                var menu = $(this).attr("data-menu");
                console.log(menu);
                $("#" + menu).show();
            });
        });

        function iFrameHeight() {
            var bodyHeight = document.body.scrollHeight;
            var contentHeight = document.body.scrollHeight - 300;

            console.log(contentHeight);

            var ifm = document.getElementById("mainFrame");
            //ifm.height = contentHeight;


            //ifm.height=300;
        }
    </script>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
