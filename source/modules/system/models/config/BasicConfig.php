<?php

namespace source\modules\system\models\config;

use Yii;
use source\core\base\BaseModel;
use source\models\Config;
use source\models\ConfigForm;

class BasicConfig extends ConfigForm
{

    
    
	public $sys_site_name;
	public $sys_site_description;
	public $sys_site_about;
	public $sys_site_url;
	public $sys_site_email;
	
	public $sys_lang;
	public $sys_icp;
	public $sys_stat;
	
	public $sys_status;
	
	
    public function rules()
    {
        return [
            [['sys_site_name', 'sys_site_description','sys_site_about', 'sys_site_url', 
				'sys_lang', 'sys_icp', 'sys_stat'], 'string'],
			[['sys_site_email'],'email'],
            [['sys_status'],'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_site_name' => '网站名称',
            'sys_site_description' => '网站描述',
            'sys_site_about' => '关于',
            //'sys_site_url' => '网站Url',
            'sys_site_email' => '站点Email',
           
          
            'sys_lang' => '站点语言',
            'sys_icp' => '备案号',
            'sys_stat' => '统计代码',
            'sys_status' => '站点状态',
        ];
    }
}
