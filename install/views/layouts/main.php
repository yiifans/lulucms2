<?php 

use source\libs\Resource;
use source\models\Menu;
use source\LuLu;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LuLu CMS安装向导 —— <?php echo $this->title?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="<?php echo Resource::getInstallUrl()?>/css/base1.css" />
    <link rel="stylesheet" href="<?php echo Resource::getInstallUrl()?>/css/style.css" type="text/css" media="screen" />
    <link rel='stylesheet' id='themememe-icons-css' href='<?php echo Resource::getInstallUrl()?>/css/fonts/font-awesome.min.css?ver=1419744126' type='text/css' media='all' />
    
    <script type='text/javascript' src='<?php echo Resource::getInstallUrl()?>/js/jquery.min.js?ver=1419744126'></script>
    <script type='text/javascript' src='<?php echo Resource::getInstallUrl()?>/js/jquery-migrate.min.js?ver=1419744126'></script>
    <script type='text/javascript' src='<?php echo Resource::getInstallUrl()?>/js/jquery.dropkick.min.js?ver=1419744126'></script>

    <script type='text/javascript' src='<?php echo Resource::getCommonUrl()?>/libs/jquery.validate/jquery.validate.min.js'></script>
    <script type='text/javascript' src='<?php echo Resource::getCommonUrl()?>/libs/jquery.validate/localization/messages_zh.min.js'></script>

    <!--[if lt IE 9]>
<script src="<?php echo Resource::getInstallUrl()?>/js/html5.js"></script>
<script src="<?php echo Resource::getInstallUrl()?>/js/selectivizr.js"></script>
<script src="<?php echo Resource::getInstallUrl()?>/js/respond.js"></script>
<![endif]-->
    <style type="text/css" id="custom-background-css">
        body.custom-background { background-color: #f0f0f0; }
    </style>
</head>

<body class="home blog custom-background chrome">
    <div class="site-top">
        <div class="clearfix container">
            <div class="site-branding">
                <h1 class="site-title"><a href="http://www.lulucms.com" rel="home" title="LuLu CMS">
                    LuLu CMS</a></h1>
            </div>
           
        </div>
        <!-- .site-top -->
    </div>
    <div class="site-main">
        <div class="clearfix container">
            <div class="row">


<?php echo $content;?>
                
            </div>
        </div>
        <!-- .site-main -->
</div>
<!--    <footer class="site-footer" role="contentinfo">
        <div class="clearfix container">
            <div class="foot_menu">
                <div class="menu-%e9%a1%b5%e8%84%9a-container">
                    <ul id="menu-%e9%a1%b5%e8%84%9a" class="menu">
                        
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="clear"></div>
                <div class="col-sm-6 site-info" style="padding-top: 15px;">
                    Copyright &copy; 2012-2015 LuLu CMS&nbsp;&nbsp;保留所有权利.
					&nbsp;&nbsp;
                    
                    <br>
                    申明：本站文字除标明出处外皆为作者原创，转载请注明原文链接。 
                </div>
            </div>
        </div>
    </footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
