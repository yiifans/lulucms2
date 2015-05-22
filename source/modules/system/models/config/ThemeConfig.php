<?php

namespace source\modules\system\models\config;

use Yii;
use source\core\base\BaseModel;
use source\models\Config;
use source\models\ConfigForm;

class ThemeConfig extends ConfigForm
{
	public $sys_site_theme;
	public $test_data_theme;
	
    public function rules()
    {
        return [
            [['sys_site_theme','test_data_theme'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_site_theme' => '主题',
            'test_data_theme'=>'测试'
        ];
    }
}
