<?php
namespace yii\helpers;

use yii\base\InvalidParamException;

class ArrayHelper extends \yii\helpers\BaseArrayHelper
{

    public static function getItems($items, $key = null,$throw=false)
    {
        if ($key !== null)
        {
            if (key_exists($key, $items))
            {
                return $items[$key];
            }
            if($throw)
            {
                throw new InvalidParamException();
            }
            return 'unknown key:' . $key;
        }
        return $items;
    }
}