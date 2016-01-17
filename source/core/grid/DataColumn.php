<?php
namespace source\core\grid;

class DataColumn extends \yii\grid\DataColumn
{

    public $headerOptions = [];

    public $width = '60px';

    public function init()
    {
        parent::init();
        
        if (! isset($this->headerOptions['width']))
        {
            $this->headerOptions['width'] = $this->width;
        }
        $this->contentOptions=['style'=>'word-wrap: break-word; word-break: break-all;'];
    }
}