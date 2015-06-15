<?php
namespace source\core\back;

use Yii;
use app\Models\User;
use source\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\base\Model;
use source\core\base\BaseController;
use yii\helpers\Url;
use source\LuLu;
use yii\filters\AccessControl;

class BaseBackController extends BaseController
{

    public $modularityService;

    public function init()
    {
        parent::init();
        $this->modularityService = LuLu::getService('modularityService');
    }

    public function beforeAction($action)
    {
        if(in_array($action->id, ['login','captcha']))
        {
            return parent::beforeAction($action);
        }
        
        if(\Yii::$app->user->isGuest)
        {
            $url = Url::to(['/site/login']);
            exit('<script>top.location.href="'.$url.'"</script>');
        }
        return parent::beforeAction($action);
    }

    public function reloadAdmin()
    {
        $url = LuLu::getAlias('@web') . '/admin.php';
        exit('<script>top.location.href="' . $url . '"</script>');
    }
}
