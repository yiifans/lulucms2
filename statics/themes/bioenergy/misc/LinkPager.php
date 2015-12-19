<?php
namespace statics\themes\bioenergy\misc;

use Yii;
use yii\helpers\Html;

class LinkPager extends \source\core\widgets\LinkPager
{

    public function init()
    {
        parent::init();
       
        $this->options=['class'=>'pagination pagination__posts'];
        $this->linkOptions=['class'=>'page-numbers'];
        
        
        
    }

    protected function renderPageButtons()
    {
        $buttons = $this->getButtonItems();
        if ($buttons === '')
        {
            return '';
        }
        
        return Html::tag('div', '<ul>'. implode("\n", $buttons).'</ul>', $this->options);
    }
    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => $class === '' ? null : $class];
        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);

            return '';
            return Html::tag('li', Html::tag('span', $label), $options);
        }
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;

        return Html::tag('li', Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
    }
}
