<?php
namespace source\core\grid;

class TextIdColumn extends DataColumn
{
    public $attribute='id';
    public $headerOptions=['width'=>'60px'];

    public function init()
    {
        parent::init();
    }
}