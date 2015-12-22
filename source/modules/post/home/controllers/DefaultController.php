<?php
namespace source\modules\post\home\controllers;

use source\modules\content\models\Content;
use source\LuLu;
use source\models\Taxonomy;
use source\modules\post\models\ContentPost;
use frontend\controllers\BaseContentController;

class DefaultController extends BaseContentController
{
    public function init()
    {
        parent::init();
        $this->content_type = 'post';
        $this->bodyClass = ContentPost::className();
        $this->pageSize_index=10;
        
    }
}
