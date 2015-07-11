<?php
namespace source\core\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ListView extends \yii\widgets\ListView implements IBaseWidget
{

    public $itemViewSelector;

    public function init()
    {
        parent::init();
        $this->pager['class'] = LinkPager::className();
    }

    public function getItemView($model, $key, $index)
    {
        if ($this->itemViewSelector === null || empty($this->itemViewSelector))
        {
            return $this->itemView;
        }
        if (is_string($this->itemViewSelector))
        {
            return $this->itemView;
        }
        else if (is_array($this->itemViewSelector))
        {
            $count = count($this->itemViewSelector);
            $i = $index % $count;
            return $this->itemViewSelector[$i];
        }
        else
        {
            return call_user_func($this->itemViewSelector, $model, $key, $index, $this);
        }
    }

    public function renderItem($model, $key, $index)
    {
        $itemView = $this->getItemView($model, $key, $index);
        
        if ($itemView === null)
        {
            $content = $key;
        }
        elseif (is_string($itemView))
        {
            $content = $this->getView()->render($itemView, array_merge([
                'model' => $model, 
                'key' => $key, 
                'index' => $index, 
                'widget' => $this
            ], $this->viewParams));
        }
        else
        {
            $content = call_user_func($itemView, $model, $key, $index, $this);
        }
        $options = $this->itemOptions;
        $tag = ArrayHelper::remove($options, 'tag', 'div');
        if ($tag !== false)
        {
            $options['data-key'] = is_array($key) ? json_encode($key, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : (string) $key;
            
            return Html::tag($tag, $content, $options);
        }
        else
        {
            return $content;
        }
    }
}
