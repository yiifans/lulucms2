<?php
namespace source\modules\page\home\controllers;

use source\LuLu;
use source\models\Taxonomy;
use source\models\Content;
use source\modules\page\models\ContentPage;
use frontend\controllers\BaseContentController;

class DefaultController extends BaseContentController
{

    public function init()
    {
        $this->content_type = 'page';
        parent::init();
    }

    public function getDetail($id)
    {
        $model = Content::getBody(ContentPage::className(), [
            'a.id' => $id
        ])->one();
        
        return [
            'model' => $model
        ];
    }
}
