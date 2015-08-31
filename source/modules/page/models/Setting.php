<?php
namespace source\modules\page\models;

use Yii;
use source\models\ConfigForm;

class Setting extends ConfigForm
{

    public $page_taxonomy;
	
    public function rules()
    {
        return [
            [['page_taxonomy'], 'string'],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'page_taxonomy' => '绑定分类'
        ];
    }
}
