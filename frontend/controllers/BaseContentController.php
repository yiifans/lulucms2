<?php

namespace frontend\controllers;

use Yii;
use source\models\Content;
use source\models\search\ContentSearch;
use source\core\base\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\core\front\FrontController;
use source\LuLu;

abstract class BaseContentController extends FrontController
{
	public $content_type;
	
	public function actionIndex()
	{
	    $query = Content::find();
	    $query->where(['content_type'=>$this->content_type]);
	     
	    $locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>10]);
	   
	    return $this->render('index_default', $locals);
	}
	
	public function actionList($taxonomy=-1)
	{
	    $query = Content::find();
	    $query->where(['content_type'=>$this->content_type]);
	    if($taxonomy!==-1)
	    {
	        $query->andFilterWhere(['taxonomy_id'=>$taxonomy]);
	    }
	    
	    $taxonomyModel = $this->taxonomyService->getTaxonomyById($taxonomy);
	    $vars = $this->getListVars($taxonomyModel);
	    
	    $locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>$vars['pageSize']]);
	    $locals['taxonomyModel']=$taxonomyModel;
	    
	    LuLu::setViewParam(['taxonomyModel'=>$taxonomyModel]);
	    
	    $this->layout = $vars['layout'];
	    return $this->render($vars['view'], $locals);
	}
	
	
	
	public function actionDetail($id)
	{
	    Content::updateAllCounters(['view_count'=>1],['id'=>$id]);
	     
	    $locals = $this->getDetail($id);
	    $locals['taxonomyModel'] = $this->taxonomyService->getTaxonomyById($locals['model']['taxonomy_id']);
	    
	    $vars = $this->getDetailVars($locals['taxonomyModel'],$locals['model']);
	   
	    $this->layout = $vars['layout'];
	    return $this->render($vars['view'], $locals);
	}
	
	public abstract function getDetail($id);

	
    public function getListVars($taxonomy)
	{
	    $locals = [];

	    $locals['view'] = empty($taxonomy['list_view']) ? 'list_default': $taxonomy['list_view'];
	    $locals['layout'] = empty($taxonomy['list_layout']) ? null: $taxonomy['list_layout'];
	    $locals['pageSize'] = empty($taxonomy['page_size']) ? 10: $taxonomy['page_size'];
	    return $locals;
	}
	
	public function getDetailVars($taxonomy,$detailModel)
	{
	    $locals = [];
	    
	    if(!empty($detailModel['view']))
	    {
	        $locals['view']=$detailModel['view'];
	    }
	    else
	    {
	        $locals['view'] = empty($taxonomy['detail_view']) ? 'detail_default': $taxonomy['detail_view'];
	    }
	    
	    if(!empty($detailModel['layout']))
	    {
	        $locals['layout']=$detailModel['layout'];
	    }
	    else
	    {
	        $locals['layout'] = empty($taxonomy['detail_layout']) ? null: $taxonomy['detail_layout'];
	    }
	    
	    return $locals;
	}
}
