<?php
namespace source\core\back;

use Yii;
use source\core\base\BaseView;
use yii\base\Theme;
use source\LuLu;

class BackView extends BaseView
{

    public function init()
    {
        parent::init();
    }

    public function setTheme()
    {
        $currentTheme = LuLu::getAppParam('adminTheme');
        
        $moduleId = LuLu::$app->controller->module->id;
        
        $config = [
            'pathMap' => [
                '@app/views' => [
                    '@static/admin/' . $currentTheme . '/views'
                ], 
                '@source/modules/' . $moduleId . '/admin/views' => [
                    '@static/admin/' . $currentTheme . '/modules/' . $moduleId
                ]
            ], 
            'baseUrl' => '@static/admin/' . $currentTheme
        ];
        
        $this->theme = new Theme($config);
    }
    
    public function toolbars($bars=[])
    {
        LuLu::setViewParam(['toolbars'=>$bars]);
    }
}
