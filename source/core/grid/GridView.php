<?php
namespace source\core\grid;

use Yii;
use yii\base\Component;
use yii\base\ErrorHandler;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\Model;
use yii\web\JsExpression;
use yii\helpers\Url;

/**
 * ActiveField represents a form input field within an [[ActiveForm]].
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class GridView extends \yii\grid\GridView
{
    public $dataColumnClass ='source\core\grid\DataColumn';
    
    public $tableOptions = ['class' => 'da-table'];
    public $layout =  "{items}\n{pager}";
    
    public function init()
    {
        parent::init();
        
        $this->rowOptions = function ($model, $key, $index, $grid)
        {
            if($index%2===0)
            {
                return ['class'=>'odd'];
            }
            else {
                return ['class'=>'even'];
            }
        };
    }
}