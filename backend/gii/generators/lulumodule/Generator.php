<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\gii\generators\lulumodule;

use yii\gii\CodeFile;
use yii\helpers\Html;
use Yii;
use yii\helpers\StringHelper;

/**
 * This generator will generate the skeleton code needed by a module.
 *
 * @property string $controllerNamespace The controller namespace of the module. This property is read-only.
 * @property boolean $modulePath The directory that contains the module class. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends \yii\gii\Generator
{
    public $moduleDir;
    public $moduleID;

    public function stickyAttributes()
    {
        return array_merge(parent::stickyAttributes(), ['moduleDir']);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'LuLu Module Generator';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'This generator helps you to generate the skeleton code needed by a Yii module.';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['moduleID','moduleDir'], 'filter', 'filter' => 'trim'],
            [['moduleDir'], 'required'],
            [['moduleDir'], 'match', 'pattern' => '/^[\w]+$/', 'message' => 'Only word characters'],
            [['moduleID'], 'match', 'pattern' => '/^[\w\\-]+$/', 'message' => 'Only word characters and dashes are allowed.'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'moduleID' => '模块ID',
            'moduleDir' => '模块目录名称',
        ];
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return [
            'moduleID' => '模块的ID, e.g., <code>admin</code>.',
            'moduleDir' => '文件夹名称，如<code>post,shop,news</code>',
        ];
    }

    /**
     * @inheritdoc
     */
    public function successMessage()
    {
        if (Yii::$app->hasModule($this->moduleID)) {
            $link = Html::a('try it now', Yii::$app->getUrlManager()->createUrl($this->moduleID), ['target' => '_blank']);

            return "The module has been generated successfully. You may $link.";
        }

        $output = <<<EOD
<p>The module has been generated successfully.</p>
<p>To access the module, you need to add this to your application configuration:</p>
EOD;
        $code = '';

        return $output . '<pre>' . highlight_string($code, true) . '</pre>';
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates()
    {
        return [];
        return ['module.php', 'controller.php', 'view.php'];
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];
        $modulePath = $this->getModulePath();
       
        $files=array_merge($files,$this->generateInfo($modulePath));
        $files=array_merge($files,$this->generateService($modulePath));
        $files=array_merge($files,$this->generateAdmin($modulePath));
        $files=array_merge($files,$this->generateHome($modulePath));
        $files=array_merge($files,$this->generateSetting($modulePath));
        return $files;
    }
   
    
    private function generateInfo($modulePath)
    {
        $files[] = new CodeFile(
            $modulePath . '/'.$this->getModuleClassName().'Info.php',
            $this->render("module-info.php")
        );
        return $files;
    }
    private function generateService($modulePath)
    {
        $files[] = new CodeFile(
            $modulePath . '/'.$this->getModuleClassName().'Service.php',
            $this->render("service.php")
        );
        return $files;
    }
    private function generateAdmin($modulePath)
    {
    	$files[] = new CodeFile(
    			$modulePath . '/admin/AdminModule.php',
    			$this->render("admin-module.php")
    	);
    	$files[] = new CodeFile(
    			$modulePath . '/admin/controllers/DefaultController.php',
    			$this->render("admin-controller.php")
    	);
    	$files[] = new CodeFile(
    			$modulePath . '/admin/views/default/index.php',
    			$this->render("admin-view.php")
    	);
    	return $files;
    }
    private function generateHome($modulePath)
    {
        $files[] = new CodeFile(
            $modulePath . '/home/HomeModule.php',
            $this->render("home-module.php")
        );
        $files[] = new CodeFile(
            $modulePath . '/home/controllers/DefaultController.php',
            $this->render("home-controller.php")
        );
        $files[] = new CodeFile(
            $modulePath . '/home/views/default/index.php',
            $this->render("home-view.php")
        );
        return $files;
    }
    
    private function generateSetting($modulePath)
    {
        $files[] = new CodeFile(
            $modulePath . '/models/Setting.php',
            $this->render("setting-model.php")
        );
        $files[] = new CodeFile(
            $modulePath . '/admin/Controllers/SettingController.php',
            $this->render("setting-controller.php")
        );
        $files[] = new CodeFile(
            $modulePath . '/admin/views/setting/index.php',
            $this->render("setting-view.php")
        );
        return $files;
    }
    
    /**
     * Validates [[moduleClass]] to make sure it is a fully qualified class name.
     */
    public function validateModuleClass()
    {
        
    }

    public function getModuleClassName()
    {
        return ucwords($this->moduleDir);
    }
    
    public function getModuleId()
    {
       if(empty($this->moduleID))
       {
           return $this->moduleDir;
       }
       return $this->moduleID;
    }
    
    public function getModulePath()
    {
        return Yii::getAlias('@source').'\modules\\'.$this->moduleDir;
    }

    /**
     * @return string the controller namespace of the module.
     */
    public function getControllerNamespace()
    {
        return substr($this->moduleClass, 0, strrpos($this->moduleClass, '\\')) . '\controllers';
    }
}
