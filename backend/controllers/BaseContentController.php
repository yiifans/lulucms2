<?php
namespace backend\controllers;

use Yii;
use source\models\Content;
use source\models\search\ContentSearch;
use source\core\back\BackController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\libs\Common;
use source\helpers\StringHelper;
use source\LuLu;

abstract class BaseContentController extends BackController
{

    protected $content_type;

    protected $bodyModel;

    public function actionIndex()
    {
        $searchModel = new ContentSearch();
        $dataProvider = $searchModel->search([]);
        $dataProvider->query->andWhere([
            'content_type' => $this->content_type
        ]);
        $dataProvider->query->orderBy('created_at desc');
        
        return $this->render('index', [
            'searchModel' => $searchModel, 
            'dataProvider' => $dataProvider
        ]);
    }

    public function saveContent($model, $bodyModel)
    {
        $postDatas = Yii::$app->request->post();
        
        if ($model->load($postDatas) && $bodyModel->load($postDatas) && $model->validate() && $bodyModel->validate())
        {
            if ($model->summary === null || $model->summary === '')
            {
                if ($bodyModel->hasAttribute('body'))
                {
                    $content = strip_tags($bodyModel->body);
                    $pattern = '/\s/'; // 去除空白
                    $content = preg_replace($pattern, '', $content);
                    $model->summary = StringHelper::subString($content, 250);
                }
            }
            if ($model->save())
            {
                $bodyModel->content_id = $model->id;
                $bodyModel->save();
                
                return $this->redirect([
                    'index'
                ]);
            }
        }
        return false;
    }

    public function actionCreate()
    {
        $model = new Content();
        $model->user_id = LuLu::$app->user->identity->id;
        $model->user_name = LuLu::$app->user->identity->username;
        $model->content_type = $this->content_type;
        $model->loadDefaultValues();
        
        $bodyModel = $this->findBodyModel();
        $bodyModel->loadDefaultValues();
        
        if (($r = $this->saveContent($model, $bodyModel)) !== false)
        {
            return $r;
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
        
        if (($r = $this->saveContent($model, $bodyModel)) !== false)
        {
            return $r;
        }
        return $this->render('update', [
            'model' => $model, 
            'bodyModel' => $bodyModel
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        $this->deleteBodyModel($id);
        
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
    }

    public function deleteBodyModel($contentId)
    {
        $bodyModel = $this->findBodyModel($contentId);
        if ($bodyModel != null)
        {
            $bodyModel->delete();
        }
    }
}
