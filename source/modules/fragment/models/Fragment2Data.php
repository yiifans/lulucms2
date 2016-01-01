<?php

namespace source\modules\fragment\models;

use Yii;
use source\LuLu;
use yii\helpers\ArrayHelper;
use source\libs\Common;
/**
 * This is the model class for table "{{%fragment2_data}}".
 *
 * @property integer $id
 * @property integer $fragment_id
 * @property string $title
 * @property string $title_format
 * @property string $thumb
 * @property string $url
 * @property string $sub_title
 * @property string $summary
 * @property integer $created_at
 * @property string $created_by
 * @property integer $sort_num
 * @property integer $status
 */
class Fragment2Data extends FragmentData
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fragment2_data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fragment_id', 'title', 'created_at', 'sort_num', 'status'], 'required'],
            [['fragment_id', 'created_at', 'sort_num', 'status'], 'integer'],
            [['title', 'thumb', 'url', 'sub_title'], 'string', 'max' => 256],
            [['title_format', 'created_by'], 'string', 'max' => 64],
            [['summary'], 'string', 'max' => 512],
        ];
    }

    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => 'ID',
            'fragment_id' => '碎片',
            'title' => '标题',
            'title_format' => '标题格式',
            'thumb' => '缩略图',
            'url' => '链接地址',
            'sub_title' => '副标题',
            'summary' => '简介',
            'created_at' => '添加时间',
            'created_by' => '作者',
            'sort_num' => '排序',
            'status' => '状态',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    public function beforeSave($insert)
    {
        $uploadedFile = Common::uploadFile('Fragment2Data[thumb]');
        if($uploadedFile['message']==='ok')
        {
            $this->thumb=$uploadedFile['full_name'];
        }
        return parent::beforeSave($insert);
    }
}
