<?php

namespace source\modules\post\home;

use yii\web\Controller;
use Yii;
use source\models\Content;
use source\models\search\ContentSearch;

use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\controllers\ContentController;
use source\LuLu;
use source\models\Taxonomy;
use source\modules\post\models\ContentPost;


class DefaultController extends BaseController
{
   
    
    public function getDetail($id)
    {
        $model = Content::getBody(ContentPost::className(),['a.id'=>$id])->one();
        //var_dump($model);
        
        return ['model'=>$model];
    }
}
