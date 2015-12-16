<?php

namespace source\modules\theme\models;

use source\LuLu;
use yii\helpers\ArrayHelper;

class Setting extends \source\models\ConfigForm
{

    public $sys_theme_home;
    public $sys_theme_admin;
    
	
    public function rules()
    {
        return [
            [['sys_theme_home', 'sys_theme_admin'], 'required'],
            [['sys_theme_home', 'sys_theme_admin'], 'string', 'max'=>64],
        ];
    }

    public function attributeLabels()
    {
        return self::getAttributeLabels();
    }
    
    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'sys_theme_home'=>'前台主题',
            'sys_theme_admin'=>'后台主题'
        ];
        return ArrayHelper::getItems($items,$attribute);
    }
    
    public static function getAllHomeThemes()
    {
        $items = [
            'bifenxiang'=>'博客主题bifenxiang',
            'fengyun'=>'博客主题fengyun',
            'bioenergy'=>'企业主题',
            'CodingLife'=>'CodingLife',
        ];
        return $items;
    }
    public static function getAllAdminThemes()
    {
        $items = [
            'dandelion'=>'dandelion',
        ];
        return $items;
    }
}
