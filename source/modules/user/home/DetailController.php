<?php

namespace source\modules\user\home;

use yii\web\Controller;
use Yii;
use source\models\Content;
use source\models\search\ContentSearch;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\ContentController;


class DetailController extends BaseController
{
	
    public function actionIndex($id)
    {
    	Content::updateAllCounters(['views'=>1],['id'=>$id]);
    	$model = Content::findOne(['id'=>$id]);
    	
    	return $this->render('index', ['model'=>$model]);
    }
   
}
