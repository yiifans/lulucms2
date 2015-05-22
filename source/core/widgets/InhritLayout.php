<?php
namespace components\widgets;

use yii\base\InvalidConfigException;

class InhritLayout extends BaseWidget
{

    public $viewFile;

    public $params = [];

    public $blocks = [];

    public function init()
    {
        if ($this->viewFile === null)
        {
            throw new InvalidConfigException('InhritLayout::viewFile must be set.');
        }
        ob_start();
        ob_implicit_flush(false);
    }

    public function run()
    {
        $params = $this->params;
        if (! isset($params['content']))
        {
            $params['content'] = ob_get_clean();
        }
        
        if (count($this->blocks) > 0)
        {
            foreach ($this->blocks as $id)
            {
                if (in_array($id, $this->view->blocks))
                {
                    $params[$id] = $this->view->blocks[$id];
                    unset($this->view->blocks[$id]);
                }
            }
        }
        else
        {
            foreach ($this->view->blocks as $id => $block)
            {
                $params[$id] = $block;
                unset($this->view->blocks[$id]);
            }
        }
        
        echo $this->view->renderFile($this->viewFile, $params);
    }
}
