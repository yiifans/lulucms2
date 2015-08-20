<?php

namespace source\models;

use Yii;
use source\helpers\TimeHelper;
use source\core\behaviors\DefaultValueBehavior;
use source\helpers\StringHelper;

/**
 * This is the model class for table "lulu_content".
 *
 * @property integer $content_id
 * 
 */
class ContentBody extends \source\core\base\BaseActiveRecord
{
    
    public function getTaxonomy()
    {
        return $this->hasOne(Taxonomy::className(), ['id'=>'taxonomy_id']);
    }

    public function getHead()
    {
        return $this->hasOne(Content::className(), ['id'=>'content_id']);
    }
}
