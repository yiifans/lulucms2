<?php 

use source\libs\Resource;
use source\models\Menu;
use source\LuLu;


?>

<?php echo $this->render('header');?>

                <div class="col-md-8 content-area" role="main">
                    <?php echo $content;?>
                </div>
                
                <?php if(isset($this->blocks['sidebar'])):?>
                <div class="col-md-4 site-sidebar" role="complementary">
                    <?php echo $this->blocks['sidebar'];?>
                </div>
                <?php else:?>
               <?php echo $this->render('//_inc/sidebar');?>
                <?php endif;?>
                
                
<?php echo $this->render('footer');?>