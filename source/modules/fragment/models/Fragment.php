<?php

namespace source\modules\fragment\models;

use Yii;
use source\LuLu;
use source\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%fragment}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * @property integer $type
 */
class Fragment extends \source\core\base\BaseActiveRecord
{
    const CachePrefix = 'fragment_';
    
    const Type_Code=1;
    const Type_Static=2;
    public static function getTypeItems($key = null)
    {
        $items = [
            self::Type_Code=>'代码碎片',
            self::Type_Static=>'静态碎片',
        ];
        return ArrayHelper::getItems($items,$key);
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fragment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'type'], 'required'],
            [['category_id', 'type'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['description'], 'string', 'max' => 128]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return self::getAttributeLabels();
    }
    
    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'id' => 'ID',
            'category_id'=>'碎片分类',
            'name' => '名称',
            'description' => '描述',
            'type' => '类型',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    
    public static function getData($fid, $other = [],$fromCache = true)
    {
        $cacheKey = self::CachePrefix.$fid;
        
        $values = $fromCache? LuLu::getCache($cacheKey):false;
        if($values === false)
        {
            $fragment = self::findOne(['id'=>$fid]);
            if($fragment == null)
            {
                return [];
            }
        
            if($fragment->type === 1)
            {
                $query = Fragment1Data::find();
            }
            else
            {
                $query = Fragment2Data::find();
            }
        
            $query->where(['fragment_id' => $fid,'status'=>1]);
            $query->orderBy('sort_num asc');
            $values = $query->all();
            
            LuLu::setCache($cacheKey, $values);
        }
        
        $offset = isset($other['offset'])?$other['offset']:0;
        $limit = isset($other['limit'])?$other['limit']:count($values)-$offset;
        return array_slice($values, $offset, $limit, true);
    }
   
    public static function clearCachedData($fid)
    {
        $cacheKey = self::CachePrefix.$fid;
        LuLu::deleteCache($cacheKey);
    }
}
