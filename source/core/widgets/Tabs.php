<?php
namespace source\core\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\Dropdown;

class Tabs extends \yii\bootstrap\Tabs implements IBaseWidget
{

    public function init()
    {
        parent::init();
        
        ob_start();
        ob_implicit_flush(false);
    }

    protected function renderItems()
    {
        $html = trim(ob_get_clean());
        
        if (! empty($html))
        {
            $html = "\n" . $html;
        }
        
        $headers = [];
        $panes = [];
        
        if (! $this->hasActiveTab() && ! empty($this->items))
        {
            $this->items[0]['active'] = true;
        }
        
        foreach ($this->items as $n => $item)
        {
            if (! isset($item['label']))
            {
                throw new InvalidConfigException("The 'label' option is required.");
            }
            $label = $this->encodeLabels ? Html::encode($item['label']) : $item['label'];
            $headerOptions = array_merge($this->headerOptions, ArrayHelper::getValue($item, 'headerOptions', []));
            $linkOptions = array_merge($this->linkOptions, ArrayHelper::getValue($item, 'linkOptions', []));
            
            if (isset($item['items']))
            {
                $label .= ' <b class="caret"></b>';
                Html::addCssClass($headerOptions, 'dropdown');
                
                if ($this->renderDropdown($item['items'], $panes))
                {
                    Html::addCssClass($headerOptions, 'active');
                }
                
                Html::addCssClass($linkOptions, 'dropdown-toggle');
                $linkOptions['data-toggle'] = 'dropdown';
                $header = Html::a($label, "#", $linkOptions) . "\n" . Dropdown::widget([
                    'items' => $item['items'], 
                    'clientOptions' => false, 
                    'view' => $this->getView()
                ]);
            }
            elseif (isset($item['content']))
            {
                $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
                $options['id'] = ArrayHelper::getValue($options, 'id', $this->options['id'] . '-tab' . $n);
                
                Html::addCssClass($options, 'tab-pane');
                if (ArrayHelper::remove($item, 'active'))
                {
                    Html::addCssClass($options, 'active');
                    Html::addCssClass($headerOptions, 'active');
                }
                $linkOptions['data-toggle'] = 'tab';
                $header = Html::a($label, '#' . $options['id'], $linkOptions);
                $panes[] = Html::tag('div', $item['content'], $options);
            }
            elseif (isset($item['contentId']))
            {
                $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
                $options['id'] = $item['contentId'];
                
                Html::addCssClass($options, 'tab-pane');
                if (ArrayHelper::remove($item, 'active'))
                {
                    Html::addCssClass($options, 'active');
                    Html::addCssClass($headerOptions, 'active');
                }
                $linkOptions['data-toggle'] = 'tab';
                $header = Html::a($label, '#' . $options['id'], $linkOptions);
                $panes[] = ''; // Html::tag('div', $item['content'], $options);
            }
            else
            {
                throw new InvalidConfigException("Either the 'content' or 'items' option must be set.");
            }
            
            $headers[] = Html::tag('li', $header, $headerOptions);
        }
        
        return Html::tag('ul', implode("\n", $headers), $this->options) . "\n" . Html::tag('div', implode("\n", $panes) . $html, [
            'class' => 'tab-content'
        ]);
    }
}
