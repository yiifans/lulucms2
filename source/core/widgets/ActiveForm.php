<?php
namespace source\core\widgets;

use Yii;
use source\core\base\IBaseWidget;

class ActiveForm extends \yii\widgets\ActiveForm implements IBaseWidget
{

    public $fieldClass = 'source\core\widgets\ActiveField';
    
}
