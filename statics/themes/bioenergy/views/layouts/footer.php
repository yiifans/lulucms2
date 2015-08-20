<?php 

use source\libs\Resource;
use source\models\Menu;
use source\LuLu;


?>
        </div>
        <footer class="motopress-wrapper footer">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="row footer-widgets">
                            <div class="span2 footer-wid">
                                <div id="nav_menu-2">
                                    <h4>公司</h4>
                                    <div class="menu-footer-menu-1-container">
                                        <ul id="menu-footer-menu-1" class="menu">
                                            <?php $this->renderMenu('footer');?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="span2 footer-wid">
                                <div id="nav_menu-3">
                                    <h4>概观</h4>
                                    <div class="menu-footer-menu-2-container">
                                        <ul id="menu-footer-menu-2" class="menu">
                                            <?php $this->renderMenu('footer2');?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="span2 footer-wid">
                                <div id="nav_menu-4">
                                    <h4>客户价值</h4>
                                    <div class="menu-footer-menu-3-container">
                                        <ul id="menu-footer-menu-3" class="menu">
                                            <?php $this->renderMenu('footer3');?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="span2 footer-wid">
                                <h4>导航</h4>
                                <nav class="nav footer-nav">
                                    <ul id="menu-footer-menu" class="menu">
                                        <?php $this->renderMenu('footer4');?>
                                    </ul>
                                </nav>
                            </div>
                            <div class="span1"></div>
                            <div class="span3 last-wid">
                                <div id="text-6">
                                    <div class="textwidget">
                                        <div class="house">
                                            地址：9870 St Vincent Place,<br />
                                            Glasgow, DC 45 Fr 45.
                                        </div>
                                        <div class="phone">
                                            电话: +1 800 603 6035<br />
                                            传真: +1 800 889 9898
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div id="footer-text" class="footer-text">
                                        <a href="<?php echo $this->getHomeUrl()?>" class="site-name">LuLu CMS</a> 2015 | Privacy Policy
                                    </div>
                                </div>
                                <div class="social-nets-wrapper">
                                    <ul class="social">
                                        <li><a href="#" title="twitter">
                                            <img src="<?php echo $this->getThemeUrl();?>/images/social/twitter.png" alt="twitter"></a></li>
                                        <li><a href="#" title="facebook">
                                            <img src="<?php echo $this->getThemeUrl();?>/images/social/facebook.png" alt="facebook"></a></li>
                                        <li><a href="#" title="mail">
                                            <img src="<?php echo $this->getThemeUrl();?>/images/social/mail.png" alt="mail"></a></li>
                                        <li><a href="#" title="google">
                                            <img src="<?php echo $this->getThemeUrl();?>/images/social/google.png" alt="google"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <div id="back-top-wrapper" class="visible-desktop">
        <p id="back-top">
            <a href="#top"><span></span></a>
        </p>
    </div>
<!--<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/comment-reply.min.js?ver=4.1.4'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/cherry.lazy-load.js?ver=1.0'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/device.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>

<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/scripts.js?ver=4.1.1'></script>-->

<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/superfish.js?ver=1.5.3'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jquery.mobilemenu.js?ver=1.0'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jquery.magnific-popup.min.js?ver=0.9.3'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/FlexSlider/jquery.flexslider-min.js?ver=2.2.2'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jplayer.playlist.min.js?ver=2.3.0'></script>

<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jquery.jplayer.min.js?ver=2.6.0'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/tmstickup.js?ver=1.0.0'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/device.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jquery.zaccordion.min.js?ver=2.1.0'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/camera.min.js?ver=1.3.4'></script>

<!--<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jquery.debouncedresize.js?ver=1.0'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jquery.ba-resize.min.js?ver=1.1'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/jquery.isotope.js?ver=1.5.25'></script>
<script type='text/javascript' src='<?php echo $this->getThemeUrl();?>/js/cherry-plugin.js?ver=1.2.3'></script>-->

<?php echo $this->getConfigValue('sys_stat');?>

<?php $this->endBody();?>
</body>
</html>

<?php $this->endPage() ?>