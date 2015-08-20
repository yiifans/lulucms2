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
                    '@statics/themes/default/views'
                ], 
                '@source/modules/' . $moduleId . '/home/views' => [
                    '@statics/themes/' . $currentTheme . '/modules/' . $moduleId, 
                    '@statics/themes/default/modules/' . $moduleId
                ]
            ], 
            'baseUrl' => '@statics/themes/default'
        ];
        
        $this->theme = new Theme($config);
    }
    
    public function renderMenu($category='main',$parentId=0)
    {
        echo \source\models\Menu::getMenuHtml($category, 0);
    }
    
    public function getFragmentData($fid,$other=[])
    {
        return DataSource::getFragmentData($fid,$other);
    }
}
