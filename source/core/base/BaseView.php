<?php
namespace source\core\base;

use Yii;
use app\Models\User;
use source\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\ActiveRecord;
use yii\base\Model;
use yii\web\View;
use source\models\Config;
use source\libs\Common;

class BaseView extends View
{

    public function renderFile($viewFile, $params = [], $context = null)
    {
        if ($this->theme == null)
        {
            $this->setTheme();
        }
        return parent::renderFile($viewFile, $params, $context);
    }

    public function setTheme()
    {
    }
	
	public function addBreadcrumbs($items)
	{
		foreach ($items as $item)
		{
			if(is_array($item))
			{
				if(isset($item[2]))
				{
					$this->params['breadcrumbs'][] = ['label' => $item[0], 'url' => $item[1], 'img'=>$item[2]];
				}
				else
				{
					$this->params['breadcrumbs'][] = ['label' => $item[0], 'url' => $item[1]];
				}
			}
			else
			{
				$this->params['breadcrumbs'][] = $item;
			}
		}
	}

    public function getConfig($id)
    {
        return Common::getConfig($id);
    }

    public function getConfigValue($id)
    {
        return Common::getConfigValue($id);
    }
}
