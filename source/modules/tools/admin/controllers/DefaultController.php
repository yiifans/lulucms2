<?php

namespace source\modules\tools\admin\controllers;

use source\LuLu;

class DefaultController extends \source\core\back\BackController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
