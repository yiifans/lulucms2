<?php

namespace source\modules\log;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;
use source\libs\Utility;

class DbTarget extends \yii\log\DbTarget
{
    public function getMessagePrefix($message)
    {
        if ($this->prefix !== null) {
            return call_user_func($this->prefix, $message);
        }
    
        $ip = Utility::getIp();
    
        $userID = LuLu::getIdentity()->username;
        if(empty($userID))
        {
            return "[$ip]";
        }
        else 
        {
            return "[$ip]<br/>[$userID]";
        }
      
        
    }
   
}
