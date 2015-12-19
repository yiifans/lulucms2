<?php
namespace source\core\widgets;

use yii\base\InvalidConfigException;

class LoopData extends BaseWidget
{

    public $dataSource;

    public $rowParam = 'row';

    public $item = 'item';

    public $itemsTag = '{items}';

    public $length = 0;

    public $params = [];

    public function init()
    {
        if ($this->dataSource === null)
        {
            throw new InvalidConfigException('TLoop::dataSource or tableName or catalogId must be set.');
        }
        ob_start();
        ob_implicit_flush(false);
    }

    public function run()
    {
        $container = trim(ob_get_clean());
        
        $ret = '';
        
        if (! empty($this->item))
        {   
            $count = count($this->dataSource);
            
            $index = - 1;
            $isFirst = false;
            $isLast = false;
            
            $this->params['count'] = $count;
            $this->params['length'] = $this->length;
            
            foreach ($this->dataSource as $id => $row)
            {
                $index += 1;
                
                $isFirst = $index === 0;
                $isLast = $index == ($count - 1);
               
                $this->params['id'] = $id;
                $this->params[$this->rowParam] = $row;
                $this->params['index'] = $index;
                $this->params['isFirst'] = $isFirst;
                $this->params['isLast'] = $isLast;
                
                $ret .= $this->render($this->item, $this->params);
            }
        }
        
        if (empty($container))
        {
            echo $ret;
        }
        else
        {
            echo str_replace($this->itemsTag, $ret, $container);
        }
    }
}
