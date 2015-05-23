<?php

namespace source\modules\ttt\admin;;

use source\LuLu;

class DefaultController extends \source\core\back\BaseBackController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
