<?php

use yii\helpers\Url;

/* @var $this source\core\front\FrontView */
$this->title='阅读协议';
?>

<div class="header">
    <div class="step_area">
        <h2>关于</h2>
    </div>
</div>
<div class="mainbody">
    <div class="agreement_area">
        <div class="agreement">
            
            <p>
                感谢您选择LuLu CMS。希望我们的努力能为您提供一个高效快速和强大的建站解决方案。
            </p>
            <p>LuLu CMS官方网站为 <a href="http://www.lulucms.com" target="_blank" class="action" >http://www.lulucms.com。</a></p>
            <p>
                LuLuCMS是一款基于强大的开源框架Yii Framework 2，采用高性能的PHP5+MySql开发的多功能开源的网站内容管理系统。
具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果.

            </p>
            <p>LuLuCMS可用于企业建站、个人博客、资讯门户、图片站等各类型站点。</p>
            
            <div class="hr_8"></div>
            
            <p>在开始前，我们需要您数据库的一些信息。请准备好如下信息。</p>
            <ol>
                <li>数据库主机</li>
                <li>数据库名</li>
                <li>数据库用户名</li>
                <li>数据库密码</li>
                <li>数据表前缀（table prefix，特别是当您要在一个数据库中安装多个WordPress时）</li>
            </ol>

            <p>
                我们将使用这些信息创建<code>data\config\db.php</code>文件。	如果出于任何原因，文件自动创建失败，请不要担心。这个向导的目的只是代您编辑配置文件，填入数据库信息。
                您可以直接使用文本编辑器打开<code>data\config\db.php</code>，填入您的信息，再另存为<code>data\config\db.php</code>。 需要帮助？没问题！

这些信息应由您的主机服务提供商提供。如果您不清楚，请联系他们。准备好了的话…</p>

        </div>
    </div>
    <div class="inst_btn_area" style="margin: 0;">
        <button type="button" onclick="window.close();return false;" class="button">不同意</button>
        &nbsp;
        <button type="button" onclick="window.location='<?php echo Url::to(['env']); ?>'" class="button">同　意</button>
    </div>
</div>
