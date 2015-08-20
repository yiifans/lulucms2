<?php

namespace source\modules\theme\home\controllers;

use source\LuLu;

class DefaultController extends \source\core\front\FrontController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
