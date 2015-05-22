<?php

namespace source\models;

use Yii;
use source\helpers\TimeHelper;
use source\core\behaviors\DefaultValueBehavior;
use source\helpers\StringHelper;
use yii\db\Query;
use yii\db\yii\db;
use source\modules\post\models\ContentPost;
use source\libs\Common;

/**
 * This is the model class for table "lulu_content".
 *
 * @property integer $id
 * @property integer $takonomy_id
 * 
 * @property integer $user_id
 * @property string $user_name
 * @property integer $last_user_id
 * @property string $last_user_name
 * 
 * @property integer $created_at
 * @property integer $updated_at
 * 
 * @property integer $focus_count
 * @property integer $favorite_count
 * @property integer $view_count
 * @property integer $comment_count
 * @property integer $agree_count
 * @property integer $against_count
 * 
 * @property integer $is_sticky
 * @property integer $is_recommend
 * @property integer $is_headline
 * @property integer $flag
 * 
 * @property integer $allow_comment
 * @property string $password
 * @property string $template
 * 
 * @property integer $sort_num
 * @property integer $visibility
 * @property integer $status
 * 
 * @property string $content_type
 * 
 * @property string $seo_title
 * @property string $seo_keywords
 * @property string $seo_description
 * 
 * @property string $title
 * @property string $summary
 * @property string $thumb
 * @property string $url_alias
 */
class Content extends \source\core\base\BaseActiveRecord
{
    const VISIBILITY_PUBLIC='1';
    const VISIBILITY_HIDDEN='2';
    const VISIBILITY_PASSWORD='3';
    const VISIBILITY_PRIVATE='4';
    
    const STATUS_PUBLISH='1';
    const STATUS_DRAFT='2';
    const STATUS_PENDING='3';
    
    public static function getVisibilityItems($v=null)
    {
        $items = [
            self::VISIBILITY_PUBLIC => '公开',
            self::VISIBILITY_HIDDEN => '回复可见',
            self::VISIBILITY_PASSWORD => '密码保护',
            self::VISIBILITY_PRIVATE => '私有'
        ];
        if($v!==null)
        {
            if(isset($items[$v]))
            {
                return $items[$v];
            }
            return 'unknown visibility value:'.$v;
        }
        return $items;
    }
    
    public static function getStatusItems($v=null)
    {
        $items = [
            self::STATUS_PUBLISH => '发布',
            self::STATUS_DRAFT => '草稿',
            self::STATUS_PENDING => '等待审核'
        ];
        if($v!==null)
        {
            if(isset($items[$v]))
            {
                return $items[$v];
            }
            return 'unknown visibility value:'.$v;
        }
        return $items;
    }
   
    
    public function getCreatedAt()
    {
        return TimeHelper::formatTime($this->created_at);
    }
    
    public function beforeSave($insert)
    {
        $uploadedFile = Common::uploadFile('Content[thumb]');
        if($uploadedFile!=null)
        {
            $this->thumb=$uploadedFile['url'].$uploadedFile['new_name'];
        }
       
        return parent::beforeSave($insert);
    }
    
    public function getTakonomy()
    {
        return $this->hasOne(Takonomy::className(), ['id'=>'takonomy_id']);
    }

   
    public static function getBody($class,$condition=[],$columns=[])
    {
        $bodyModel = new $class();
        $table = $bodyModel::tableName();
        if(empty($columns))
        {
            $columns=$bodyModel->getTableSchema()->columns;
        }
        
        $selects=['a.*'];
        
        foreach ((array)$columns as $column)
        {
            $columnName = '';
            if(is_string($column))
            {
                $columnName=$column;
            }
            else 
            {
                $columnName=$column->name;
            }
            $selects[]="body.$columnName as body_$columnName";
        }
        
        $query = new Query();
        $query->select($selects)
            ->from(['a' => Content::tableName()])
            ->innerJoin(['body'=>$table], '{{a}}.[[id]]={{body}}.[[content_id]]');
        
        if(!empty($condition))
        {
            $query->andWhere($condition);
        }
        return $query;
    }
    
    
    public function behaviors()
    {
        return [
            [
                'class' => DefaultValueBehavior::className(), 
                'validates' => [
                    'focus_count', 
                    'favorite_count', 
                    'view_count', 
                    'comment_count', 
                    'agree_count', 
                    'against_count'
                ], 
                'value' => 0
            ]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['takonomy_id', 'user_id', 'last_user_id', 'created_at', 'updated_at', 'focus_count', 'favorite_count', 'view_count', 'comment_count', 'agree_count', 'against_count', 'is_sticky', 'is_recommend', 'is_headline', 'flag', 'allow_comment', 'sort_num', 'visibility', 'status'], 'integer'],
            [['content_type', 'title'], 'required'],
            [['user_name', 'last_user_name', 'password', 'template', 'content_type'], 'string', 'max' => 64],
            [['seo_title', 'seo_keywords', 'seo_description', 'title', 'thumb', 'url_alias'], 'string', 'max' => 256],
            [['summary'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'takonomy_id' => '主分类',
            'user_id' => '用户ID',
            'user_name' => 'User Name',
            'last_user_id' => 'Last User ID',
            'last_user_name' => 'Last User Name',
            'created_at' => '添加时间',
            'updated_at' => '修改时间',
            'focus_count' => '关注数',
            'favorite_count' => '收藏数',
            'view_count' => '浏览数',
            'comment_count' => '评论数',
            'agree_count' => '赞成数',
            'against_count' => '反对数',
            'is_sticky' => '置顶',
            'is_recommend' => '推荐',
            'is_headline' => '头条',
            'flag' => '标签',
            'allow_comment' => '允许评论',
            'password' => '密码',
            'template' => '模板',
            'sort_num' => '排序',
            'visibility' => '可见',
            'status' => '状态',
            'content_type' => '内容类型',
            'seo_title' => '标题',
            'seo_keywords' => '关键字',
            'seo_description' => '描述',
            'title' => '标题',
            'summary' => '简介',
            'thumb' => '缩略图',
            'url_alias' => '别名',
        ];
    }
}
