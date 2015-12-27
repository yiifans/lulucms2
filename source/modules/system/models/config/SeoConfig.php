<?php

namespace source\modules\system\models\config;

use Yii;
use source\core\base\BaseModel;
use source\models\Config;
use source\models\ConfigForm;

class SeoConfig extends ConfigForm
{
	public $sys_seo_title;
	public $sys_seo_keywords;
	public $sys_seo_description;
	
	public $sys_seo_head;
	
    public function rules()
    {
        return [
            [['sys_seo_title','sys_seo_keywords','sys_seo_description','sys_seo_head'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_seo_title' => '标题',
            'sys_seo_keywords'=>'关键字',
            'sys_seo_description'=>'描述',
            'sys_seo_head' =>'其它头部信息',
        ];
    }
}
