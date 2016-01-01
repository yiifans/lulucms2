<?php

namespace source\models;

use Yii;
use source\helpers\DateTimeHelper;
use source\core\behaviors\DefaultValueBehavior;
use source\helpers\StringHelper;
use yii\db\Query;
use yii\db\yii\db;
use source\modules\post\models\ContentPost;
use source\libs\Common;
use yii\helpers\Url;
use source\libs\Constants;
use yii\helpers\Html;
use source\LuLu;

/**
 * This is the model class for table "lulu_content".
 *
 * @property integer $id
 * @property integer $taxonomy_id
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
 * @property integer $recommend
 * @property integer $headline
 * @property integer $sticky
 * @property integer $flag
 * 
 * @property integer $allow_comment
 * @property string $password
 * @property string $view
 * @property string $layout
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
 * @property string $sub_title
 * @property string $url_alias
 * @property string $summary
 * @property string $thumb
 * @property string $thumbs
 */
class Content extends \source\core\base\BaseActiveRecord
{
   
    public function getCreatedAt()
    {
        return DateTimeHelper::formatTime($this->created_at);
    }
    public function getStatusText()
    {
        return Constants::getStatusItemsForContent($this->status);
    }
    public function getUserText()
    {
        return Html::a($this->user_name,['/user']);
    }
    
    public function getUrl()
    {
        return Url::to(['/'.$this->content_type.'/default/detail','id'=>$this->id]);
    }
    public function beforeSave($insert)
    {
        $uploadedFile = Common::uploadFile('Content[thumb]');
        if($uploadedFile['message']==='ok')
        {
            $this->thumb=$uploadedFile['full_name'];
        }
       
        return parent::beforeSave($insert);
    }
    
    public function getTaxonomy()
    {
        return $this->hasOne(LuLu::getService('taxonomy')->getModel("Taxonomy"), ['id'=>'taxonomy_id']);
    }

   
    public static function getBody($class,$condition=[],$columns=[])
    {
        $bodyModel = new $class();
        if(empty($columns))
        {
            $columns=$bodyModel->getTableSchema()->columns;
        }
        
        $selects = ['content.*'];
        
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
            ->from(['content' => Content::tableName()])
            ->innerJoin(['body'=>$bodyModel::tableName()], '{{content}}.[[id]]={{body}}.[[content_id]]');
        
        if(!empty($condition))
        {
            $query->andWhere($condition);
        }
        return $query;
    }
    
    public static function findPublished($where=null)
    {
        $query = self::find();
        $query->where(['status'=>Constants::Status_Publish]);
        if(!empty($where))
        {
            $query->andWhere($where);
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
            [['taxonomy_id', 'user_id', 'last_user_id', 'created_at', 'updated_at', 'focus_count', 'favorite_count', 'view_count', 'comment_count', 'agree_count', 'against_count', 'sticky', 'recommend', 'headline', 'flag', 'allow_comment', 'sort_num', 'visibility', 'status'], 'integer'],
            [['content_type', 'title'], 'required'],
            [['user_name', 'last_user_name', 'password', 'view', 'layout', 'content_type'], 'string', 'max' => 64],
            [['seo_title', 'seo_keywords', 'seo_description', 'title','sub_title', 'url_alias','redirect_url', 'thumb'], 'string', 'max' => 256],
            [['summary'], 'string', 'max' => 512],
            [['thumbs'], 'string', 'max' => 1024]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'taxonomy_id' => '分类',
            'user_id' => '用户ID',
            'user_name' => '用户名',
            'userText'=>'用户名',
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
            'recommend' => '推荐',
            'headline' => '头条',
            'sticky' => '置顶',
            'flag' => '标签',
            'allow_comment' => '允许评论',
            'password' => '密码',
            'view' => '视图(view)',
            'layout' => '布局(layout)',
            'sort_num' => '排序',
            'visibility' => '可见',
            'status' => '状态',
            'statusText' => '状态',
            'content_type' => '内容类型',
            'seo_title' => '标题',
            'seo_keywords' => '关键字',
            'seo_description' => '描述',
            'title' => '标题',
            'sub_title' => '副标题',
            'url_alias' => '别名',
            'redirect_url' => '转向Url',
            'summary' => '简介',
            'thumb' => '缩略图',
            'thumbs' => '缩略图集',
            
        ];
    }
}
