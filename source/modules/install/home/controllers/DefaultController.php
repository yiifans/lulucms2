<?php

namespace source\modules\install\home\controllers;

use source\LuLu;

class DefaultController extends \source\core\front\FrontController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
