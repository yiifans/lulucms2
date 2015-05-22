<?php
use yii\web\View;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'My Yii Application';



?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
            	<ul>
            	<?php foreach ($posts as $post):?>
            		<li><?php echo Html::a($post['title'],['/post/detail','id'=>$post['id']])?> </li>
            	<?php endforeach;?>
            	</ul>
            </div>

            <div class="col-lg-4">
                <h2>热门文章</h2>
            	<ul>
            	<?php foreach ($posts as $post):?>
            		<li><?php echo $post['title'];?></li>
            	<?php endforeach;?>
            	</ul>
                <h2>最新文章</h2>
            	<ul>
            	<?php foreach ($posts as $post):?>
            		<li><?php echo $post['title'];?></li>
            	<?php endforeach;?>
            	</ul>            	
            </div>
        </div>

    </div>
</div>
