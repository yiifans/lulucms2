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

class GridView extends \yii\grid\GridView
{
    public $dataColumnClass ='source\core\grid\DataColumn';
    public $pager = ['class'=>'source\core\widgets\AdminLinkPager'];
    
    public $options=['class'=>'dataTables_wrapper'];
    public $tableOptions = ['class' => 'da-table'];
    public $layout =  "{items}\n{pager}";
    
    public $filterRow;

    public function init()
    {
        parent::init();
        
        $this->rowOptions = function ($model, $key, $index, $grid)
        {
            if ($index % 2 === 0)
            {
                return ['class'=>'odd'];
            }
            else {
                return ['class'=>'even'];
            }
        };
    }

    public function renderTableRow($model, $key, $index)
    {
        if ($this->filterRow !== null && call_user_func($this->filterRow, $model, $key, $index, $this) === false)
        {
            return '';
        }
        return parent::renderTableRow($model, $key, $index);
    }
}