<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\models\Takonomy;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contents';
$this->params['breadcrumbs'][] = $this->title;

$takonomies = Takonomy::getArrayTree('post');

?>
<div class="content-index">

			<div class="row">
            <div class="col-lg-8">
            	<ul>
            	<?php foreach ($rows as $row):?>
            		<li><?php echo Html::a($row['title'],['/post/detail','id'=>$row['id']])?> </li>
            	<?php endforeach;?>
            	</ul>
            </div>

            <div class="col-lg-4">
                <h2>分类</h2>
            	<ul>
            		<li><?php echo Html::a('所有',['/post'])?></li>
            	<?php foreach ($takonomies as $takonomy):?>
            		<li><?php echo Html::a($takonomy['name'],['/post','takonomy'=>$takonomy['id']])?></li>
            	<?php endforeach;?>
            	</ul>
                        	
            </div>
        </div>
    
</div>
