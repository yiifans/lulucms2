<?php
namespace source\core\back;

use Yii;
use source\core\base\BaseView;
use yii\base\Theme;
use source\LuLu;
use source\libs\Resource;

class BackView extends BaseView
{

    public function init()
    {
        parent::init();
    }

    public function setTheme()
    {
        $currentTheme = Resource::getAdminTheme();
        
        $moduleId = LuLu::$app->controller->module->id;
        
        $config = [
            'pathMap' => [
                '@app/views' => [
                    '@statics/admin/' . $currentTheme . '/views'
                ], 
                '@source/modules/' . $moduleId . '/admin/views' => [
                    '@statics/admin/' . $currentTheme . '/modules/' . $moduleId
                ]
            ], 
            'baseUrl' => '@statics/admin/' . $currentTheme
        ];
        
        $this->theme = new Theme($config);
    }
    
    public function toolbars($bars=[])
    {
        LuLu::setViewParam(['toolbars'=>$bars]);
    }
}
