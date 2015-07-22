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
    }

    public function findBodyModel($contentId = null)
    {
        if ($contentId === null)
        {
            return new ContentPost();
        }
        else
        {
            $ret = ContentPost::findOne([
                'content_id' => $contentId
            ]);
            if ($ret === null)
            {
                $ret = new ContentPost();
                $ret->content_id = $contentId;
                $ret->body = '';
                $ret->save();
            }
            return $ret;
        }
    }

    public function deleteBodyModel($contentId)
    {
        parent::deleteBodyModel($contentId);
    }
}
