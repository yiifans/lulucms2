<?php
namespace source\core\grid;

class SortColumn extends DataColumn
{

    public $attribute = 'sort_num';
    public $headerOptions=['width'=>'60px'];

    public function init()
    {
        parent::init();
    }
}