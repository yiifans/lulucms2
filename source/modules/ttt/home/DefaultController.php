<?php

namespace source\modules\ttt\home;;

use source\LuLu;

class DefaultController extends \source\core\front\BaseFrontController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
