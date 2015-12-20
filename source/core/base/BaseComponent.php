<?php
namespace source\core\base;

use yii\base\Component;
use source\traits\CommonTrait;

/**
 *
 * @property \source\modules\modularity\ModularityService $modularityService 
 * @property \source\modules\rbac\RbacService $rbacService 
 * @property \source\modules\taxonomy\TaxonomyService $taxonomyService
 * @property \source\modules\menu\MenuService $menuService 
 *
 */
class BaseComponent extends Component
{
    use CommonTrait;
    
    public function init()
    {
        parent::init();
    }
}
