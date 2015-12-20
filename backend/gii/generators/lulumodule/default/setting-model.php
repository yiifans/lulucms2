<?php
/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */
echo "<?php\n";
?>

namespace source\modules\<?= $generator->moduleDir?>\models;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\libs\Common;
use source\libs\Constants;

class Setting extends \source\models\ConfigForm
{

	public $test1;
	public $test2;
	
    public function rules()
    {
        return [
            [['test1', 'test2'], 'required'],
            [['test1', 'test2'], 'string', 'max'=>64],
        ];
    }

    public function attributeLabels()
    {
        return self::getAttributeLabels();
    }
    
    public static function getAttributeLabels($attribute = null)
    {
        $items = [
            'test1' => 'test1 label',
            'test2' => 'test2 label',
        ];
        return ArrayHelper::getItems($items,$attribute);
    }   
}
