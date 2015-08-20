<?php

namespace source\modules\taxonomy\models;

use Yii;

/**
 * This is the model class for table "{{%taxonomy_content}}".
 *
 * @property integer $id
 * @property integer $taxonomy_id
 * @property integer $content_id
 */
class TaxonomyContent extends \source\core\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%taxonomy_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taxonomy_id', 'content_id'], 'required'],
            [['taxonomy_id', 'content_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'taxonomy_id' => 'Taxonomy ID',
            'content_id' => 'Content ID',
        ];
    }
}
