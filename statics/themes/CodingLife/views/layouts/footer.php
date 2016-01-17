<?php 

use source\libs\Resource;
use source\models\Menu;
use source\LuLu;

/* @var $this source\core\front\FrontView */

?>
            </div>
                <!--end: main -->
        <div class="clear"></div>
        <div id="footer">
            <div id=footer_menu>
            <ul>
            <?php $this->renderMenu('footer');?>
            </ul>
            </div>
            <?php $this->showConfigValue('sys_icp');?>
            Copyright ©2015 yiifans
        </div>
    <!--end: footer -->
    </div>
    <!--end: home 自定义的最大容器 -->

    <?php echo $this->getConfigValue('sys_stat');?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>