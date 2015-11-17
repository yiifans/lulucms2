<?php

namespace source\modules\fragment\models;

use Yii;
use source\LuLu;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%fragment1_data}}".
 *
 * @property integer $id
 * @property integer $fragment_id
 * @property string $title
 * @property string $content
 * @property integer $created_at
 * @property string $created_by
 * @property integer $sort_num
 * @property integer $status
 */
class Fragment1Data extends FragmentData
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fragment1_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fragment_id', 'title', 'content', 'created_at', 'sort_num', 'status'], 'required'],
            [['fragment_id', 'created_at', 'sort_num', 'status'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 256],
            [['created_by'], 'string', 'max' => 64],
        ];
    }
    
    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => 'ID',
            'fragment_id' => '碎片',
            'title' => '标题',
            'content' => '内容',
            'created_at' => '添加时间',
            'created_by' => '作者',
            'sort_num' => '排序',
            'status' => '状态',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    
}
