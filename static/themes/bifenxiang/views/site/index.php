<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\core\widgets\ListView;
/* @var $this yii\web\View */
$this->title = '首页';


$themeUrl= Resource::getThemeUrl();



?>


        
        <div class="content-wrap">
  			<div class="content">
  			
  			 <?php foreach ($rows as $row):?>
            
            
            	<?php echo $this->render(Resource::getThemePath('/views/_inc/content_default'),['post'=>$row]);?>
                
			<?php endforeach;?>
			
			<?php echo $this->render(Resource::getThemePath('/views/_inc/pager'),['pager'=>$pager])?>
			
            </div>          
            

        </div>
        <aside class="sidebar">
          
            <div class="widget d_postlist">
                <div class="title"><h2>为您推荐</h2></div>
                <ul>
                	<?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc']);?>
               </ul>
            </div>
            <div class="widget d_postlist">
                <div class="title"><h2>热评文章</h2></div>
                <ul>
                	<?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'view_count desc']);?>
                </ul>
            </div>
            <div class="widget ds-widget-recent-visitors">
                <div class="title"><h2>最近访客</h2></div>
                <ul class="ds-recent-visitors" data-num-items="15" data-show-time="0" data-avatar-size="50">
                </ul>
            </div>
            <script>
                if (typeof DUOSHUO !== 'undefined')
                    DUOSHUO.RecentVisitors('.ds-recent-visitors');
            </script>
        </aside>
    
    

