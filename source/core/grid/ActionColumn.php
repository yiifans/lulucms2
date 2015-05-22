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
class ActionColumn extends \yii\grid\ActionColumn
{

    public $queryParams = [];

    public function init()
    {
        parent::init();
        $this->headerOptions['width'] = '120px';
        
        $this->template = '{update} {delete}';
    }

    protected function initDefaultButtons()
    {
        if (! isset($this->buttons['view']))
        {
            $this->buttons['view'] = function ($url, $model, $key, $index, $this)
            {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                    'title' => Yii::t('yii', 'View'), 
                    'data-pjax' => '0'
                ]);
            };
        }
        if (! isset($this->buttons['update']))
        {
            $this->buttons['update'] = function ($url, $model, $key, $index, $this)
            {
                return Html::a('<span class="icon icon-edit md-tip"></span>', $url, [
                    'title' => Yii::t('yii', 'Update'), 
                    'data-pjax' => '0'
                ]);
            };
        }
        if (! isset($this->buttons['delete']))
        {
            $this->buttons['delete'] = function ($url, $model, $key, $index, $this)
            {
                return Html::a('<span class="icon icon-trash md-tip"></span>', $url, [
                    'title' => Yii::t('yii', 'Delete'), 
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'), 
                    'data-method' => 'post', 
                    'data-pjax' => '0'
                ]);
            };
        }
    }

    public function createUrl($action, $model, $key, $index)
    {
        if ($this->urlCreator instanceof Closure)
        {
            return call_user_func($this->urlCreator, $action, $model, $key, $index);
        }
        else
        {
            $params = is_array($key) ? $key : [
                'id' => (string) $key
            ];
            if (isset($this->queryParams[$action]))
            {
                $params = array_merge($params, $this->queryParams[$action]);
            }
            
            $params[0] = $this->controller ? $this->controller . '/' . $action : $action;
            
            return Url::toRoute($params);
        }
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        if ($this->content !== null)
        {
            return call_user_func($this->content, $model, $key, $index, $this);
        }
        
        return preg_replace_callback('/\\{([\w\-\/]+)\\}/', function ($matches) use($model, $key, $index)
        {
            $name = $matches[1];
            if (isset($this->buttons[$name]))
            {
                $url = $this->createUrl($name, $model, $key, $index);
                
                return call_user_func($this->buttons[$name], $url, $model, $key, $index, $this);
            }
            else
            {
                return '';
            }
        }, $this->template);
    }
}