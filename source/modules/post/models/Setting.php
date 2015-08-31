<?php

namespace source\modules\post\models;

use Yii;
use source\models\ConfigForm;

class Setting extends ConfigForm
{

    
	public $post_taxonomy;
	
    public function rules()
    {
        return [
            [['post_taxonomy'], 'string'],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_taxonomy' => '绑定分类',
           
        ];
    }
}
