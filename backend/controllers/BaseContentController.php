<?php
namespace backend\controllers;

use Yii;
use source\models\Content;
use source\models\search\ContentSearch;
use source\core\back\BackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\libs\Common;
use yii\helpers\StringHelper;
use source\LuLu;

abstract class BaseContentController extends BackController
{

    protected $content_type;

    protected $bodyClass;
    
    protected $bodyModel;

    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere([
            'content_type' => $this->content_type
        ]);
        
        return $this->render('index', [
            'searchModel' => $searchModel, 
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new Content();
        $model->user_id = LuLu::getIdentity()->id;
        $model->user_name = LuLu::getIdentity()->username;
        $model->content_type = $this->content_type;
        $model->loadDefaultValues();
        
        $bodyModel = $this->findBodyModel();
        $bodyModel->loadDefaultValues();
        
        if ($this->saveContent($model, $bodyModel))
        {
            return $this->redirect([
                'index'
            ]);
        }
        
        return $this->render('create', [
            'model' => $model, 
            'bodyModel' => $bodyModel
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $bodyModel = $this->findBodyModel($id);
        
        if ($this->saveContent($model, $bodyModel))
        {
            return $this->redirect([
                'index'
            ]);
        }
        
        return $this->render('update', [
            'model' => $model, 
            'bodyModel' => $bodyModel
        ]);
    }

    public function actionDelete($id)
    {
        $transaction = LuLu::getDB()->beginTransaction();
        try{
            $this->findModel($id)->delete();
            $this->findBodyModel($id)->delete();
            $transaction->commit();
        }
        catch (\Exception $e)
        {
            $transaction->rollBack();
        }
       
        return $this->redirect([
            'index'
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Content::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function findBodyModel($contentId = null)
    {
        $bodyClass = $this->bodyClass;
        
        if ($contentId === null)
        {
            return new $bodyClass();
        }
        else
        {
            $ret = $bodyClass::findOne([
                'content_id' => $contentId
            ]);
            if ($ret === null)
            {
                $ret = new $bodyClass();
                $ret->content_id = $contentId;
                $ret->body = '';
                $ret->save();
            }
            return $ret;
        }
    }

    public function saveContent($model, $bodyModel)
    {
        $postDatas = Yii::$app->request->post();
    
        if ($model->load($postDatas) && $bodyModel->load($postDatas) && $model->validate() && $bodyModel->validate())
        {
            $model->summary = $this->getSummary($model, $bodyModel);
            $transaction = LuLu::getDB()->beginTransaction();
            try{
                $model->save(false);
                $bodyModel->content_id = $model->id;
                $bodyModel->save();
                $transaction->commit();
                
                return true;
            }
            catch (\Exception $e)
            {
                $transaction->rollBack();
                return false;
            }
        }
        return false;
    }
    
    public function getSummary($model, $bodyModel)
    {
        if(empty($model->summary))
        {
            if ($bodyModel->hasAttribute('body'))
            {
                $content = strip_tags($bodyModel->body);
                $content = preg_replace('/\s/', '', $content);
                $model->summary = StringHelper::subString($content, 250);
            }
        }
        return $model->summary;
    }
}
