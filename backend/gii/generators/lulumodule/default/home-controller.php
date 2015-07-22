<?php
/**
 * This is the template for generating a controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\module\Generator */

echo "<?php\n";
?>

namespace source\modules\<?= $generator->moduleDir?>\home\controllers;

use source\LuLu;

class DefaultController extends \source\core\front\FrontController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
