<?php
namespace source\modules\taxonomy;

use source\LuLu;
use source\core\modularity\ModuleService;
use source\core\modularity\ModuleInfo;
use source\modules\modularity\models\Modularity;
use yii\helpers\FileHelper;
use source\modules\taxonomy\models\Taxonomy;
use source\helpers\ArrayHelper;
use source\modules\taxonomy\models;

class TaxonomyService extends ModuleService
{

    public function getServiceId()
    {
        return 'taxonomyService';
    }

    public function getTaxonomiesAsTree($category)
    {
        return Taxonomy::getArrayTree($category);
    }
   
    public function getTaxonomyById($id,$default=true)
    {
        $taxonomyModel = Taxonomy::getTaxonomyById($id);
        if($taxonomyModel===null&&$default===true)
        {
            $taxonomyModel= new Taxonomy();
            $taxonomyModel->id=-1;
            $taxonomyModel->name='所有';
        }
        return $taxonomyModel;
    }
    public function getClass($model)
    {
        $items = [
            'Taxonomy'=>Taxonomy::className(),
        ];
        return ArrayHelper::getItems($items,$model,true);
    }
}
