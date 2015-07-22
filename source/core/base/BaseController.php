<?php
namespace source\core\base;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use source\LuLu;
use yii\web\ErrorAction;

class BaseController extends Controller
{

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

    public $modularityService;

    protected $rbacService;

    public function init()
    {
        parent::init();
       
        $this->modularityService = LuLu::getService('modularity');
        $this->rbacService = LuLu::getService('rbac');
    }

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
        $module = $this->module;
        
        if(($view instanceof BaseView) && !empty($view->layout))
        {
            $layout = $view->layout;
        }
        else 
        {
            if (is_string($this->layout)) {
                $layout = $this->layout;
            } elseif ($this->layout === null) {
                while ($module !== null && $module->layout === null) {
                    $module = $module->module;
                }
                if ($module !== null && is_string($module->layout)) {
                    $layout = $module->layout;
                }
            }
        }
        
    
        if (!isset($layout)) {
            return false;
        }
    
        if (strncmp($layout, '@', 1) === 0) {
            $file = Yii::getAlias($layout);
        } elseif (strncmp($layout, '/', 1) === 0) {
            $file = Yii::$app->getLayoutPath() . DIRECTORY_SEPARATOR . substr($layout, 1);
        } else {
            $file = $module->getLayoutPath() . DIRECTORY_SEPARATOR . $layout;
        }
    
        if (pathinfo($file, PATHINFO_EXTENSION) !== '') {
            return $file;
        }
        $path = $file . '.' . $view->defaultExtension;
        if ($view->defaultExtension !== 'php' && !is_file($path)) {
            $path = $file . '.php';
        }
    
        return $path;
    }
}
