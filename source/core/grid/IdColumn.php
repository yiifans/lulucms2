<?php
namespace source\core\grid;

class IdColumn extends DataColumn
{
    public $attribute='id';
    public $headerOptions=['width'=>'25px'];

    public function init()
    {
        parent::init();
    }
}