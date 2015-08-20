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

    /**
     * @var \source\modules\modularity\ModularityService
     */
    public $modularityService;
    /**
     * @var \source\modules\rbac\RbacService
     */
    public $rbacService;
    /**
     * @var \source\modules\taxonomy\TaxonomyService
     */
    public $taxonomyService;

    public function init()
    {
        parent::init();
       
        $this->modularityService = LuLu::getService('modularity');
        $this->rbacService = LuLu::getService('rbac');
        $this->taxonomyService = LuLu::getService('taxonomy');
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
