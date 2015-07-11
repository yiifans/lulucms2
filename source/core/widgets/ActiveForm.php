<?php
namespace source\core\widgets;

use Yii;

class ActiveForm extends \yii\widgets\ActiveForm implements IBaseWidget
{

    public $options = [
        'class' => 'da-form'
    ];

    public $fieldClass = 'source\core\widgets\ActiveField';

    public function defaultButtons()
    {
        echo '<div class="da-button-row">
                <input type="reset" value="重置" class="da-button gray left">
                <input type="submit" value="保存" class="da-button green left" style="margin-left:80px;">
            </div>';
    }
}
