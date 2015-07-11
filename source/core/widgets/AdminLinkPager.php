<?php
namespace source\core\widgets;

use Yii;
use yii\helpers\Html;

class AdminLinkPager extends \yii\widgets\LinkPager implements IBaseWidget
{
    
    public function init()
    {
        parent::init();
        
        $this->options=['class'=>'dataTables_paginate paging_full_numbers'];
        $this->linkOptions=['class'=>'paginate_button'];
        
        $this->activePageCssClass='paginate_active';
        $this->disabledPageCssClass='paginate_button_disabled';
        
        $this->firstPageLabel='首页';
        $this->prevPageLabel = '上一页';
        $this->nextPageLabel = '下一页';
        $this->lastPageLabel='尾页';
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
    
    protected function getButtonItems()
    {
        $pageCount = $this->pagination->getPageCount();
        if ($pageCount < 2 && $this->hideOnSinglePage)
        {
            return '';
        }
        
        $buttons = [];
        $currentPage = $this->pagination->getPage();
        
        // first page
        if ($this->firstPageLabel !== false)
        {
            $buttons[] = $this->renderPageButton($this->firstPageLabel, 0, $this->firstPageCssClass, $currentPage <= 0, false);
        }
        
        // prev page
        if ($this->prevPageLabel !== false)
        {
            if (($page = $currentPage - 1) < 0)
            {
                $page = 0;
            }
            $buttons[] = $this->renderPageButton($this->prevPageLabel, $page, $this->prevPageCssClass, $currentPage <= 0, false);
        }
        
        // internal pages
        list($beginPage, $endPage) = $this->getPageRange();
        for ($i = $beginPage; $i <= $endPage; ++ $i)
        {
            $buttons[] = $this->renderPageButton($i + 1, $i, null, false, $i == $currentPage);
        }
        
        // next page
        if ($this->nextPageLabel !== false)
        {
            if (($page = $currentPage + 1) >= $pageCount - 1)
            {
                $page = $pageCount - 1;
            }
            $buttons[] = $this->renderPageButton($this->nextPageLabel, $page, $this->nextPageCssClass, $currentPage >= $pageCount - 1, false);
        }
        
        // last page
        if ($this->lastPageLabel !== false)
        {
            $buttons[] = $this->renderPageButton($this->lastPageLabel, $pageCount - 1, $this->lastPageCssClass, $currentPage >= $pageCount - 1, false);
        }
        
        return $buttons;
    }
}
