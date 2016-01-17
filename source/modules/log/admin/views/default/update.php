<?php

use yii\helpers\Inflector;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
use yii\helpers\ArrayHelper;
use source\LuLu;
use source\core\grid\GridView;
use source\libs\Common;
use source\libs\Constants;
use source\libs\Resource;

/* @var $this source\core\back\BackView */
/* @var $model source\modules\log\models\Log */

$this->title = 'Update Log: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
