<?php

namespace source\modules\post\models;

use Yii;
use source\models\ConfigForm;

class Setting extends ConfigForm
{

    
	public $post_takonomy;
	
    public function rules()
    {
        return [
            [['post_takonomy'], 'string'],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_takonomy' => '绑定分类',
           
        ];
    }
}
