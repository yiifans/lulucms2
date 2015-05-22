<?php

use yii\helpers\Html;
use yii\grid\GridView;
use source\models\Takonomy;
use source\models\Content;
use yii\helpers\Url;
use source\libs\Resource;
use source\helpers\TimeHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model['title'];


$takonomies = Takonomy::getArrayTree($this->getConfigValue('post_takonomy'));
?>



       <div class="content-wrap">
            <div class="content">

                <header class="article-header">
                    <h1 class="article-title"><?php echo $model['title']?></h1>
                    <div class="meta">
                        <span id="mute-category" class="muted"><i class="fa fa-list-alt"></i><a href=""> 搞笑</a></span>				<span class="muted"><i class="fa fa-user"></i> <a href="">LuLu Blog</a></span>
                        <time class="muted"><i class="fa fa-clock-o"></i> <?php echo TimeHelper::formatTime($model['created_at']) ?></time>
                        <span class="muted"><i class="fa fa-eye"></i> <?php echo $model['view_count']?>℃</span>
                        <span class="muted"><i class="fa fa-comments-o"></i> <a href=""><?php echo $model['comment_count']?>评论</a></span>
                        
                    </div>
                </header>
                <article class="article-content">
                	<?php echo $model['body_body'] ?>
                </article>
               <div class="line"></div>
                <div class="related_top">
                    <div class="related_posts">
                        <div class="related_img">
                            <ul>
                                <?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc','item'=>'item_related','limit'=>4]);?>   
                            </ul>
                        </div>
                        <div class="relates">
                            <ul>
                                
			                 	<?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc','item'=>'item','limit'=>6]);?>                          
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="comment-ad" class="banner banner-related">

                </div>
                <a name="comments"></a>

                <div class="ds-thread" data-thread-key="3975" data-author-key="1" data-title="他居然用自己的内裤来走私鸟" data-url="http://bb178.com/2015/3975.html"></div>


            </div>
        </div>
        <aside class="sidebar">
           
            <div class="widget d_postlist">
            	<div class="title"><h2>分类</h2></div>
            	<ul>
            		<li><?php echo Html::a('所有',['/post'])?></li>
            		<?php foreach ($takonomies as $takonomy):?>
            		<li><?php echo Html::a($takonomy['name'],['/post','takonomy'=>$takonomy['id']])?></li>
            		<?php endforeach;?>
            	</ul>
            	
            </div>
            <div class="widget d_postlist">
                <div class="title"><h2>为您推荐</h2></div>
                <ul>
                    <?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc']);?>
               </ul>
            </div>
            <div class="widget d_postlist">
                <div class="title"><h2>热评文章</h2></div>
                <ul>
                    <?php echo $this->render(Resource::getThemePath('/views/_inc/content_list'),['orderBy'=>'created_at desc']);?>
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

    

