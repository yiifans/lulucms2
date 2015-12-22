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
use source\libs\DataSource;

abstract class BaseContentController extends FrontController
{
    //首页页面大小
    public $pageSize_index = 10;
    
    //内容类型
	public $content_type;
	
	//内容body的class
	public $bodyClass;
	
	/**
	 * 首页
	 * @return \yii\base\string
	 */
	public function actionIndex()
	{
	    $query = Content::findPublished(['content_type'=>$this->content_type]);
	     
	    $locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>$this->pageSize_index]);
	   
	    return $this->render('index_default', $locals);
	}
	
	/**
	 * 列表页
	 * @param integer $taxonomy
	 * @return \yii\base\string
	 */
	public function actionList($taxonomy=-1)
	{
	    $query = Content::findPublished(['content_type'=>$this->content_type]);
	    if(intval($taxonomy)>0)
	    {
	        $query->andFilterWhere(['taxonomy_id'=>intval($taxonomy)]);
	    }
	    
	    $taxonomyModel = $this->taxonomyService->getTaxonomyById($taxonomy);
	    LuLu::setViewParam(['taxonomyModel'=>$taxonomyModel]);
	    
	    $vars = $this->getListVars($taxonomyModel);
	    
	    $locals = LuLu::getPagedRows($query,['orderBy'=>'created_at desc','pageSize'=>$vars['pageSize']]);
	    $locals['taxonomyModel']=$taxonomyModel;
	    
	    $this->layout = $vars['layout'];
	    return $this->render($vars['view'], $locals);
	}
	
	
	/**
	 * 内容页
	 * @param unknown $id
	 * @return \yii\base\string
	 */
	public function actionDetail($id)
	{
	    Content::updateAllCounters(['view_count'=>1],['id'=>$id]);
	     
	    $locals = $this->getDetail($id);
	    
	    $taxonomyModel = $this->taxonomyService->getTaxonomyById($locals['model']['taxonomy_id']);
	    LuLu::setViewParam(['taxonomyModel'=>$taxonomyModel]);
	    
	    $locals['taxonomyModel'] = $taxonomyModel;
	    
	    $vars = $this->getDetailVars($locals['taxonomyModel'],$locals['model']);
	   
	    $this->layout = $vars['layout'];
	    return $this->render($vars['view'], $locals);
	}
	
    public function getDetail($id)
    {
        $model = Content::getBody($this->bodyClass, [
            'content.id' => $id
        ])->one();
       
        return [
            'model' => $model
        ];
    }

	/**
	 * 
	 * @param unknown $taxonomyModel
	 * @return array ['view','layout','pageSize]
	 */
    public function getListVars($taxonomyModel)
	{
	    $vars = [];

	    $vars['view'] = empty($taxonomyModel['list_view']) ? 'list_default': $taxonomyModel['list_view'];
	    $vars['layout'] = empty($taxonomyModel['list_layout']) ? null: $taxonomyModel['list_layout'];
	    $vars['pageSize'] = empty($taxonomyModel['page_size']) ? 10: $taxonomyModel['page_size'];
	    return $vars;
	}
	
	/**
	 * 
	 * @param unknown $taxonomyModel
	 * @param unknown $detailModel
	 * @return array ['view','layout']
	 */
	public function getDetailVars($taxonomyModel,$detailModel)
	{
	    $vars = [];
	    
	    if(!empty($detailModel['view']))
	    {
	        $vars['view']=$detailModel['view'];
	    }
	    else
	    {
	        $vars['view'] = empty($taxonomyModel['detail_view']) ? 'detail_default': $taxonomyModel['detail_view'];
	    }
	    
	    if(!empty($detailModel['layout']))
	    {
	        $vars['layout']=$detailModel['layout'];
	    }
	    else
	    {
	        $vars['layout'] = empty($taxonomyModel['detail_layout']) ? null: $taxonomyModel['detail_layout'];
	    }
	    
	    return $vars;
	}
}
