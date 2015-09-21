<?php
namespace yii\helpers;

use components\LuLu;

class Html extends \yii\helpers\BaseHtml
{
    public static function encode($content, $doubleEncode = true)
    {
        return $content;
        
        //return htmlspecialchars($content, ENT_QUOTES | ENT_SUBSTITUTE, Yii::$app ? Yii::$app->charset : 'UTF-8', $doubleEncode);
    }
    
    /**
     * Decodes special HTML entities back to the corresponding characters.
     * This is the opposite of [[encode()]].
     * @param string $content the content to be decoded
     * @return string the decoded content
     * @see encode()
     * @see http://www.php.net/manual/en/function.htmlspecialchars-decode.php
     */
    public static function decode($content)
    {
        return htmlspecialchars_decode($content, ENT_QUOTES);
    }
    
    public static function activeFileInput($model, $attribute, $options = [])
    {
        //return static::activeHiddenInput($model, $attribute, ['id' => null, 'value' => ''])
        //. static::activeInput('file', $model, $attribute, $options);
        
        // add a hidden field so that if a model only has a file field, we can
        // still use isset($_POST[$modelClass]) to detect if the input is submitted
        return static::activeHiddenInput($model, $attribute, ['id' => null])
        . static::activeInput('file', $model, $attribute, $options);
    }
}