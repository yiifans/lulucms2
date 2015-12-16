<?php
namespace source\modules\post\admin\controllers;

use source\modules\post\models\ContentPost;
use backend\controllers\BaseContentController;

class PostController extends BaseContentController
{

    public function init()
    {
        parent::init();
        $this->content_type = 'post';
        $this->bodyClass=ContentPost::className();
    }
}
