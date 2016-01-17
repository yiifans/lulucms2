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

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

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
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider source\core\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<?= "<?php " ?> $this->toolbars([
    Html::a('新建', ['create'], ['class' => 'btn btn-xs btn-primary mod-site-save'])
]);<?= "?> " ?>


<?= "<?= " ?>GridView::widget([
    'dataProvider' => $dataProvider,
    <?= "'columns' => [\n"; ?>
        ['class' => 'source\core\grid\IdColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>

        [
            'class' => 'source\core\grid\ActionColumn',
            //'template'=>'{data}{add-data}{update} {delete}',
            //'buttons' =>[
            //    'data'=>function ($url, $model, $key, $index, $gridView)
            //    {
            //        return Html::a('<img src="'.Resource::getAdminUrl().'/images/icons/color/magnifier.png">', $url, [
            //            'title' => '查看内容', 
            //        ]);
            //    },
            //    'add-data'=>function ($url, $model, $key, $index, $gridView)
            //    {
            //        return Html::a('<img src="'.Resource::getAdminUrl().'/images/icons/color/magnifier.png">', $url, [
            //            'title' => '添加内容', 
            //        ]);
            //    }
            //]
        ],            
    ],
]); ?>



