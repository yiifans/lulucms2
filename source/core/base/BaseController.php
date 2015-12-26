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
use yii\web\View;
use yii\web\Response;

/**
 *
 * @property \source\modules\modularity\ModularityService $modularityService 
 * @property \source\modules\rbac\RbacService $rbacService 
 * @property \source\modules\taxonomy\TaxonomyService $taxonomyService
 * @property \source\modules\menu\MenuService $menuService 
 *
 */
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
        
        $this->getView()->on(BaseView::EVENT_BEGIN_PAGE, [$this,'beginPage']);
        $this->getView()->on(BaseView::EVENT_BEGIN_BODY, [$this,'beginBody']);
        $this->getView()->on(BaseView::EVENT_BEFORE_RENDER, [$this,'beforeRender']);
        $this->getView()->on(BaseView::EVENT_AFTER_RENDER, [$this,'afterRender']);
        $this->getView()->on(BaseView::EVENT_END_BODY, [$this,'endBody']);
        $this->getView()->on(BaseView::EVENT_END_PAGE, [$this,'endPage']);
        $this->getView()->on(BaseView::EVENT_AFTER_PAGE, [$this,'afterPage']);
        LuLu::getResponse()->on(Response::EVENT_AFTER_SEND, [$this, 'afterResponse']);
    }

    public function jsonResponse($data,$status=null,$message='')
    {
        $ret =['status'=>$status,'message'=>$message, 'data'=>$data];
    
        $response = \Yii::$app->response;
        $response->format = Response::FORMAT_RAW;
        $response->data=json_encode($ret,true);
        return $response;
    }
    public function jsonSucceedResponse($data,$message='')
    {
        return $this->jsonResponse($data,'succeed',$message);
    }
    public function jsonFailedResponse($data,$message='')
    {
        return $this->jsonResponse($data,'failed',$message);
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
    
    
    
    public function beginPage($event)
    {
        
    }
    public function beginBody($event)
    {
        
    }
    public function beforeRender($event)
    {
    
    }
    public function afterRender($event)
    {
    
    }
    public function endBody($event)
    {
        
    }
    public function endPage($event)
    {
        
    }
    public function afterPage($event)
    {
    
    }
    public function afterResponse($event)
    {
    
    }
}
