<?php
namespace source\core\front;

use Yii;
use app\Models\User;
use source\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\base\Model;
use yii\web\View;
use source\core\base\BaseView;
use yii\base\Theme;
use source\LuLu;
use source\libs\Resource;

class BaseFrontView extends BaseView
{

    public function init()
    {
        parent::init();
    }

    public function setTheme()
    {
        $currentTheme = Resource::getHomeTheme();
        
        $moduleId = LuLu::$app->controller->module->id;
        
        $config = [
            'pathMap' => [
                '@app/views' => [
                    '@static/themes/' . $currentTheme . '/views', 
                    '@static/themes/default/views'
                ], 
                '@source/modules/' . $moduleId . '/home/views' => [
                    '@static/themes/' . $currentTheme . '/modules/' . $moduleId, 
                    '@static/themes/default/modules/' . $moduleId
                ]
            ], 
            'baseUrl' => '@static/themes/default'
        ];
        
        $this->theme = new Theme($config);
    }
}
