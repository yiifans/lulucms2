<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use source\models\Taxonomy;
use source\libs\Resource;
use source\LuLu;

/* @var $this \yii\web\View */
/* @var $content string */

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
    <title><?php echo $this->title?> —— LuLu Blog</title>
    

    
    <base href="<?php echo LuLu::getAlias('@web');?>" />
    <?php Resource::registerAdmin('/css/bootstrap.css?v=20150409');?>
    <?php Resource::registerAdmin('/css/icon.css?v=20150409');?>
    <?php Resource::registerAdmin('/css/common.css?v=20150409');?>
    <?php Resource::registerAdmin('/css/site.css?v=20150409');?>
    
    <script type="text/javascript">
        var G_INDEX_SCRIPT = "?/";
        var G_BASE_URL = "http://localhost/WeCenter/?";
        var G_STATIC_URL = "http://localhost/WeCenter/static";
        var G_UPLOAD_URL = "http://localhost/WeCenter/uploads";
        var G_USER_ID = "1";
        var G_POST_HASH = "";
    </script>
    
    <?php Resource::registerAdmin('/js/jquery.2.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/aws_admin.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/aws_admin_template.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/jquery.form.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/framework.js?v=20150409');?>
    <?php Resource::registerAdmin('/js/global.js?v=20150409');?>
    
   
    <!--[if lte IE 8]>
    <?php Resource::registerAdmin('/js/respond.js');?>
    <![endif]-->
    <style type="text/css">
        html,body{height:auto;}
    </style>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    

    <div class="aw-content-wrap" style="margin:0px;padding:0px;">
        <div class="main-content" style="margin: 0px;">
            <?php echo $content?>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
