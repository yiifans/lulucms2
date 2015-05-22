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
    <link href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.css" rel="stylesheet">
    
    <script src="/lulublog/static/assets/c3ffc636/jquery.js"></script>
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
     <style>
        html {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        body {
            font-family: 'Microsoft Yahei', '微软雅黑', '宋体', \5b8b\4f53, Tahoma, Arial, Helvetica, STHeiti;
            margin: 0;
        }

        .main-nav {
            margin-left: 1px;
        }

            .main-nav.nav-tabs.nav-stacked > li {
            }

                .main-nav.nav-tabs.nav-stacked > li > a {
                    padding: 10px 8px;
                    font-size: 12px;
                    font-weight: 600;
                    color: #4A515B;
                    background: #E9E9E9;
                    background: -moz-linear-gradient(top, #FAFAFA 0%, #E9E9E9 100%);
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FAFAFA), color-stop(100%,#E9E9E9));
                    background: -webkit-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
                    background: -o-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
                    background: -ms-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
                    background: linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9');
                    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9')";
                    border: 1px solid #D5D5D5;
                    border-radius: 4px;
                }

                    .main-nav.nav-tabs.nav-stacked > li > a > span {
                        color: #4A515B;
                    }

                .main-nav.nav-tabs.nav-stacked > li.active > a, #main-nav.nav-tabs.nav-stacked > li > a:hover {
                    color: #FFF;
                    background: #3C4049;
                    background: -moz-linear-gradient(top, #4A515B 0%, #3C4049 100%);
                    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#4A515B), color-stop(100%,#3C4049));
                    background: -webkit-linear-gradient(top, #4A515B 0%,#3C4049 100%);
                    background: -o-linear-gradient(top, #4A515B 0%,#3C4049 100%);
                    background: -ms-linear-gradient(top, #4A515B 0%,#3C4049 100%);
                    background: linear-gradient(top, #4A515B 0%,#3C4049 100%);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#4A515B', endColorstr='#3C4049');
                    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#4A515B', endColorstr='#3C4049')";
                    border-color: #2B2E33;
                }

                    #main-nav.nav-tabs.nav-stacked > li.active > a, #main-nav.nav-tabs.nav-stacked > li > a:hover > span {
                        color: #FFF;
                    }

            .main-nav.nav-tabs.nav-stacked > li {
                margin-bottom: 4px;
            }

        .nav-header.collapsed > span.glyphicon-chevron-toggle:before {
            content: "\e114";
        }

        .nav-header > span.glyphicon-chevron-toggle:before {
            content: "\e113";
        }

        footer.duomi-page-footer {
            background-color: white;
        }

            footer.duomi-page-footer .beta-message {
                color: #a4a4a4;
            }

                footer.duomi-page-footer .beta-message a {
                    color: #53a2e4;
                }

            footer.duomi-page-footer .list-inline a, footer.authenticated-footer .list-inline li {
                color: #a4a4a4;
                padding-bottom: 30px;
            }




        footer.duomi-page-footer {
            background-color: white;
        }

            footer.duomi-page-footer .beta-message {
                color: #a4a4a4;
            }

                footer.duomi-page-footer .beta-message a {
                    color: #53a2e4;
                }

            footer.duomi-page-footer .list-inline a, footer.authenticated-footer .list-inline li {
                color: #a4a4a4;
                padding-bottom: 30px;
            }

        /*********************************************自定义部分*********************************************/
        .secondmenu a {
            font-size: 12px;
            color: #4A515B;
            text-align: left;
            border-radius: 4px;
        }

        .secondmenu > li > a:hover {
            background-color: #6f7782;
            border-color: #428bca;
            color: #fff;
        }

        .secondmenu li.active {
            background-color: #6f7782;
            border-color: #428bca;
            border-radius: 4px;
        }

            .secondmenu li.active > a {
                color: #ffffff;
            }

        .navbar-static-top {
            background-color: #212121;
            margin-bottom: 5px;
        }

        .navbar-brand {
            
            display: inline-block;
            vertical-align: middle;
            padding-left: 50px;
            color: #fff;
        }

            .navbar-brand:hover {
                color: #fff;
            }


        .collapse.glyphicon-chevron-toggle, .glyphicon-chevron-toggle:before {
            content: "\e113";
        }

        .collapsed.glyphicon-chevron-toggle:before {
            content: "\e114";
        }

        

    </style>
    
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>


<div class="wrap">

    <div class="navbar navbar-duomi navbar-static-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" id="logo">LuLu Blog 管理系统
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <ul id="main-nav" class="main-nav nav nav-tabs nav-stacked" style="">
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-th-large"></i>
                            	首页 		
                        </a>
                    </li>
                    <li>
                        <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-cog"></i>
                             	系统管理
                            
                            <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="systemSetting" class="nav nav-list secondmenu collapse" style="height: 0px;">
                            <li><?php echo Html::a('基本设置',['/system/config/basic'])?></li>
                            <li><?php echo Html::a('评论设置',['/#'])?></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#configSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-credit-card"></i>
                          	  类目管理	
                             <span class="pull-right glyphicon  glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="configSetting" class="nav nav-list secondmenu collapse">
                            <li><?php echo Html::a('菜单管理',['/menu'])?></li>
                            <li><?php echo Html::a('分类管理',['/takonomy'])?></li>
                           
                        </ul>
                    </li>

                    <li>
                        <a href="#disSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-globe"></i>
                            	文章
							 <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="disSetting" class="nav nav-list secondmenu collapse">
                            <li><?php echo Html::a('新建',['/post/default/create'])?></li>
                            <li><?php echo Html::a('所有文章',['/post'])?></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#dicSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-bold"></i>
                            	页面
                            <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="dicSetting" class="nav nav-list secondmenu collapse">
                            <li><?php echo Html::a('新建',['/page/default/create'])?></li>
                            <li><?php echo Html::a('所有页面',['/page'])?></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#themeSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-bold"></i>
                            	界面
                            <span class="pull-right glyphicon glyphicon-chevron-toggle"></span>
                        </a>
                        <ul id="themeSetting" class="nav nav-list secondmenu collapse">
                            <li><?php echo Html::a('主题',['/page/default/create'])?></li>
                            <li><?php echo Html::a('菜单',['/page'])?></li>
                            <li><?php echo Html::a('小工具',['/page'])?></li>
                            
                        </ul>
                    </li>                    
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-fire"></i>
                            	关于系统
                            <span class="badge pull-right">1</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="col-md-10">
		        <div class="container">
		            <?= Breadcrumbs::widget([
		                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		            ]) ?>
		            <?php echo $content?>
		        </div>
            </div>
        </div>
    </div>
    
    
</div>    
<?php $this->endBody() ?>
<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php $this->endPage() ?>
