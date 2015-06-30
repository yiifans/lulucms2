<?php

namespace source\modules\dict\admin;;

use source\LuLu;

class DefaultController extends \source\core\back\BackController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
