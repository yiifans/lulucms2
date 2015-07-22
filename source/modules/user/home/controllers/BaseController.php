<?php

namespace source\modules\user\home;

use yii\web\Controller;
use Yii;
use source\models\Content;
use source\models\search\ContentSearch;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\ContentController;
use source\LuLu;


class BaseController extends ContentController
{
	
    public function init()
    {
    	$this->content_type=Content::TYPE_POST;
    	parent::init();
    }
   
   
}
