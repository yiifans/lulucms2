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

class BaseBackController extends BaseController
{

    public function reloadAdmin()
    {
        $url = LuLu::getAlias('@web') . '/admin.php';
        exit('<script>top.location.href="' . $url . '"</script>');
    }
}
