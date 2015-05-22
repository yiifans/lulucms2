<?php
namespace source\helpers;

class TimeHelper
{

    public static function getCurrentTime()
    {
        date_default_timezone_set('PRC');
        return date('Y-m-d H:i:s', time());
    }

    public static function showTime($time, $format = 'Y-m-d')
    {
        echo date($format, strtotime($time));
    }

    public static function formatTime($date)
    {
        $str = '';
        /*
         * if(is_string($date))
         * {
         * $timer = strtotime($date);
         * }
         * else{
         * $timer=$date;
         * }
         */
        
        $timer = $date;
        
        $diff = $_SERVER['REQUEST_TIME'] - $timer;
        $day = floor($diff / 86400);
        
        if ($day > 0)
        {
            if ($day < 7)
            {
                return $day . "天前";
            }
            else
            {
                return date('Y-m-d', $timer);
            }
        }
        
        $free = $diff % 86400;
        if ($free > 0)
        {
            $hour = floor($free / 3600);
            if ($hour > 0)
            {
                return $hour . "小时前";
            }
            
            $free = $free % 3600;
            if ($free > 0)
            {
                $min = floor($free / 60);
                
                if ($min > 0)
                {
                    return $min . "分钟前";
                }
                $free = $free % 60;
                if ($free > 0)
                {
                    return $free . "秒前";
                }
                return '刚刚';
            }
            return '刚刚';
        }
        
        return '刚刚';
    }
}