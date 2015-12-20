<?php
namespace source\core\base;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\LuLu;
use yii\web\ErrorAction;
use source\traits\CommonTrait;
use yii\base\InvalidRouteException;

class BaseController extends Controller
{
    use CommonTrait;

    public function behaviors()
    {
        return [];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ], 
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction', 
                // 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                'height' => '40', 
                'width' => '100', 
                'minLength' => 3, 
                'maxLength' => 5
            ]
        ];
    }

    

    public function init()
    {
        parent::init();
    }

    /**
	 * 执行一个action
	 * @param string $id
	 * @param array $params
	 * @return ActionResult
	 */
    public function runAction($id, $params = [])
    {
        $action = $this->createAction($id);
        if ($action === null)
        {
            throw new InvalidRouteException('Unable to resolve the request: ' . $this->getUniqueId() . '/' . $id);
        }
        
        Yii::trace("Route to run: " . $action->getUniqueId(), __METHOD__);
        
        if (Yii::$app->requestedAction === null)
        {
            Yii::$app->requestedAction = $action;
        }
        
        $oldAction = $this->action;
        $this->action = $action;
        
        $modules = [];
        $runAction = true;
        
        foreach ($this->getModules() as $module)
        {
            if ($module->beforeAction($action))
            {
                array_unshift($modules, $module);
            }
            else
            {
                $runAction = false;
                break;
            }
        }
        
        $actionResult = new ActionResult();
        $actionResult->controller = $this;
        $actionResult->action = $action;
        
        $result = $this->beforeAction($action);
        if ($runAction && $result === true)
        {
            $actionResult->isExecuted = true;
            $actionResult->result = $action->runWithParams($params);
        }
        else
        {
            $actionResult->isExecuted = false;
            $actionResult->result = $result;
        }
        
        $actionResult = $this->afterAction($action, $actionResult);
        
        foreach ($modules as $module)
        {
            $actionResult = $module->afterAction($action, $actionResult);
        }
        
        $this->action = $oldAction;
        
        return $actionResult;
    }
    
    public function findLayoutFile($view)
    {
        if(($view instanceof BaseView) && !empty($view->layout))
        {
            $oldLayout = $this->layout;
            $this->layout = $view->layout;
            $file = parent::findLayoutFile($view);
            $this->layout=$oldLayout;
            return $file;
        }
        else 
        {
            return parent::findLayoutFile($view);
        }
    }
}
