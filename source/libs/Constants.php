<?php
namespace source\libs;

use yii\helpers\ArrayHelper;
/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class Constants
{

    const TabSize = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

    public static function getSortNum()
    {
        return time();
    }

    const YesNo_Yes = 1;
    const YesNo_No = 0;
    public static function getYesNoItems($key = null)
    {
        $items = [
            self::YesNo_Yes => '是', 
            self::YesNo_No => '否'
        ];
        return ArrayHelper::getItems($items, $key);
    }

    const Status_Enable = 1;
    const Status_Desable = 0;
    public static function getStatusItems($key = null)
    {
        $items = [
            self::Status_Enable => '可用', 
            self::Status_Desable => '禁用'
        ];
        return ArrayHelper::getItems($items, $key);
    }

    const Target_Self = '_self';
    const Target_blank = '_blank';
    public static function getTargetItems($key = null)
    {
        $items = [
            self::Target_Self => '当前窗口', 
            self::Target_blank => '新窗口'
        ];
        return ArrayHelper::getItems($items, $key);
    }

    const Visibility_Public = '1';
    const Visibility_Hidden = '2';
    const Visibility_Password = '3';
    const Visibility_Private = '4';
    public static function getVisibilityItems($key = null)
    {
        $items = [
            self::Visibility_Public => '公开', 
            self::Visibility_Hidden => '回复可见', 
            self::Visibility_Password => '密码保护', 
            self::Visibility_Private => '私有'
        ];
        return ArrayHelper::getItems($items, $key);
    }

    const Status_Publish = '1';
    const Status_Draft = '2';
    const Status_Pending = '3';
    public static function getStatusItemsForContent($key = null)
    {
        $items = [
            self::Status_Publish => '发布', 
            self::Status_Draft => '草稿', 
            self::Status_Pending => '等待审核'
        ];
        return ArrayHelper::getItems($items, $key);
    }

    public static function getRecommendItems($key = null)
    {
        $items = [
            // 0 => '无',
            1 => '一级推荐', 
            2 => '二级推荐', 
            3 => '三级推荐', 
            4 => '四级推荐', 
            5 => '五级推荐', 
            6 => '六级推荐', 
            7 => '七级推荐', 
            8 => '八级推荐', 
            9 => '九级推荐'
        ];
        return ArrayHelper::getItems($items, $key);
    }

    public static function getHeadlineItems($key = null)
    {
        $items = [
            // 0 => '无',
            1 => '一级头条', 
            2 => '二级头条', 
            3 => '三级头条', 
            4 => '四级头条', 
            5 => '五级头条', 
            6 => '六级头条', 
            7 => '七级头条', 
            8 => '八级头条', 
            9 => '九级头条'
        ];
        return ArrayHelper::getItems($items, $key);
    }

    public static function getStickyItems($key = null)
    {
        $items = [
            // 0 => '无',
            1 => '一级置顶', 
            2 => '二级置顶', 
            3 => '三级置顶', 
            4 => '四级置顶', 
            5 => '五级置顶', 
            6 => '六级置顶', 
            7 => '七级置顶', 
            8 => '八级置顶', 
            9 => '九级置顶'
        ];
        
        return ArrayHelper::getItems($items, $key);
    }

}
