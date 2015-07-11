<?php
namespace source\core\modularity;

use yii\base\Object;

class ModuleInfo extends Object
{

    public $id;

    public $name;

    public $version;

    public $description;

    public $url;

    public $author;

    public $author_url;

    public $is_system = false;

    public $is_content;

    public function install()
    {
    }

    public function uninstall()
    {
    }

    public function upgrader()
    {
    }

    public function activeAdmin()
    {
    }

    public function deactiveAdmin()
    {
    }

    public function activeHome()
    {
    }

    public function deactiveHome()
    {
    }
}
