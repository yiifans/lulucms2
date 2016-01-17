<?php
namespace source\helpers;

use source\libs\Common;

class DateTimeHelper
{

    public static function getCurrentTime($useSys = FALSE)
    {
        if (! $useSys)
        {
        }
        date_default_timezone_set('PRC');
        return date('Y-m-d H:i:s', time());
    }

    public static function showTime($time, $format = 'Y-m-d')
    {
        echo date($format, strtotime($time));
    }

    public static function formatTime($datetime, $format = true,$showtime = false)
    {
        // $datetime = strtotime($datetime);
        if ($format !== true)
        {
            if (! is_string($format))
            {
                $format = 'Y-m-d H:i:s';
            }
            return date($format, $datetime);
        }
        
        $sys_datetime_date_format = Common::getConfigValue('sys_datetime_date_format');
        $sys_datetime_time_format = Common::getConfigValue('sys_datetime_time_format');
        $sys_datetime_pretty_format = Common::getConfigValue('sys_datetime_pretty_format');
        
        $format = $sys_datetime_date_format;
        if($showtime===true || $sys_datetime_time_format!=='0')
        {
            $format .= ' ' . ($sys_datetime_time_format === '12' ? 'h:i:s' : 'H:i:s');
        }
        
        if ($sys_datetime_pretty_format === '0')
        {
            return date($format, $datetime);
        }
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
        
        $timer = $datetime;
        
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
                return date($format, $timer);
            }
        }
        
        $free = $diff % 86400;
        if ($free <= 0)
        {
            return '刚刚';
        }
        
        $hour = floor($free / 3600);
        if ($hour > 0)
        {
            return $hour . "小时前";
        }
        
        $free = $free % 3600;
        if ($free <= 0)
        {
            return '刚刚';
        }
        
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
}