
<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="blank" />
<meta name="format-detection" content="telephone=no" />
<title>系统设置</title>
<base href="http://localhost/WeCenter/?/" />
<link type="text/css" rel="stylesheet" href="http://localhost/WeCenter/static/css/bootstrap.css?v=20150409" />
<link type="text/css" rel="stylesheet" href="http://localhost/WeCenter/static/css/icon.css?v=20150409" />
<script type="text/javascript">
    var G_INDEX_SCRIPT = "?/";
    var G_BASE_URL = "http://localhost/WeCenter/?";
    var G_STATIC_URL = "http://localhost/WeCenter/static";
    var G_UPLOAD_URL = "http://localhost/WeCenter/uploads";
    var G_USER_ID = "1";
    var G_POST_HASH = "";
</script>
<link type="text/css" rel="stylesheet" href="http://localhost/WeCenter/static/admin/css/common.css?v=20150409" />
<script type="text/javascript" src="http://localhost/WeCenter/static/js/jquery.2.js?v=20150409" ></script>
<script type="text/javascript" src="http://localhost/WeCenter/static/admin/js/aws_admin.js?v=20150409" ></script>
<script type="text/javascript" src="http://localhost/WeCenter/static/admin/js/aws_admin_template.js?v=20150409" ></script>
<script type="text/javascript" src="http://localhost/WeCenter/static/js/jquery.form.js?v=20150409" ></script>
<script type="text/javascript" src="http://localhost/WeCenter/static/admin/js/framework.js?v=20150409" ></script>
<script type="text/javascript" src="http://localhost/WeCenter/static/admin/js/global.js?v=20150409" ></script>
<!--[if lte IE 8]>
    <script type="text/javascript" src="http://localhost/WeCenter/static/js/respond.js"></script>
<![endif]-->
</head>

<body>
<div  class="aw-header">
    <button class="btn btn-sm mod-head-btn pull-left">
        <i class="icon icon-bar"></i>
    </button>

    <div class="mod-header-user">
        <ul class="pull-right">
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle mod-bell" data-toggle="dropdown">
                    <i class="icon icon-bell"></i>
                                    </a>
                <ul class="dropdown-menu mod-chat">
                                    <p>没有通知</p>
                                    </ul>
            </li>

            <li class="dropdown username">
                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="http://localhost/WeCenter/static/common/avatar-mid-img.png" class="img-circle" width="30">
                    admin888                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu pull-right mod-user">
                    <li>
                        <a href="http://localhost/WeCenter" target="_blank"><i class="icon icon-home"></i>首页</a>
                    </li>

                    <li>
                        <a href="http://localhost/WeCenter/?/admin/"><i class="icon icon-ul"></i>概述</a>
                    </li>

                    <li>
                        <a href="http://localhost/WeCenter/?/admin/logout/"><i class="icon icon-logout"></i>退出</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="aw-side" id="aw-side">
    <div class="mod">
        <div class="mod-logo">
            <img class="pull-left" src="http://localhost/WeCenter/static/admin/img/logo.png" alt="" />
            <h1>WeCenter</h1>
        </div>

        <div class="mod-message">
            <div class="message">
                <a class="btn btn-sm" href="http://localhost/WeCenter" target="_blank" title="首页">
                    <i class="icon icon-home"></i>
                </a>

                <a class="btn btn-sm" href="http://localhost/WeCenter/?/admin/" title="概述">
                    <i class="icon icon-ul"></i>
                </a>

                <a class="btn btn-sm" href="http://localhost/WeCenter/?/admin/logout/" title="退出">
                    <i class="icon icon-logout"></i>
                </a>
            </div>
        </div>

        <ul class="mod-bar" >
            <input type="hidden" id="hide_values" val="0" />
                        <li>
                <a href="http://localhost/WeCenter/?/admin/" class=" icon icon-home">
                    <span>概述</span>
                </a>
                            </li>
                        <li>
                <a href="javascript:;" class=" icon icon-setting active" data="icon">
                    <span>全局设置</span>
                </a>
                
                <ul>
                                        <li>
                        <a  class="active" href="http://localhost/WeCenter/?/admin/settings/category-site">
                            <span>站点信息</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-register">
                            <span>注册访问</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-functions">
                            <span>站点功能</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-contents">
                            <span>内容设置</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-integral">
                            <span>威望积分</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-permissions">
                            <span>用户权限</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-mail">
                            <span>邮件设置</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-openid">
                            <span>开放平台</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-cache">
                            <span>性能优化</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/settings/category-interface">
                            <span>界面设置</span>
                        </a>
                    </li>
                                    </ul>
                            </li>
                        <li>
                <a href="javascript:;" class=" icon icon-reply" data="icon">
                    <span>内容管理</span>
                </a>
                
                <ul class="hide">
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/question/question_list/">
                            <span>问题管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/article/list/">
                            <span>文章管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/topic/list/">
                            <span>话题管理</span>
                        </a>
                    </li>
                                    </ul>
                            </li>
                        <li>
                <a href="javascript:;" class=" icon icon-user" data="icon">
                    <span>用户管理</span>
                </a>
                
                <ul class="hide">
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/user/list/">
                            <span>用户列表</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/user/group_list/">
                            <span>用户组</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/user/invites/">
                            <span>批量邀请</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/user/job_list/">
                            <span>职位设置</span>
                        </a>
                    </li>
                                    </ul>
                            </li>
                        <li>
                <a href="javascript:;" class=" icon icon-report" data="icon">
                    <span>审核管理</span>
                </a>
                
                <ul class="hide">
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/approval/list/">
                            <span>内容审核</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/user/verify_approval_list/">
                            <span>认证审核</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/user/register_approval_list/">
                            <span>注册审核</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/question/report_list/">
                            <span>用户举报</span>
                        </a>
                    </li>
                                    </ul>
                            </li>
                        <li>
                <a href="javascript:;" class=" icon icon-signup" data="icon">
                    <span>内容设置</span>
                </a>
                
                <ul class="hide">
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/nav_menu/">
                            <span>导航设置</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/category/list/">
                            <span>分类管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/feature/list/">
                            <span>专题管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/page/">
                            <span>页面管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/help/list/">
                            <span>帮助中心</span>
                        </a>
                    </li>
                                    </ul>
                            </li>
                        <li>
                <a href="javascript:;" class=" icon icon-share" data="icon">
                    <span>微信微博</span>
                </a>
                
                <ul class="hide">
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/weixin/accounts/">
                            <span>微信多账号管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/weixin/mp_menu/">
                            <span>微信菜单管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/weixin/reply/">
                            <span>微信自定义回复</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/weixin/third_party_access/">
                            <span>微信第三方接入</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/weixin/qr_code/">
                            <span>微信二维码管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/weixin/sent_msgs_list/">
                            <span>微信消息群发</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/weibo/msg/">
                            <span>微博消息接收</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/edm/receiving_list/">
                            <span>邮件导入</span>
                        </a>
                    </li>
                                    </ul>
                            </li>
                        <li>
                <a href="javascript:;" class=" icon icon-inbox" data="icon">
                    <span>邮件群发</span>
                </a>
                
                <ul class="hide">
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/edm/tasks/">
                            <span>任务管理</span>
                        </a>
                    </li>
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/edm/groups/">
                            <span>用户群管理</span>
                        </a>
                    </li>
                                    </ul>
                            </li>
                        <li>
                <a href="javascript:;" class=" icon icon-job" data="icon">
                    <span>工具</span>
                </a>
                
                <ul class="hide">
                                        <li>
                        <a  href="http://localhost/WeCenter/?/admin/tools/">
                            <span>系统维护</span>
                        </a>
                    </li>
                                    </ul>
                            </li>
                    </ul>
    </div>
</div>

<div class="aw-content-wrap">
    <form action="http://localhost/WeCenter/?/admin/ajax/save_settings/" id="settings_form" method="post" onsubmit="return false">
    <div class="mod">
                <div class="mod-head">
            <h3>
                <span class="pull-left">站点信息</span>

                <span class="pull-right"><a href="javascript:;" onclick="AWS.ajax_post($('#settings_form'));" class="btn btn-xs btn-primary mod-site-save">快速保存</a></span>
            </h3>
        </div>
        <div class="tab-content mod-content">
            <table class="table table-striped">
                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-4 col-xs-3 control-label">网站名称:</span>
                            <div class="col-sm-5 col-xs-8">
                                <input type="text" class="form-control" name="site_name" value="">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-4 col-xs-3 control-label">网站简介:</span>
                            <div class="col-sm-5 col-xs-8">
                                <textarea class="form-control textarea" rows="4" name="description"  >WeCenter 社交化知识社区</textarea>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-4 col-xs-3 control-label">网站关键词:</span>
                            <div class="col-sm-5 col-xs-8">
                                <textarea class="form-control textarea" rows="4" name="keywords"  >WeCenter,知识社区,社交社区,问答社区</textarea>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-4 col-xs-3 control-label">网站 ICP 备案号:</span>
                            <div class="col-sm-5 col-xs-8">
                                <input name="icp_beian" class="form-control" type="text" value=""/>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-4 col-xs-3 control-label">上传目录外部访问 URL 地址:</span>
                            <div class="col-sm-5 col-xs-8">
                                <input name="upload_url" class="form-control" type="text" value="http://localhost/WeCenter/uploads"/>

                                <span class="help-block">末尾不带 / 或 \</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-4 col-xs-3 control-label">上传文件存放绝对路径</span>
                            <div class="col-sm-5 col-xs-8">
                                <input name="upload_dir" class="form-control" type="text" value="D:/wamp/www/WeCenter/uploads"/>

                                <span class="help-block">末尾不带 / 或 \，目前网站根目录绝对路径：D:\wamp\www\WeCenter/</span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <span class="col-sm-4 col-xs-3 control-label">static 目录资源 URL 地址</span>
                            <div class="col-sm-5 col-xs-8">
                                <input name="img_url" class="form-control" type="text" value=""/>

                                <span class="help-block">末尾不带 / 或 \，留空使用根目录下的 static 资源</span>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

                <div class="tab-content mod-content mod-one-btn">
            <div class="center-block">
                <input type="button" value="保存设置" class="btn btn-primary" onclick="AWS.ajax_post($('#settings_form'));" />
            </div>
        </div>
    </div>
    </form>
</div>

<div class="aw-footer">
    <p>Copyright &copy; 2015 - Powered By <a href="http://www.wecenter.com/?copyright" target="blank">WeCenter 3.1.2</a></p>
</div>

<!-- DO NOT REMOVE -->
<div id="aw-ajax-box" class="aw-ajax-box"></div>


<div style="display:none;" id="__crond">
	<script type="text/javascript">
	    $(document).ready(function () {
	        $('#__crond').html(unescape('%3Cimg%20src%3D%22' + G_BASE_URL + '/crond/run/1431182380%22%20width%3D%221%22%20height%3D%221%22%20/%3E'));
	    });

	</script>
</div>

<!-- Escape time: 0.14000797271729 --><!-- / DO NOT REMOVE -->

</body>
</html>
