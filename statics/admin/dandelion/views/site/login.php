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
        '/plugins/fileinput/jquery.fileinput.js',
        '/plugins/placeholder/jquery.placeholder.js',
        '/plugins/mousewheel/jquery.mousewheel.js',
        '/plugins/tinyscrollbar/jquery.tinyscrollbar.js',
        '/plugins/tipsy/jquery.tipsy-min.js',
        '/plugins/tipsy/tipsy.css',
    ]);?>
    
    <?php Resource::registerAdmin([
        '/css/reset.css',
        '/css/fluid.css',
        '/css/login.css',

    ]);?>


<?php Resource::registerAdmin([
        '/js/jquery-1.7.2.min.js',
        '/plugins/placeholder/jquery.placeholder.js',
        '/plugins/validate/jquery.validate.min.js',
        '/js/core/dandelion.login.js',
       
    ]);?>

<title>登录——LuLu CMS 管理中心</title>

<?php $this->head() ?>
</head>

<body>
<?php $this->beginBody();?>

<div id="da-login">
	<div id="da-login-box-wrapper">
    	<div id="da-login-top-shadow">
        </div>
    	<div id="da-login-box">
        	<div id="da-login-box-header">
            	<h1>Login</h1>
            </div>
            <div id="da-login-box-content">
                <?php $form = ActiveForm::begin([ 'id' => 'da-login-form']); ?>
                	<div id="da-login-input-wrapper">
                    	<div class="da-login-input">
                    	   <?php echo Html::activeTextInput($model, 'username',['id'=>'da-login-username','placeholder'=>'Username'])?>
                        </div>
                    	<div class="da-login-input">
                    	   <?php echo Html::activePasswordInput($model, 'password',['id'=>'da-login-password','placeholder'=>'Password'])?>
                        </div>
                    </div>
                    <div id="da-login-button">
                    	<input type="submit" value="Login" id="da-login-submit" />
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div id="da-login-box-footer">
            	<?php if(!empty($message)){echo $message.'<br>';}?>
            	<a href="#">demo/demo</a>
                <div id="da-login-tape"></div>
            </div>
        </div>
    	<div id="da-login-bottom-shadow">
        </div>
    </div>
</div>
<?php $this->endBody();?>
</body>
</html>

<?php $this->endPage();?>