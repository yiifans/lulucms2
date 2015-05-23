<?php
namespace source\modules\page\models;

use Yii;
use source\models\ConfigForm;

class Setting extends ConfigForm
{

    public $page_takonomy;
	
    public function rules()
    {
        return [
            [['page_takonomy'], 'string'],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_takonomy' => '绑定分类'
        ];
    }
}
