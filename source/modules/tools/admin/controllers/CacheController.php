<?php

namespace source\modules\tools\admin\controllers;

use source\LuLu;
use source\modules\tools\models\CacheForm;
use yii\helpers\FileHelper;

class CacheController extends \source\core\back\BackController
{
    public function actionIndex()
    {
        $model = new CacheForm();
        
        if(LuLu::$app->request->isPost && $model->load(LuLu::$app->request->post()))
        {
            if($model->cache)
            {
                LuLu::flushCache();
                LuLu::$app->schemaCache->flush();
            }
            
            if($model->asset)
            {
                $assetDir = LuLu::getAlias('@statics/assets');
                //FileHelper::removeDirectoryContent($assetDir);
            }
            return $this->redirect(['index']);
        }
        
        return $this->render('index',['model'=>$model]);
    }
}
