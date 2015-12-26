<?php

/* @var $this source\core\front\FrontView */

$this->title='安装完成';
?>
<div class="header">
    <div class="step_area">
        <h2>恭喜您安装成功!</h2>
    </div>
</div>
<div class="mainbody">
    <div class="complete">
        <div class="complete_txt">
            <strong>现在您可以：</strong> 
            <a href="index.php" class="action">访问网站首页</a><span>或</span><a href="admin.php" class="action">登陆后台</a>
            <div class="complete_note">
                <p class="red">如重新安装，请删除<code>data/install.lock</code>文件</p>
                <p>为了安全起见，已删除本安装程序控制器</p>
                <p class="help">
                    <strong>获取更多帮助</strong>
                    <br />
                    帮助中心：<a href="http://www.lulucms.com" target="_blank"> http://www.lulucms.com </a>
                    <br />
                    Yii交流中心：<a href="http://www.yiifans.com" target="_blank"> http://www.yiifans.com/</a><br />
                    QQ群&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：308110659
                </p>

            </div>
        </div>
    </div>
</div>
