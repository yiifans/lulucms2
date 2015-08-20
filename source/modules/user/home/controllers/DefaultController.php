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
use source\models\Taxonomy;


class DefaultController extends BaseController
{
   
    public function actionIndex()
    {
    	$taxonomy=LuLu::getGetValue('taxonomy');
    	
    	$query = Content::find();
    	
    	$query->where(['content_type'=>$this->content_type]);
    	$query->andFilterWhere(['taxonomy_id'=>$taxonomy]);
    	
    	
    	if($taxonomy===null)
    	{
    		$taxonomyModel=Taxonomy::findOne(['id'=>$taxonomy]);
    	}
    	else 
    	{
    		$taxonomyModel=['id'=>null,'name'=>'所有'];
    	}
    	
    	$locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>10]);
    	$locals['taxonomyModel']=$taxonomyModel;
    	
    	return $this->render('index', $locals);
    }
    
    
}
