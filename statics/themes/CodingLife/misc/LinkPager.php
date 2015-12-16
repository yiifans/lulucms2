<?php
namespace statics\themes\CodingLife\misc;

use Yii;
use yii\helpers\Html;

class LinkPager extends \source\core\widgets\LinkPager
{

    public function init()
    {
        parent::init();
       
        $this->options=['id'=>'pagenavi'];
        $this->linkOptions=['class'=>'page-numbers'];
        
        $this->activePageCssClass='current';
        
        $this->options['class']='topicListFooter';
    }

    protected function renderPageButtons()
    {
        $buttons = $this->getButtonItems();
        if ($buttons === '')
        {
            return '';
        }
        
        return Html::tag('div', '<div class="pager">'. implode("\n", $buttons).'</div>', $this->options);
    }
    
    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => $class === '' ? null : $class];
       
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);
            return Html::tag('span', $label, $options);
        }
        else 
        {
            $linkOptions = $this->linkOptions;
            $linkOptions['data-page'] = $page;
            if ($active) {
                Html::addCssClass($linkOptions, $this->activePageCssClass);
                //Html::addCssClass($linkOptions, $this->disabledPageCssClass);
            }
            return Html::a($label, $this->pagination->createUrl($page), $linkOptions);
        }
        
    }
}
