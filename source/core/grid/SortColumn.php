<?php
namespace source\core\grid;

class SortColumn extends DataColumn
{

    public $attribute = 'sort_num';
    public $headerOptions=['width'=>'25px'];

    public function init()
    {
        parent::init();
        
        //$this->contentOptions=['class'=>'align-center'];
    }
}