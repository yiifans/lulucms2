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
use source\core\base\Theme;
use source\LuLu;
use source\libs\Resource;
use source\libs\DataSource;

class FrontView extends BaseView
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
                    '@statics/themes/' . $currentTheme . '/views', 
                    '@statics/themes/basic/views'
                ], 
                '@source/modules/' . $moduleId . '/home/views' => [
                    '@statics/themes/' . $currentTheme . '/modules/' . $moduleId, 
                    '@statics/themes/basic/modules/' . $moduleId
                ]
            ], 
            'basePath' => '@statics/themes/basic',
            'baseUrl' => '@statics/themes/basic'
        ];
        
        $this->theme = new Theme($config);
    }
    
    public function getMenus($category='main',$parentId=0)
    {
        return $this->menuService->getChildren($category, $parentId,1);
    }
    public function renderMenu($category='main',$parentId=0)
    {
        echo $this->menuService->getMenuHtml($category, 0);
    }
    
    public function getFragmentData($code,$options=[])
    {
        return DataSource::getFragmentData($code,$options);
    }
    
    
    public function beginForm($options=[])
    {
        $class=\source\core\front\widgets\ActiveForm::className();
        return $this->beginWidget($class,$options);
    }
    public function endForm()
    {
        $class=\source\core\front\widgets\ActiveForm::className();
        return $this->endWidget($class);
    }
    
    
}
