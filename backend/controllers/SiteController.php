<?php
namespace backend\controllers;

use yii\web\Controller;
use source\LuLu;
use yii\helpers\Url;
use source\models\User;
use source\core\back\BaseBackController;

class SiteController extends BaseBackController
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
        LuLu::$app->user->logout();
        return $this->redirect([
            'index'
        ]);
    }

    public function actionLogin()
    {
        if (! LuLu::$app->user->isGuest)
        {
            return $this->goHome();
        }
        
        $this->layout = false;
        $model = new \source\models\LoginForm();
        if ($model->load(LuLu::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model
        ]);
    }
}
