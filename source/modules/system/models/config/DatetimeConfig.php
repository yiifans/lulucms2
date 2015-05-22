<?php

namespace source\modules\system\models\config;

use Yii;
use source\core\base\BaseModel;
use source\models\Config;
use source\models\ConfigForm;

class DatetimeConfig extends ConfigForm
{

    public static function getTimezoneItems($v = null)
    {
        $ret = [
            'Etc/GMT+12' => '(GMT - 12:00 小时) 安尼威托克岛，卡瓦加兰', 
            'Etc/GMT+11' => '(GMT - 11:00 小时) 中途岛，萨摩亚', 
            'Etc/GMT+10' => '(GMT - 10:00 小时) 夏威夷', 
            'Etc/GMT+9' => '(GMT - 9:00 小时) 阿拉斯加', 
            'Etc/GMT+8' => '(GMT - 8:00 小时) 太平洋时间', 
            'Etc/GMT+7' => '(GMT - 7:00 小时) 美国山区时间', 
            'Etc/GMT+6' => '(GMT - 6:00 小时) 美国中部时间，墨西哥市', 
            'Etc/GMT+5' => '(GMT - 5:00 小时) 美国东部时间，波哥大，利马', 
            'Etc/GMT+4' => '(GMT - 4:00 小时) 大西洋时间（加拿大），加拉加斯，拉巴斯', 
            'Canada/Newfoundland' => '(GMT - 3:30 小时) 纽芬兰', 
            'Etc/GMT+3' => '(GMT - 3:00 小时) 巴西，布宜诺斯艾利斯，福克兰群岛', 
            'Etc/GMT+2' => '(GMT - 2:00 小时) 大西洋中部，亚森欣，圣赫勒拿岛', 
            'Etc/GMT+1' => '(GMT - 1:00 小时) 亚速群岛，佛得角群岛', 
            'Etc/GMT' => '(GMT) 卡萨布兰卡，都柏林，伦敦，里斯本，蒙罗维亚', 
            'Etc/GMT-1' => '(GMT + 1:00 小时) 布鲁塞尔，哥本哈根，马德里，巴黎', 
            'Etc/GMT-2' => '(GMT + 2:00 小时) 加里宁格勒，南非', 
            'Etc/GMT-3' => '(GMT + 3:00 小时) 巴格达，利雅德，莫斯科，奈洛比', 
            'Iran' => '(GMT + 3:30 小时) 德黑兰', 
            'Etc/GMT-4' => '(GMT + 4:00 小时) 阿布达比，巴库，马斯喀特，第比利斯', 
            'Asia/Kabul' => '(GMT + 4:30 小时) 喀布尔', 
            'Etc/GMT-5' => '(GMT + 5:00 小时) 凯萨琳堡，克拉嗤，塔什干', 
            'Asia/Kolkata' => '(GMT + 5:30 小时) 孟买，加尔各答，马德拉斯，新德里', 
            'Etc/GMT-6' => '(GMT + 6:00 小时) 阿拉木图，科隆巴，达卡', 
            'Etc/GMT-7' => '(GMT + 7:00 小时) 曼谷，河内，雅加达', 
            'Etc/GMT-8' => '(GMT + 8:00 小时) 北京，香港，澳洲伯斯，新加坡，台北', 
            'Etc/GMT-9' => '(GMT + 9:00 小时) 大阪，札幌，首尔，东京，亚库次克', 
            'Etc/GMT-10' => '(GMT + 10:00 小时) 墨尔本，巴布亚新几内亚，雪梨', 
            'Etc/GMT-11' => '(GMT + 11:00 小时) 马加丹，新喀里多尼亚，所罗门群岛', 
            'Etc/GMT-12' => '(GMT + 12:00 小时) 新西兰，斐济，马绍尔群岛', 
            'Etc/GMT-13' => '(GMT + 13:00 小时) 堪察加半岛，阿那底河',
            'Etc/GMT-14' => '(GMT + 14:00 小时) 圣诞岛'];
        
        if($v!=null)
        {
            if(isset($ret[$v]))
            {
                return $ret[$v];
            }
            return 'unknown timezone:'.$v;
        }
        return $ret;
    }
  
	public $sys_datetime_timezone;
	public $sys_datetime_date_format='yyyy-mm-dd';
	public $sys_datetime_time_format;
	public $sys_datetime_pretty_format='1';
	
	
    public function rules()
    {
        return [
            [['sys_datetime_timezone', 'sys_datetime_date_format', 'sys_datetime_time_format'], 'string'],
			[['sys_datetime_pretty_format'],'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sys_datetime_timezone' => '时区',
            'sys_datetime_date_format' => '日期格式',
            'sys_datetime_time_format' => '时间格式',
            'sys_datetime_pretty_format' => '人性化时间格式',
        ];
    }
}
