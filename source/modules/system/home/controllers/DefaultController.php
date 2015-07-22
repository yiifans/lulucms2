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
use source\models\Takonomy;


class DefaultController extends BaseController
{
   
    public function actionIndex()
    {
    	$takonomy=LuLu::getGetValue('takonomy');
    	
    	$query = Content::find();
    	
    	$query->where(['content_type'=>$this->content_type]);
    	$query->andFilterWhere(['takonomy_id'=>$takonomy]);
    	
    	
    	if($takonomy===null)
    	{
    		$takonomyModel=Takonomy::findOne(['id'=>$takonomy]);
    	}
    	else 
    	{
    		$takonomyModel=['id'=>null,'name'=>'所有'];
    	}
    	
    	$locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>10]);
    	$locals['takonomyModel']=$takonomyModel;
    	
    	return $this->render('index', $locals);
    }
    
    
}
