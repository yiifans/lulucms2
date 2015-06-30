<?php 

use source\libs\Resource;
use source\models\Menu;
use source\LuLu;


$themeUrl= Resource::getThemeUrl();

?>
    </section>
    <footer class="footer">
        <div class="footer-inner">
            <div class="copyright pull-left">
                <a href="<?php echo LuLu::getAlias('@web')?>" >LuLu CMS</a> 保留一切权利 ·   © 2011-2015
            </div>
            <div class="trackcode pull-right">
              
                
            </div>
        </div>
    </footer>
    <?php echo $this->getConfigValue('sys_stat');?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>