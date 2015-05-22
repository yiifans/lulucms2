<?php

namespace source\modules\system\models\config;

use Yii;
use source\core\base\BaseModel;
use source\models\Config;
use source\models\ConfigForm;

class AccessConfig extends ConfigForm
{

	
	public $sys_allow_register;
	public $sys_default_role;
	
	
    public function rules()
    {
        return [
            [['sys_default_role'], 'string'],
			[['sys_allow_register'],'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
          
            'sys_allow_register' => '允许注册',
            'sys_default_role' => '用户默认角色',
          
        ];
    }
}
