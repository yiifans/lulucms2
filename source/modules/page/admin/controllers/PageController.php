<?php
namespace source\modules\page\admin\controllers;

use source\models\Content;
use source\modules\post\models\ContentPost;
use source\modules\page\models\ContentPage;
use backend\controllers\BaseContentController;

class PageController extends BaseContentController
{

    public function init()
    {
        parent::init();
        $this->content_type = 'page';
    }

    public function findBodyModel($contentId = null)
    {
        if ($contentId === null)
        {
            return new ContentPage();
        }
        else
        {
            $ret = ContentPage::findOne([
                'content_id' => $contentId
            ]);
            if ($ret === null)
            {
                $ret = new ContentPage();
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
