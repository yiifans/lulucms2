<?php

namespace source\libs;

use common\models\ContentFlag;
use yii\web\UploadedFile;
use components\LuLu;
use components\helpers\TFileHelper;
use common\models\config\Config;
use yii\base\InvalidParamException;
use common\models\Channel;

class Utility
{
    public static function isTrue($obj,$compareTo=null)
    {
        if($obj===null)
        {
            return false;
        }
        if($obj===true || is_string($obj) && strtolower($obj)==='true'||$obj===1||$obj==='1'||$obj===$compareTo)
        {
            return true;
        }
        return false;
    }

    
	
}
