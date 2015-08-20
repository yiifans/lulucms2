<?php
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use source\libs\Resource;
use source\core\widgets\ListView;
use source\core\widgets\LinkPager;
use source\libs\DataSource;
use source\core\widgets\LoopData;

$this->layout = 'main_full';

/* @var $this source\core\front\FrontView */
$this->title='首页';

?>


<div class="slider-wrap">
    <div id="slider-wrapper" class="slider">
        <div class="container">
            <script type="text/javascript">
                //    jQuery(window).load(function() {
                jQuery(function () {
                    var myCamera = jQuery('#camera55ae5840dbe78');
                    if (!myCamera.hasClass('motopress-camera')) {
                        myCamera.addClass('motopress-camera');
                        myCamera.camera({
                            alignment: 'topCenter', //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
                            autoAdvance: true, //true, false
                            mobileAutoAdvance: true, //true, false. Auto-advancing for mobile devices
                            barDirection: 'leftToRight', //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
                            barPosition: 'top', //'bottom', 'left', 'top', 'right'
                            cols: 12,
                            easing: 'easeOutQuad', //for the complete list http://jqueryui.com/demos/effect/easing.html
                            mobileEasing: '', //leave empty if you want to display the same easing on mobile devices and on desktop etc.
                            fx: "simpleFade", //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft',          'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'
                            //you can also use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'
                            mobileFx: '', //leave empty if you want to display the same effect on mobile devices and on desktop etc.
                            gridDifference: 250, //to make the grid blocks slower than the slices, this value must be smaller than transPeriod
                            height: '36.3%', //here you can type pixels (for instance '300px'), a percentage (relative to the width of the slideshow, for instance '50%') or 'auto'
                            imagePath: 'images/', //he path to the image folder (it serves for the blank.gif, when you want to display videos)
                            loader: "no", //pie, bar, none (even if you choose "pie", old browsers like IE8- can't display it... they will display always a loading bar)
                            loaderColor: '#ffffff',
                            loaderBgColor: '#eb8a7c',
                            loaderOpacity: 1, //0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1
                            loaderPadding: 0, //how many empty pixels you want to display between the loader and its background
                            loaderStroke: 3, //the thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter
                            minHeight: '14px', //you can also leave it blank
                            navigation: true, //true or false, to display or not the navigation buttons
                            navigationHover: false, //if true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be visible always
                            pagination: false,
                            playPause: false, //true or false, to display or not the play/pause buttons
                            pieDiameter: 33,
                            piePosition: 'rightTop', //'rightTop', 'leftTop', 'leftBottom', 'rightBottom'
                            portrait: true, //true, false. Select true if you don't want that your images are cropped
                            rows: 8,
                            slicedCols: 12,
                            slicedRows: 8,
                            thumbnails: false,
                            time: 7000, //milliseconds between the end of the sliding effect and the start of the next one
                            transPeriod: 1500, //lenght of the sliding effect in milliseconds

                            ////////callbacks

                            onEndTransition: function () { }, //this callback is invoked when the transition effect ends
                            onLoaded: function () { }, //this callback is invoked when the image on a slide has completely loaded
                            onStartLoading: function () { }, //this callback is invoked when the image on a slide start loading
                            onStartTransition: function () { } //this callback is invoked when the transition effect starts
                        });
                    }
                });
                //    });
            </script>
            <div id="camera55ae5840dbe78" class="camera_wrap camera">
                <?php $thumbs = $this->getFragmentData(3);?>
                <?php foreach ($thumbs as $item):?>
                <div data-src='<?php echo $item['thumb'];?>' data-link='<?php echo $item['url']?>' data-thumb='<?php echo $item['thumb'];?>'>
                    <div class="camera_caption fadeFromLeft">
                        <h3><?php echo $item['title']?></h3>
                        <h2><?php echo $item['sub_title']?></h2>
                        <h5><?php echo $item['summary']?></h5>
                        <a href="<?php echo $item['url']?>" class="slide-btn">Read more</a>
                    </div>
                </div>
                <?php endforeach;?>
               
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <div id="post-203" class="post-203 page type-page status-publish hentry">
                        <div class="row ">
                            <?php $items = $this->getFragmentData(5);?>
                            <?php foreach ($items as $item):?>
                            <div class="span4 ">
                                <section class=" " style="">
                                    <div class="title-box clearfix home1-title">
                                        <span class="title-box_icon">
                                            <img src="<?php echo $item['thumb'];?>" alt="" /></span><h2 class="title-box_primary"><?php echo $item['title']?></h2>
                                        <h3 class="title-box_secondary"><?php echo $item['summary']?></h3>
                                    </div>
                                    <a href="<?php echo $item['url']?>" title="More" class="btn btn-default btn-normal btn-inline home1-btn" target="_self">More</a>
                                </section>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <section class="" style="">
                            <div class="title-box clearfix proj-title">
                                <h2 class="title-box_primary">我们的产品</h2>
                            </div>
                            <ul class="posts-grid row-fluid unstyled home1-grid">
                                <?php $items = $this->getFragmentData(6);?>
                                <?php foreach ($items as $item):?>
                                <li class="span4">
                                    <a href="<?php echo $item['url'];?>" title="<?php echo $item['title'];?>">
                                            <img src="<?php echo $item['thumb'];?>" alt="<?php echo $item['title'];?>" /></a>
                                    <div class="clear"></div>
                                    <h5><a href="<?php echo $item['url'];?>" title="<?php echo $item['title'];?>"><?php echo $item['title'];?></a></h5>
                                    <p class="excerpt"><?php echo $item['summary'];?></p>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </section>
                        <div class="row ">
                            <div class="span6 ">
                                <section class=" " style="">
                                    <div class="title-box clearfix news-title">
                                        <h2 class="title-box_primary">最新资讯</h2>
                                    </div>
                                    <a href="<?php echo Url::to(['/post'])?>" title="更多" class="btn btn-link btn-normal btn-inline news-btn" target="_self">更多</a>
                                    <ul class="recent-posts rowhome2-grid unstyled">
                                        <?php $items = $this->getFragmentData(7);?>
                                        <?php foreach ($items as $item):?>
                                        <li class="recent-posts_li span3 post-71 post type-post status-publish format-standard has-post-thumbnail hentry category-tincidunt-ac-viverra-sed-nulla-porta-diam-eu-massa cat-9-id">
                                            <h5><span class="meta"><span class="post-date">14<br />Mar</span></span>
                                                <a href="<?php echo $item['url']?>" title="Lorem ipsum est dolore sit"><?php echo $item['title']?></a></h5>
                                            <div class="excerpt"><?php echo $item['summary']?></div>
                                            <a href="<?php echo $item['url']?>" class="btn btn-primary" title="Lorem ipsum est dolore sit">more</a><div class="clear"></div>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </section>
                            </div>
                            <div class="span6 ">
                                <section class=" " style="">
                                    <div class="wrap">
                                        <img class="alignleft size-full wp-image-1970" src="<?php echo $this->getThemeUrl();?>/images/home1.png" alt="home1" width="238" height="341" /><div class="title-box clearfix wrap-title">
                                            <h2 class="title-box_primary">为什么选择我们?</h2>
                                            <h3 class="title-box_secondary">全面、专业、高效、高质廉价，超高性价比、多元化一站式服务- </h3>
                                        </div>
                                        <div class="list styled custom-list">
                                            <ul>
                                                <?php $items = $this->getFragmentData(8);?>
                                                <?php foreach ($items as $item):?>
                                                <li><a href="<?php echo $item['url']?>"><?php echo $item['title']?></a></li>
                                                <?php endforeach;?>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="span6 ">
                                <section class="effect-rotate " style="">
                                    <div class="title-box clearfix news-title">
                                        <h2 class="title-box_primary">热门帖子</h2>
                                    </div>
                                    <?php $items = $this->getFragmentData(10);?>
                                    <?php foreach ($items as $item):?>
                                    <img class="alignleft size-full wp-image-1976" src="<?php echo $item['thumb'];?>" alt="home2" width="262" height="187" />
                                    <div class="title-box clearfix home3-title">
                                        <h2 class="title-box_primary"><?php echo $item['title'];?></h2>
                                        <h3 class="title-box_secondary"><?php echo $item['sub_title'];?></h3>
                                    </div>
                                    <?php echo $item['summary'];?><br />
                                    <a href="<?php echo $item['url'];?>" title="more" class="btn btn-default btn-normal btn-inline home3-btn" target="_self">more</a>
                                    <div class="clear"></div>
                                    <?php endforeach;?>
                                </section>
                            </div>
                            <div class="span1 "></div>
                            <div class="span5 ">
                                <section class="" style="">
                                    <div class="title-box clearfix news-title">
                                        <h2 class="title-box_primary">Yii2高级视频</h2>
                                    </div>
                                    <figure class="featured-thumbnail thumbnail video_preview clearfix">
                                        <div>
                                            <?php $items = $this->getFragmentData(1);
                                                if(isset($items[0])){echo $items[0]['content'];}
                                            ?>
                                        </div>
                                    </figure>
                                </section>
                            </div>
                        </div>
                        <section class="" style="">
                            <div class="wrap2">
                                <div class="row ">
                                    <div class="span2 ">
                                        <h5 style="height:45px;line-height:45px;">我们的客户</h5>
                                    </div>
                                    <?php $items = $this->getFragmentData(9);?>
                                    <?php foreach ($items as $item):?>
                                    <div class="span2 ">
                                        <a href="#">
                                            <img class="alignleft size-full wp-image-1982" src="<?php echo $item['thumb'];?>" alt="<?php echo $item['title'];?>" width="162" height="44" /></a>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </section>
                        <div class="clear"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
