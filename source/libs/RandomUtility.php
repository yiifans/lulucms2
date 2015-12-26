<?php
namespace source\libs;

use lulu\helpers;
use lulu\LuLu;

class RandomUtility
{
    public static function getString($minLength,$maxLength=0)
    {
        if($minLength<0)
        {
            $minLength=0;
        }
        if($maxLength===0)
        {
            $maxLength=$minLength;
        }
        if ($minLength > $maxLength)
        {
            $maxLength = $minLength;
        }
       
        $length = mt_rand($minLength, $maxLength);
     
        $letters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjklmnpqrstuvwxyz123456789';
        $lettersLength = strlen($letters)-1;
      
        $code = '';
        for ($i = 0; $i < $length; ++ $i)
        {
           $code .= $letters[mt_rand(0, $lettersLength)];
        }
        
        return $code;
    }
    
    
    public static function encrypt($str) {
        $key=LuLu::getAppParam('key');
        $iv=LuLu::getAppParam('iv');
        
        $key = substr($key,0,16);
        $iv = substr($iv,0,16);
        
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128,md5($key),$str,MCRYPT_MODE_CFB,$iv));
    }
    public static function decrypt($str) {
        $key=LuLu::getAppParam('key');
        $iv=LuLu::getAppParam('iv');
        
        $key = substr($key,0,16);
        $iv = substr($iv,0,16);
        
        //return '';
        $message=base64_decode($str);
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128,md5($key),$str,MCRYPT_MODE_CFB,$iv);
    }
}
