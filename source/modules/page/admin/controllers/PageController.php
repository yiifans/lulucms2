<?php
namespace source\modules\page\admin\controllers;

use source\modules\post\models\ContentPost;
use source\modules\page\models\ContentPage;
use backend\controllers\BaseContentController;

class PageController extends BaseContentController
{

    public function init()
    {
        parent::init();
        $this->content_type = 'page';
        $this->bodyClass=ContentPage::className();
    }

}
