<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use source\models\Takonomy;
use app\modules\rbac\models\Category;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'LuLu Blog',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => '首页', 'url' => ['/admin']],
            		['label' => '系统设置', 
            			'items' => [
            		        ['label' => '基本设置', 'url' => ['config/basic']],
            				['label' => '主题设置', 'url' => ['config/theme']],
            		        ['label' => '文章设置', 'url' => '#'],
            				['label' => '评论设置', 'url' => '#'],
            			],
					],
            		['label' => '文章',
	            		'items' => [
		            		['label' => '新建', 'url' => ['content/create','type'=>'post']],
            				['label' => '所有文章', 'url' => ['content/index','type'=>'post']],
		            		['label' => '文章分类', 'url' => ['takonomy/index','type'=>Takonomy::TYPE_POST]],
	            		],
            		],
            		['label' => '页面',
	            		'items' => [
		            		['label' => '新建', 'url' => ['content/create','type'=>'page']],
		            		['label' => '所有页面', 'url' => ['content/index','type'=>'page']],
		            		['label' => '页面分类', 'url' => ['takonomy/index','type'=>Takonomy::TYPE_PAGE]],
	            		],
            		],            		            		
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
        	<div class="row">
	        	<div class="col-md-2">
	        		<div>
	        			<div>指派角色</div>
	        			<ul>
	        				<li><?php echo Html::a('指派角色',['assignment/index'])?></li>
	        			</ul>
	        		</div>	        	
	        		<div>
	        			<div>角色管理</div>
	        			<ul>
	        				<li><?php echo Html::a('新建角色',['role/create'])?></li>
	        				<li><?php echo Html::a('管理分类',['category/index','type'=>Category::Type_Role])?></li>
	        				<li><?php echo Html::a('全部',['role/index'])?></li>
	        				<?php 
	        					$categories = Category::findAll(['type'=>Category::Type_Role]);
	        					foreach ($categories as $category):
	        				?>
	        				<li><?php echo Html::a($category['name'],['role/index','category_id'=>$category['id']])?></li>
	        				<?php endforeach;?>
	        				
	        				
	        			</ul>
	        		</div>
	        		<div>
	        			<div>权限管理</div>
	        			<ul>
	        				<li><?php echo Html::a('新建权限',['permission/create'])?></li>   
	        				<li><?php echo Html::a('管理分类',['category/index','type'=>Category::Type_Permission])?></li>
	        				<li><?php echo Html::a('全部',['permission/index'])?></li>   
	        				<?php 
	        					$categories = Category::findAll(['type'=>Category::Type_Permission]);
	        					foreach ($categories as $category):
	        				?>
	        				<li><?php echo Html::a($category['name'],['permission/index','category_id'=>$category['id']])?></li>
	        				<?php endforeach;?>	
	        				
	        			</ul>
	        		</div>	        		
	        		<div>
	        			<div>规则管理</div>
	        			<ul>
	        				<li><?php echo Html::a('新建规则',['rule/create'])?></li>
	        				<li><?php echo Html::a('管理分类',['category/index','type'=>Category::Type_Rule])?></li>
	        				<li><?php echo Html::a('全部',['rule/index'])?></li>
	        				<?php 
	        					$categories = Category::findAll(['type'=>Category::Type_Rule]);
	        					foreach ($categories as $category):
	        				?>
	        				<li><?php echo Html::a($category['name'],['rule/index','category_id'=>$category['id']])?></li>
	        				<?php endforeach;?>		        			
	        				
	        			</ul>
	        		</div>
	        	</div>
	        	<div class="col-md-10">
	        	
	            <?= Breadcrumbs::widget([
	                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
	            ]) ?>
	            <?= $content ?>
	            </div>
        	</div>
        	
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
