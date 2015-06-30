<?php
namespace backend\controllers;

use Yii;
use source\models\Config;
use source\models\search\ConfigSearch;
use source\core\back\BackController;
use yii\base\InvalidParamException;
use source\models\ConfigForm;

abstract class BaseSettingController extends BackController
{

    public function doConfig($model, $view = null)
    {
        if (! ($model instanceof ConfigForm))
        {
            throw new InvalidParamException('model must be instance of ConfigForm');
        }
        
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) && $model->saveAll())
        {
            return $this->refresh();
        }
        else
        {
            if ($view === null)
            {
                $view = $this->action->id;
            }
            
            $model->initAll();
            return $this->render($view, [
                'model' => $model
            ]);
        }
    }
}
