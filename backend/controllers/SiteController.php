<?php
namespace backend\controllers;

use yii\web\Controller;
use source\LuLu;
use yii\helpers\Url;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $this->layout = 'container';
        return $this->render('index');
    }

    public function actionWelcome()
    {
        return $this->render('welcome');
    }
    
    public function actionLogout()
    {
        //logout
        
        //redirect to home
        $url = LuLu::getAlias('@web');
        exit('<script>top.location.href="'.$url.'"</script>');
        
        //return $this->redirect(LuLu::getAlias('@web'));
    }
}
