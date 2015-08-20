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
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */



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
    <title>登录——LuLu CMS 管理中心</title>

    <base href="<?php echo LuLu::getAlias('@web');?>" />
    <?php Resource::registerAdmin('/css/bootstrap.css?v=20150409');?>

    <?php Resource::registerAdmin('/css/icon.css?v=20150409');?>
    <?php Resource::registerAdmin('/css/login.css?v=20150409');?>

    <script type="text/javascript">
        var G_INDEX_SCRIPT = "?/";
        var G_BASE_URL = "";
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
    <div class="aw-login">
        <div class="mod center-block">
            <h1 style="text-align: center;">LuLu CMS</h1>


            <?php $form = ActiveForm::begin([ 'id' => 'login-form']); ?>

            <?= $form->field($model, 'username',['template'=>"{label}\n{input}<i class=\"icon icon-user\"></i>\n{hint}\n{error}",'inputOptions' => ['class' => 'form-control','placeholder'=>'用户名']])?>
            <?= $form->field($model, 'password',['template'=>"{label}\n{input}<i class=\"icon icon-lock\"></i>\n{hint}\n{error}",'inputOptions' => ['class' => 'form-control','placeholder'=>'密码']])->passwordInput()?>


            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-xs-5">{input}</div><div class="col-xs-4 col-xs-offset-1">{image}</div></div>',
                    'imageOptions'=>['class'=>'verification']
                ]) ?>


            <button type="submit" class="btn btn-primary" id="login_submit">登录</button>
            <div class="text-center">admin111/admin111</div>
            <?php ActiveForm::end(); ?>

            <h2 class="text-center text-color-999">LuLu CMS Admin Control</h2>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();?>