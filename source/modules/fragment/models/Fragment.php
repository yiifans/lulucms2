<?php

namespace source\modules\fragment\models;

use Yii;
use source\LuLu;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "{{%fragment}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $code
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
            [['name', 'category_id', 'type', 'code'], 'required'],
            [['category_id', 'type'], 'integer'],
            [['name','code'], 'string', 'max' => 63],
            ['code','unique'],
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
            'code' => '标识',
            'name' => '名称',
            'description' => '描述',
            'type' => '类型',
        ];
        return ArrayHelper::getItems($items, $attribute);
    }
    
    public static function getData($code, $other = [],$fromCache = true)
    {
        $cacheKey = self::CachePrefix.$code;
        
        $values = $fromCache? LuLu::getCache($cacheKey):false;
        if($values === false)
        {
            $fragment = self::findOne(['code'=>$code]);
            if($fragment == null)
            {
                return [];
            }
            $query = $fragment->type === 1 ? Fragment1Data::find() : Fragment2Data::find();
            $query->where(['fragment_id' => $fragment->id,'status'=>1]);
            $query->orderBy('sort_num asc');
            $values = $query->all();
            
            LuLu::setCache($cacheKey, $values);
        }
        
        $offset = isset($other['offset'])?$other['offset']:0;
        $limit = isset($other['limit'])?$other['limit']:count($values)-$offset;
        return array_slice($values, $offset, $limit, true);
    }
   
    public static function clearCachedData($id)
    {
        $fragment = self::findOne(['id'=>$id]);
        if($fragment===null)
        {
            return;
        }
        $cacheKey = self::CachePrefix.$fragment->code;
        LuLu::deleteCache($cacheKey);
    }
}
