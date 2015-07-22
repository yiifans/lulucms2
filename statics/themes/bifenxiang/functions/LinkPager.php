<?php
namespace statics\themes\bifenxiang\functions;

use Yii;
use yii\helpers\Html;

class LinkPager extends \source\core\widgets\LinkPager
{
    protected function renderPageButtons()
    {
        $buttons = $this->getButtonItems();
        if ($buttons === '')
        {
            return '';
        }
        
        return Html::tag('div', '<ul>' . implode("\n", $buttons) . '</ul>', $this->options);
    }
}
