<?php 

use source\libs\Resource;
use source\models\Menu;
use source\LuLu;

$taxonomyModel = LuLu::getViewParam('taxonomyModel');

?>


<?php echo $this->render('header');?>
      
<div class="container">
    <div class="row">
        <div class="span12">
        
        <?php if($taxonomyModel && !empty($taxonomyModel->id)):?>
            <div class="row">
                <div class="span12">
                    <section class="title-section"  style="border-bottom: 1px solid #AAA;">
                        <h1 class="title-header" style="margin-bottom: 10px;">
                        <?php echo $taxonomyModel->name ?>
                        <?php if(!empty($taxonomyModel['description'])):?>
                        <span style="font-weight: normal;font-size: 12px;color: #7D7D7D;margin-left: 20px;line-height: 13px;">——&nbsp;&nbsp;<?php echo $taxonomyModel['description']?></span>
                        <?php endif;?>
                        </h1>
                        
                    </section> 
                </div>
            </div>
        <?php endif;?>
            <div class="row">
                <div class="span8 right" id="content">
                    <?php echo $content;?>
                </div>
                <?php if(isset($this->blocks['sidebar'])):?>
                <div class="sidebar span4" id="sidebar">
                    <?php echo $this->blocks['sidebar'];?>
                </div>
                <?php else:?>
                <?php echo $this->render('//_inc/sidebar');?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
        
<?php echo $this->render('footer');?>