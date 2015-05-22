<?php
namespace backend\controllers;

use yii\web\Controller;

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
}
