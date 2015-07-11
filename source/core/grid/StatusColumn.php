<?php
namespace source\core\grid;

class StatusColumn extends DataColumn
{

    public $attribute = 'statusText';
    public $headerOptions=['width'=>'60px'];

    public function init()
    {
        parent::init();
    }
}