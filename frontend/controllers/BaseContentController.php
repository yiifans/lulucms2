<?php

namespace frontend\controllers;

use Yii;
use source\models\Content;
use source\models\search\ContentSearch;
use source\core\base\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\core\front\BaseFrontActiveRecord;
use source\core\front\BaseFrontController;
use source\models\Takonomy;
use source\LuLu;

abstract class BaseContentController extends BaseFrontController
{
	public $content_type;
	
	public function actionIndex()
	{
	    $takonomy = LuLu::getGetValue('takonomy');
        $takonomyModel = Takonomy::getOneOrDefault($takonomy);
	    
	    $query = Content::find();
	    $query->where(['content_type'=>$this->content_type]);
	    $query->andFilterWhere(['takonomy_id'=>$takonomy]);
	     
	    $locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>10]);
	    $locals['takonomyModel']=$takonomyModel;
	     
	    return $this->render('index_default', $locals);
	}
	
	public function actionList()
	{
	    $takonomy=LuLu::getGetValue('takonomy');
	    $takonomyModel = Takonomy::getOneOrDefault($takonomy);
	    
	    $query = Content::find();
	    $query->where(['content_type'=>$this->content_type]);
	    $query->andFilterWhere(['takonomy_id'=>$takonomy]);
	    
	    $locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>10]);
	    $locals['takonomyModel']=$takonomyModel;
	
	    return $this->render('list_default', $locals);
	}
	
	public function actionDetail($id)
	{
	    Content::updateAllCounters(['view_count'=>1],['id'=>$id]);
	     
	    $locals = $this->getDetail($id);
	
	    return $this->render('detail_default', $locals);
	}
	
	public function getDetail($id)
	{
	    
	}
}
