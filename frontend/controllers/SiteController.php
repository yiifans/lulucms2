<?php
namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use source\models\LoginForm;
use source\models\ContactForm;
use source\models\Post;
use source\core\front\FrontController;
use source\models\User;
use source\models\Content;
use source\LuLu;
use yii\data\ActiveDataProvider;

class SiteController extends FrontController
{
    public function actionIndex()
    {
        return $this->render('index', []);
    }

    public function actionLogin()
    {
        if (! \Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }
        $model = new User();
        $model->scenario = 'login';
        if ($model->load(Yii::$app->request->post()) && $model->login())
        {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        return $this->goHome();
    }

    public function actionContact()
    {
        //$this->layout=false;
        
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail']))
        {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about', [
            'test' => 5, 
            'testData' => $this->testData
        ]);
    }

    public function actionClose()
    {
        return $this->render('close', [
            'message' => '站点维护中。。。'
        ]);
    }
    
    public function actionGuestbook()
    {
        return $this->render('guestbook', []);
    }
}
