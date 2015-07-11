<?php
namespace source\core\widgets;

use yii\base\Widget;
use yii\web\View;

class Calendar extends BaseWidget
{

    public $params = [];

    public $defaultParams = [];

    public $viewFile;

    public function init()
    {
    }

    public function run()
    {
        $view = $this->getView();
        
        return $view->render("@app/views/base/calendar", $this->params);
    }
}