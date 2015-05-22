<?php
namespace source\core\widgets;

use yii\base\InvalidConfigException;

class LoopData extends BaseWidget
{

    public $dataSource;

    public $item = 'item';

    public $header = null;

    public $footer = null;

    public $itemsTag = '{items}';

    public $itemsContainer = null;

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
        
        if ($this->itemsContainer !== null && empty($this->itemsContainer))
        {
            $container = $this->itemsContainer;
        }
        
        if ($this->header !== null)
        {
            echo $this->header;
        }
        
        $ret = '';
        
        if (! empty($this->item))
        {
            $itemTemplate = '';
            if (strpos($this->item, '@') === 0 || strpos($this->item, '/') === 0)
            {
                $itemTemplate = $this->item;
            }
            else
            {
                $itemTemplate = '@app/widgets/views/loop-data/' . $this->item;
            }
            if (! strpos($itemTemplate, '.php'))
            {
                $itemTemplate .= '.php';
            }
            $count = count($this->dataSource);
            
            $index = - 1;
            $isFirst = false;
            $isLast = false;
            
            $this->params['count'] = $count;
            $this->params['length'] = $this->length;
            
            foreach ($this->dataSource as $id => $row)
            {
                $index += 1;
                
                if ($index === 0)
                {
                    $isFirst = true;
                }
                else
                {
                    $isFirst = false;
                }
                if ($index == ($count - 1))
                {
                    $isLast = true;
                }
                else
                {
                    $isLast = false;
                }
                
                $this->params['id'] = $id;
                $this->params['row'] = $row;
                $this->params['index'] = $index;
                $this->params['isFirst'] = $isFirst;
                $this->params['isLast'] = $isLast;
                
                $ret .= $this->renderFile($itemTemplate, $this->params);
            }
        }
        
        if ($container == null || empty($container))
        {
            echo $ret;
        }
        else
        {
            echo str_replace($this->itemsTag, $ret, $container);
        }
        
        if ($this->footer !== null)
        {
            echo $this->footer;
        }
    }
}
