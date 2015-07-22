<?php
namespace source\core\widgets;

use Yii;
use yii\helpers\Html;

class AdminLinkPager extends LinkPager
{
    
    public function init()
    {
        parent::init();
        
        $this->options=['class'=>'dataTables_paginate paging_full_numbers'];
        $this->linkOptions=['class'=>'paginate_button'];
        
        $this->activePageCssClass='paginate_active';
        $this->disabledPageCssClass='paginate_button_disabled';
    }

    protected function renderPageButtons()
    {
        $buttons = $this->getButtonItems();
        if ($buttons === '')
        {
            return '';
        }
        
        return Html::tag('div', implode("\n", $buttons), $this->options);
    }

    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;
        
        if($class!=='')
        {
            Html::addCssClass($linkOptions, $class);
        }
        if ($disabled) {
            Html::addCssClass($linkOptions, $this->disabledPageCssClass);
            return Html::tag('a', $label,$linkOptions);
        }
        if ($active) {
            Html::addCssClass($linkOptions, $this->activePageCssClass);
        }
        return Html::a($label, $this->pagination->createUrl($page), $linkOptions);
    }
    
}
