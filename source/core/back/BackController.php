<?php
namespace source\core\back;

use Yii;
use source\core\base\BaseController;
use yii\helpers\Url;
use source\LuLu;

class BackController extends BaseController
{
    public function beforeAction($action)
    {
        if(!parent::beforeAction($action))
        {
            return false;
        }
        if (in_array($action->id, ['login','captcha']))
        {
            return parent::beforeAction($action);
        }
        
        if (\Yii::$app->user->isGuest)
        {
            $url = Url::to(['/site/login']);
            exit('<script>top.location.href="'.$url.'"</script>');
        }
        
        if (! $this->rbacService->checkPermission('manager_admin'))
        {
            return $this->showMessage();
        }
        
        if(!in_array($action->id, ['logout','error','welcome' ]))
        {
            if(! $this->rbacService->checkPermission())
            {
                return $this->showMessage();
            }
        }
        
        return parent::beforeAction($action);
    }
    
    public function showMessage($message = null, $title = '提示',$params=[])
    {
        if ($message === null)
        {
            $message = '权限不足，无法进行此项操作';
        }
    
        $params=array_merge(['title'=>$title,'message'=>$message],$params);
        
        return $this->render('//site/message',$params);
    }
}
