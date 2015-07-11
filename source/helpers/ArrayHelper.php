<?php
namespace source\helpers;

class ArrayHelper extends \yii\helpers\ArrayHelper
{

    public static function getItems($items, $key = null)
    {
        if ($key !== null)
        {
            if (key_exists($key, $items))
            {
                return $items[$key];
            }
            return 'unknown key:' . $key;
        }
        return $items;
    }
}