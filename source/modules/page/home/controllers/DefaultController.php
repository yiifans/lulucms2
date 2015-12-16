<?php
namespace source\modules\page\home\controllers;

use source\LuLu;

use source\modules\page\models\ContentPage;
use frontend\controllers\BaseContentController;

class DefaultController extends BaseContentController
{

    public function init()
    {
        parent::init();
        $this->content_type = 'page';
        $this->bodyClass=ContentPage::className();
        
    }

    
}
