<?php
namespace source\core\base;

use Yii;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;
use source\LuLu;
use source\libs\Constants;

class BaseActiveRecord extends \yii\db\ActiveRecord
{

    public function init()
    {
        if($this->hasAttribute('sort_num'))
        {
            $this->sort_num = Constants::getSortNum();
        }
        parent::init();
    }
    
    public static function find()
    {
        return new ActiveQuery(get_called_class());
    }

    public static function findOne($condition = null, $orderBy = null, $with = null, $params = [])
    {
        $query = self::findQuery($condition, $orderBy, $with, $params);
        return $query->one();
    }

    public static function findAll($condition = null, $orderBy = null, $limit = null, $with = null, $params = [])
    {
        $query = self::findQuery($condition, $orderBy, $with, $params);
        if ($limit != null)
        {
            $query->limit($limit);
        }
        return $query->all();
    }

    public static function findQuery($condition = null, $orderBy = null, $with = null, $params = [])
    {
        $query = static::find();
        
        if ($with !== null)
        {
            if (is_string($with))
            {
                $query->innerJoinWith($with);
            }
            else
            {
                if (isset($with['type']))
                {
                    $type = $with['type'];
                }
                else if (isset($with[1]))
                {
                    $type = $with[1];
                }
                else
                {
                    $type = 'INNER JOIN';
                }
                
                $query->joinWith($with[0], true, $type);
            }
        }
        
        if ($condition !== null && ! empty($condition))
        {
            if (! ArrayHelper::isAssociative($condition))
            {
                // query by primary key
                $primaryKey = static::primaryKey();
                if (isset($primaryKey[0]))
                {
                    $condition = [
                        $primaryKey[0] => $condition
                    ];
                }
                else
                {
                    throw new InvalidConfigException('"' . get_called_class() . '" must have a primary key.');
                }
            }
            $query->andWhere($condition);
        }
        
        if ($orderBy != null)
        {
            $query->orderBy($orderBy);
        }
        return $query;
    }

    public static function leftJoinWith($with)
    {
        $query = self::find();
        $query->joinWith($with, true, 'LEFT JOIN');
        return $query;
    }
    
    public static function rightJoinWith($with)
    {
        $query = self::find();
        $query->joinWith($with, true, 'RIGHT JOIN');
        return $query;
    }
    
    public $userValidate = true;
    public function beforeValidate()
    {
        if(!$this->userValidate)
        {
            return parent::beforeValidate();
        }
        if (parent::beforeValidate())
        {
            if ($this->hasAttribute('sort_num'))
            {
                if ($this->sort_num === null || $this->sort_num === '')
                {
                    $this->sort_num = Constants::getSortNum();
                }
            }
            if ($this->hasAttribute('created_at'))
            {
                if(empty($this->created_at))
                {
                    $this->created_at = time();
                }
            }
            if ($this->hasAttribute('updated_at'))
            {
                $this->updated_at = time();
            }
            if($this->hasAttribute('created_by'))
            {
                if(empty($this->created_by))
                {
                    $this->created_by=LuLu::getIdentity()->username;
                }
            }
            if($this->hasAttribute('updated_by'))
            {
                if(empty($this->updated_by))
                {
                    $this->updated_by=LuLu::getIdentity()->username;
                }
            }
            return true;
        }
        return false;
    }

    public function afterValidate()
    {
        parent::afterValidate();
        if(!$this->hasErrors())
        {
            if($this->userValidate)
            {
                $this->finalValidate();
            }
        }
        if($this->hasErrors())
        {
            LuLu::setErrorMessage($this->getFirstErrors());
            LuLu::info($this->errors,'validate error:'.self::className());
        }
    }
    
    public function finalValidate()
    {
        
    }
    
    public function attributeLabels()
    {
        return static::getAttributeLabels();
    }
    
    public static function getAttributeLabels($attribute = null)
    {
        return [];
    }
    
    public function afterDelete()
    {
        parent::afterDelete();
        $this->clearCache();
    }
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->clearCache();
    }
    public function clearCache()
    {
        
    }
    
    public function addTrimRule($rules,$scenarios=[])
    {
        $all=[];
        foreach ($rules as $rule)
        {
            if($rule[1]==='trim')
            {
                continue;
            }
            if(is_string($rule[0]))
            {
                $all[]=$rule[0];
            }
            else
            {
                $all=array_merge($all,$rule[0]);
            }
        }
        $scenarios[]=self::SCENARIO_DEFAULT;
        $rules[]=[$all,'trim','on'=>$scenarios];
        return $rules;
    }
}
