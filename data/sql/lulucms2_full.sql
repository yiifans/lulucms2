-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 07 月 22 日 16:12
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `lulucms2`
--
CREATE DATABASE IF NOT EXISTS `lulucms2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lulucms2`;

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_assignment`
--

DROP TABLE IF EXISTS `lulu_auth_assignment`;
CREATE TABLE IF NOT EXISTS `lulu_auth_assignment` (
  `user` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  PRIMARY KEY (`user`,`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_assignment`
--

INSERT INTO `lulu_auth_assignment` (`user`, `role`) VALUES
('admin111', 'administrator');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_category`
--

DROP TABLE IF EXISTS `lulu_auth_category`;
CREATE TABLE IF NOT EXISTS `lulu_auth_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `sort_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `lulu_auth_category`
--

INSERT INTO `lulu_auth_category` (`id`, `name`, `description`, `type`, `sort_num`) VALUES
(1, '系统角色', NULL, 1, 1),
(2, '会员角色', NULL, 1, 1),
(5, '基本操作规则', NULL, 3, 1),
(6, '基本权限', '', 2, 1),
(7, '系统权限', '系统权限', 2, 100),
(8, '管理角色', '', 1, 2),
(9, '控制器权限', '', 2, 1436084643);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_permission`
--

DROP TABLE IF EXISTS `lulu_auth_permission`;
CREATE TABLE IF NOT EXISTS `lulu_auth_permission` (
  `id` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `form` int(11) NOT NULL,
  `options` text,
  `default_value` mediumtext,
  `rule` varchar(64) DEFAULT NULL,
  `sort_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_permission`
--

INSERT INTO `lulu_auth_permission` (`id`, `category`, `name`, `description`, `form`, `options`, `default_value`, `rule`, `sort_num`) VALUES
('allow_access', 'system', '允许访问', '', 3, NULL, '*', NULL, 1000),
('deny_access', 'system', '禁止访问', '', 3, NULL, '', NULL, 1000),
('dict/dict', 'controller', '数据字典子项', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 499),
('dict/dict-category', 'controller', '数据字典管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 500),
('manager_admin', 'system', '管理后台', '', 1, NULL, '', 'BooleanRule', 12222),
('menu/menu', 'controller', '菜单子项', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 790),
('menu/menu-category', 'controller', '菜单管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 800),
('modularity/default', 'controller', '模块管理', '', 5, NULL, 'index|首页\r\ninstall|安装\r\nactive|开启\r\ndeactive|关闭\r\nuninstall|卸载', 'ControllerRule', 900),
('page/page', 'controller', '单面管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 300),
('page/setting', 'controller', '单面设置', '', 5, NULL, 'index:get|分类(GET)\r\nindex:post|分类(POST)', 'ControllerRule', 299),
('post/post', 'controller', '文章管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 400),
('post/setting', 'controller', '文章设置', '', 5, NULL, 'index:get|分类(GET)\r\nindex:post|分类(POST)', 'ControllerRule', 399),
('rbac/permission', 'controller', '权限管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)', 'ControllerRule', 170),
('rbac/role', 'controller', '角色管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nrelation:get|设置权限(GET)\r\nrelation:post|设置权限(POST)\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 190),
('system/setting', 'controller', '系统设置', '', 5, NULL, 'basic:get|站点信息(GET)\r\nbasic:post|站点信息(POST)\r\naccess:get|注册与访问控制(GET)\r\naccess:post|注册与访问控制(POST)\r\nseo:get|SEO设置(GET)\r\nseo:post|SEO设置(POST)\r\ndatetime:get|时间设置(GET)\r\ndatetime:post|时间设置(POST)\r\nemail:get|邮件设置(GET)\r\nemail:post|邮件设置(POST)', 'ControllerRule', 1000),
('takonomy/takonomy', 'controller', '分类子项', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 690),
('takonomy/takonomy-category', 'controller', '分类管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 700),
('user/user', 'controller', '用户管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 200);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_relation`
--

DROP TABLE IF EXISTS `lulu_auth_relation`;
CREATE TABLE IF NOT EXISTS `lulu_auth_relation` (
  `role` varchar(64) NOT NULL,
  `permission` varchar(64) NOT NULL,
  `value` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`role`,`permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_relation`
--

INSERT INTO `lulu_auth_relation` (`role`, `permission`, `value`) VALUES
('administrator', 'allow_access', '*'),
('administrator', 'deny_access', ''),
('administrator', 'dict/dict', 'index,create,update:get,update:post,delete'),
('administrator', 'dict/dict-category', 'index,create,update:get,update:post,delete'),
('administrator', 'jjj', '0'),
('administrator', 'manager_admin', '1'),
('administrator', 'menu/menu', 'index,create,update:get,update:post,delete'),
('administrator', 'menu/menu-category', 'index,create,update:get,update:post,delete'),
('administrator', 'modularity/default', 'index,install,active,deactive,uninstall'),
('administrator', 'page/page', 'index,create,update:get,update:post,delete'),
('administrator', 'page/setting', 'index:get,index:post'),
('administrator', 'post/post', 'index,create,update:get,update:post,delete'),
('administrator', 'post/setting', 'index:get,index:post'),
('administrator', 'rbac/permission', 'index,create,update:get'),
('administrator', 'rbac/role', 'index,create,relation:get,relation:post,update:get,update:post,delete'),
('administrator', 'system/setting', 'basic:get,basic:post,access:get,access:post,seo:get,seo:post,datetime:get,datetime:post,email:get,email:post'),
('administrator', 'takonomy/takonomy', 'index,create,update:get,update:post,delete'),
('administrator', 'takonomy/takonomy-category', 'index,create,update:get,update:post,delete'),
('administrator', 'user/user', 'index,create,update:get,update:post,delete'),
('demo', 'allow_access', '*'),
('demo', 'deny_access', ''),
('demo', 'dict/dict', 'index,update:get'),
('demo', 'dict/dict-category', 'index,update:get'),
('demo', 'manager_admin', '1'),
('demo', 'menu/menu', 'index,update:get'),
('demo', 'menu/menu-category', 'index,update:get'),
('demo', 'modularity/default', 'index'),
('demo', 'page/page', 'index,update:get'),
('demo', 'page/setting', 'index:get'),
('demo', 'post/post', 'index,update:get'),
('demo', 'post/setting', 'index:get'),
('demo', 'rbac/permission', 'index'),
('demo', 'rbac/role', 'index,relation:get,update:get'),
('demo', 'system/setting', 'basic:get,access:get,seo:get,datetime:get,email:get'),
('demo', 'takonomy/takonomy', 'index,update:get'),
('demo', 'takonomy/takonomy-category', 'index,update:get'),
('demo', 'user/user', 'index,update:get'),
('deny_access', 'allow_access', ''),
('deny_access', 'create', '1'),
('deny_access', 'delete', '0'),
('deny_access', 'deny_access', '*'),
('deny_access', 'index', '0'),
('deny_access', 'list', '0'),
('deny_access', 'manager_admin', '0'),
('deny_access', 'update', '0'),
('editor', 'allow_access', '*'),
('editor', 'deny_access', ''),
('editor', 'jjj', '0'),
('editor', 'manager_admin', '1'),
('editor', 'system/setting', 'basic:get'),
('member_1', 'create', '1'),
('member_1', 'createnews', '0'),
('member_1', 'createpost', ''),
('member_1', 'delete', '1'),
('member_1', 'index', '0'),
('member_1', 'list', ''),
('member_1', 'update', ''),
('member_1', 'updatenews', ''),
('member_2', 'create', '1'),
('member_2', 'createnews', '1'),
('member_2', 'createpost', ''),
('member_2', 'delete', '文本'),
('member_2', 'index', '2'),
('member_2', 'list', '3'),
('member_2', 'update', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_role`
--

DROP TABLE IF EXISTS `lulu_auth_role`;
CREATE TABLE IF NOT EXISTS `lulu_auth_role` (
  `id` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_role`
--

INSERT INTO `lulu_auth_role` (`id`, `category`, `name`, `description`, `is_system`, `status`) VALUES
('administrator', 'admin', '管理员', '', 1, 1),
('demo', 'admin', '测试角色', '', 0, 1),
('deny_access', 'system', '禁止访问', '', 1, 1),
('deny_speak', 'system', '禁止发言', '', 1, 1),
('editor', 'admin', '编辑', '', 0, 1),
('guest', 'system', '游客', '', 1, 1),
('member_1', 'member', '初级会员', '', 0, 1),
('member_2', 'member', '中级会员', '', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_comment`
--

DROP TABLE IF EXISTS `lulu_comment`;
CREATE TABLE IF NOT EXISTS `lulu_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_ids` varchar(128) DEFAULT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(64) DEFAULT NULL,
  `user_email` varchar(64) DEFAULT NULL,
  `user_url` varchar(128) DEFAULT NULL,
  `user_ip` varchar(64) DEFAULT NULL,
  `user_address` varchar(128) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lulu_config`
--

DROP TABLE IF EXISTS `lulu_config`;
CREATE TABLE IF NOT EXISTS `lulu_config` (
  `id` varchar(64) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_config`
--

INSERT INTO `lulu_config` (`id`, `value`) VALUES
('page_takonomy', 'page'),
('post_takonomy', 'post'),
('sys_allow_register', '0'),
('sys_datetime_date_format', 'Y-m-d'),
('sys_datetime_pretty_format', '1'),
('sys_datetime_timezone', 'Etc/GMT-8'),
('sys_datetime_time_format', '0'),
('sys_date_format', ''),
('sys_date_format_custom', ''),
('sys_default_role', 'member_1'),
('sys_icp', 'aa'),
('sys_lang', 'zh-CN'),
('sys_seo_description', 'lulucms description'),
('sys_seo_keywords', 'lulucms,yiifans,yii2'),
('sys_seo_title', 'LuLu CMS'),
('sys_site_about', '<span>LuLuCMS是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。</span><br />\r\n<span>使用高性能的PHP5web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。</span><br />\r\n<span>采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果。</span><br />\r\n<span>LuLuCMS可用于企业建站、个人博客、资讯门户、图片站等各类型站点</span>'),
('sys_site_description', 'one powerful CMS'),
('sys_site_email', 'admin@admin.com'),
('sys_site_name', 'LuLu CMS'),
('sys_site_theme', 'blank'),
('sys_site_url', ''),
('sys_stat', 'bb'),
('sys_status', '1'),
('sys_timezone', ''),
('sys_time_format', ''),
('sys_time_format_custom', ''),
('sys_utc', ''),
('test_data_theme', 'tttccc');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_content`
--

DROP TABLE IF EXISTS `lulu_content`;
CREATE TABLE IF NOT EXISTS `lulu_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `takonomy_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(64) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_user_name` varchar(64) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `focus_count` int(11) NOT NULL DEFAULT '0',
  `favorite_count` int(11) NOT NULL DEFAULT '0',
  `view_count` int(11) NOT NULL DEFAULT '0',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `agree_count` int(11) NOT NULL DEFAULT '0',
  `against_count` int(11) NOT NULL DEFAULT '0',
  `recommend` int(1) DEFAULT '0',
  `headline` int(1) DEFAULT '0',
  `sticky` int(1) DEFAULT '0',
  `flag` tinyint(4) DEFAULT '0',
  `allow_comment` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(64) DEFAULT NULL,
  `template` varchar(64) DEFAULT NULL,
  `sort_num` int(11) NOT NULL DEFAULT '0',
  `visibility` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `content_type` varchar(64) NOT NULL,
  `seo_title` varchar(256) DEFAULT NULL,
  `seo_keywords` varchar(256) DEFAULT NULL,
  `seo_description` varchar(256) DEFAULT NULL,
  `title` varchar(256) NOT NULL,
  `sub_title` varchar(256) DEFAULT NULL,
  `url_alias` varchar(256) DEFAULT NULL,
  `redirect_url` varchar(256) DEFAULT NULL,
  `summary` varchar(512) DEFAULT NULL,
  `thumb` varchar(256) DEFAULT NULL,
  `thumbs` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `lulu_content`
--

INSERT INTO `lulu_content` (`id`, `takonomy_id`, `user_id`, `user_name`, `last_user_id`, `last_user_name`, `created_at`, `updated_at`, `focus_count`, `favorite_count`, `view_count`, `comment_count`, `agree_count`, `against_count`, `recommend`, `headline`, `sticky`, `flag`, `allow_comment`, `password`, `template`, `sort_num`, `visibility`, `status`, `content_type`, `seo_title`, `seo_keywords`, `seo_description`, `title`, `sub_title`, `url_alias`, `redirect_url`, `summary`, `thumb`, `thumbs`) VALUES
(1, NULL, 1, '', NULL, NULL, 1429888267, 1429888267, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '习近平在亚非领导人会议上的讲话（全文）', NULL, NULL, NULL, '合作具有越来越重要的全球意义。面对新机遇新挑战，亚非国家要坚持安危与共、守望相助，把握机遇、共迎挑战，提高亚非合作水平，继续做休戚与共、同甘共苦的好朋友、好伙伴、好兄弟。　　非洲有句谚语，“一根原木盖不起一幢房屋”。中国也有句古话，“孤举者难起，众行者易趋”。亚非国家加强互利合作，能产生“一加一大于二”的积极效应。我们要坚持互利共赢、共同发展，对接发展战略，加强基础设施互联互通，推进工业、农业、人力资源开发等各领域务实合作，打造绿色能源、环保、电子商务等合作新亮点，把亚非经济互补性转化为发展互助', 'data/attachment/20150424/20150424140031_35735.jpg', NULL),
(2, NULL, 1, '', NULL, NULL, 1429888331, 1429888331, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'BootStrap入门教程 (二)', NULL, NULL, NULL, '上讲回顾：Bootstrap的手脚架(Scaffolding)提供了固定(fixed)和流式(fluid)两种布局，它同时建立了一个宽达940px和12列的格网系统。基于手脚架(Scaffolding)之上，Bootstrap的基础CSS(BaseCSS)提供了一系列的基础Html页面要素，旨在为用户提供新鲜、一致的页面外观和感觉。本文将主要深入讲解排版(Typography),表格(Table),表单(Forms),按钮(Buttons)这四个方面的内容。排版(Typography)，它囊括标', 'data/attachment/20150424/20150424125736_98917.jpg', NULL),
(3, NULL, 1, '', NULL, NULL, 1429891708, 1429891708, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '(fixed)和流式(fluid)两种', NULL, NULL, NULL, '上讲回顾：Bootstrap的手脚架(Scaffolding)提供了固定(fixed)和流式(fluid)两种布局，它同时建立了一个宽达940px和12列的格网系统。基于手脚架(Scaffolding)之上，Bootstrap的基础CSS(BaseCSS)提供了一系列的基础Html页面要素，旨在为用户提供新鲜、一致的页面外观和感觉。本文将主要深入讲解排版(Typography),表格(Table),表单(Forms),按钮(Buttons)这四个方面的内容。排版(Typography)，它囊括标', 'data/attachment/20150424/20150424125757_30151.jpg', NULL),
(4, 16, 1, '', NULL, NULL, 1431160693, 1431160693, 0, 0, 22, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, 'Java适配器模式（Adapter模式）', NULL, NULL, NULL, '适配器模式定义：将两个不兼容的类纠合在一起使用，属于结构型模式，需要有Adaptee(被适配者)和Adaptor(适配器)两个身份。为何使用适配器模式我们经常碰到要将两个没有关系的类组合在一起使用，第一解决方案是：修改各自类的接口，但是如果我们没有源代码，或者，我们不愿意为了一个应用而修改各自的接口..', 'data/attachment/20150424/20150424125806_35680.jpg', NULL),
(5, NULL, 1, '', NULL, NULL, 1431162045, 1435468665, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', '', '', '', '驱虎吞狼', '', '', '', '典故来历编辑然而从字面不难理解，"驱虎吞狼"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘备之力，抵抗张鲁、曹操。不料被庞统用计，刘备反手攻击刘璋，刘璋不得已于214年投降，被流放至', '', NULL),
(6, 15, 1, '', NULL, NULL, 1431158480, 1431158480, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, '三国中的"驱虎吞狼"和"二虎竞食"是什么意思?', NULL, NULL, NULL, '荀彧的“二虎竞食”并不是象“子美”说的那样，也没有什么香饽饽让两人抢啊！~其实他是要曹操借着天子的名义给刘备一个徐州牧的官职，然后让他去打吕布。这样就有两个结果：第一，刘备把吕布灭了，这样刘备少了三国战神的帮助，曹操就能省心了。第二，刘备要是没法灭了吕布，那吕布肯定会反扑，弄不好反到把刘备给灭了，曹操不就更省心！~但是可惜，刘备没上当！~~而“驱虎吞狼”也并完全不是三十六计中的“借刀杀人”。他其实是同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且运用刘备的忠厚老实，吕布的无谋多疑、袁术的', 'data/attachment/20150424/20150424125917_60446.jpg', NULL),
(7, NULL, 1, '', NULL, NULL, 1431162568, 1431162568, 0, 0, 54, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, '专家认为饮食在减肥上的效果大于运动', NULL, NULL, NULL, '三名国际专家在《英国运动医学》上发表社论，认为运动对抗肥胖症效果有限，而摄取过多的糖类和碳水化合物才是需要注意的重点，专家称食品业鼓吹让消费者相信增加运动就可以忽视不健康的饮食习惯。肥胖者无需大量运动就能减肥，重点就是要少吃一点。研究显示每摄取来自糖类的150卡热量，患糖尿病的风险就比摄取来自脂肪的150卡热量高出10多倍。　　他们引用《柳叶刀》上的研究，指出不适当的饮食所导致的不健康问题，比不运动、喝酒、抽烟所导致的问题加起来还要多。他们的观点也有争议。', 'data/attachment/20150424/20150424130320_76950.jpg', NULL),
(8, NULL, 1, '', NULL, NULL, 1429888360, 1429888360, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '海尔出了一款洗衣机…手持的…要用7号电池', NULL, NULL, NULL, '　4月24日消息，此前在家博会上亮相的海尔手持式洗衣机咕咚近日在海尔官网接受预约，售价299元。　　海尔codo咕咚手持洗衣机采用三节7号电池驱动，能够产生每分钟700次频率的拍打，用“挤压洗”的洗涤方式去污，号称可洗掉酒渍、血渍等较小的污渍，避免了为一个小小的污渍就大动干戈洗整件衣服的情况。　　目前，海尔在其官网公布了这款codo咕咚手持洗衣机的预约价格为299元，将于5月正式开卖。', 'data/attachment/20150424/20150424130634_66285.jpg', NULL),
(9, NULL, 1, NULL, NULL, NULL, 1431158470, 1431158470, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, '由项目浅谈JS中MVVM模式', NULL, NULL, NULL, '1.背景最近项目原因使用了durandal.js和knockout.js，颇有受益。决定写一个比较浅显的总结。之前一直在用SpringMVC框架写后台，前台是用JSP+JS+标签库，算是很传统的MVC开发模式了。后来，前端用Flex还有微软的WPF做过开发，到这次，前端使用纯JS+HTML，利用knockout.js，也算是接触了几种语言下的MVVM模式。此次开发中，结合require.js和durandal.js，完成了按需加载、AMD规范以及前端页面路由。当然了，一般控件的编写和改用，还是使', 'data/attachment/20150424/20150424004759_37040.jpg', NULL),
(10, NULL, 1, NULL, NULL, NULL, 1429837422, 1429837422, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'hh', NULL, NULL, NULL, 'hh', '', NULL),
(11, NULL, 1, NULL, NULL, NULL, 1429889589, 1429889589, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'C#.NET机器学习与彩票数据分析', NULL, NULL, NULL, '接触机器学习1年多了，由于只会用C#堆代码，所以只关注.NET平台的资源，一边积累，一边收集，一边学习，所以在本站第101篇博客到来之际，分享给大家。部分用过的，会有稍微详细点的说明，其他没用过的，也是我关注的，说不定以后会用上。机器学习并不等于大数据或者数据挖掘，还有有些区别，有些东西可以用来处理大数据的问题或者数据挖掘的问题，他们之间也是有部分想通的，所以这些组件不仅仅可以用于机器学习，也可以用于数据挖掘相关的。　　按照功能把资源分为3个部分，开源综合与非综合类，以及其他网站博客等资料。都是', 'data/attachment/20150424/20150424153309_37202.jpg', NULL),
(12, NULL, 1, NULL, NULL, NULL, 1429891733, 1429891733, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '嵌入式JavaScript框架 EmbedJS', NULL, NULL, NULL, '开源中国的IT公司开源软件整理计划介绍Embed.JS是一个用于嵌入式设备的JavaScript框架如：移动电话，TVs、tablets和soforth。EmbedJS强大之处在于，它拥有专门为特定平台和浏览器如iOS,Firefox，Android等提供相应的开发版本。这样就能够以最少的代码，为用户提供最佳的体验。而且假如你喜欢自己定制，可以利用其提供的EmbedJSBuildtool工具实现。EmbedJS基于Dojo实现，所以你如果熟悉DojoAPI语法，那EmbedJS将是你最佳的选择。', '', NULL),
(13, 16, 1, NULL, NULL, NULL, 1431162035, 1431162035, 0, 0, 4, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, 'Space X寻“猎鹰9号”失败原因：腿短站不稳', NULL, NULL, NULL, '根据视频的显示，火箭已经处于竖直状态，但最后却翻到　　SpaceX公司在前不久的猎鹰9号火箭测试中仍然没有成功，该公司正在分析着陆失败的原因。　　首席执行官伊隆·马斯克一直在致力于打造可重复使用的火箭，猎鹰9号已经实现了数次空间站补给任务，本次发射后将1.6吨的物资送往国际空间站。虽然龙式飞船成功进入了预定轨道，但猎鹰9号火箭的返回级没有实现一次漂亮的着陆，而是在降落平台时发生了侧翻，爆炸成了碎片。　　首席执行官伊隆·马斯克认为火箭出现了过大的横向速度，导致火箭没有处于竖直状态，最终翻到在发射台', '', NULL),
(14, 15, 1, NULL, NULL, NULL, 1429892526, 1429892526, 0, 0, 75, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '25张美图，贺哈勃望远镜升空25年！', NULL, NULL, NULL, '到今年4月24日，近地轨道上的哈勃空间望远镜就已经升空整整25年了。图片来源：NASA　　1990年4月24日，发现号航天飞机从美国肯尼迪中心发射升空，将哈勃空间望远镜送上了近地轨道。尽管在最初的几年里，这台望远镜备受视力模糊的困扰，但经过修复和多次维护之后，哈勃已经成为了有史以来最著名、也最重要的天文望远镜，改变了我们对于宇宙的诸多认识，更不用说它还拍摄过许多已经成为经典的绝美太空照片了。　　现在，我们不妨用一组哈勃空间望远镜拍摄的照片，来庆祝它升空25周年。木星和它的大红斑。图片来源：NAS', 'data/attachment/20150424/20150424162206_46279.jpg', NULL),
(15, NULL, 1, NULL, NULL, NULL, 1431158460, 1437314628, 0, 0, 2, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', 0, 1, 1, 'post', '', '', '', 'ff', '', '', '', 'ddd', '', NULL),
(16, NULL, 1, NULL, NULL, NULL, 1431856521, 1431856521, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, 'ddd', NULL, NULL, NULL, '', '', NULL),
(18, NULL, 1, 'admin111', NULL, NULL, 1434635391, 1434635391, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, 'ateaa', NULL, NULL, NULL, 'sss', '', NULL),
(19, 16, 1, 'admin111', NULL, NULL, 1434635464, 1435468710, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', '', '', '', 'aaaaaa', '', '', '', '"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘', '', NULL),
(20, 17, 1, 'admin111', NULL, NULL, 1434977081, 1437580617, 0, 0, 8, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', 0, 1, 1, 'page', '', '', '', '关于我们', '', '', '', 'LuLuCMS是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，LuLuCMS可用于企业建站、个人博客、资讯门户、图片站等各类型站点。特点：1.开源免费无论是个人还是企业展示型网站均可用本系统来完成2.数据调用方便快捷自主研发的数据调用模块，能快速调用各类型数据，方便建站3.应用范围广这套系统不是企业网', '', NULL),
(21, 17, 1, 'admin111', NULL, NULL, 1434977117, 1437580409, 0, 0, 4, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', 0, 1, 1, 'page', '', '', '', '企业文化', '', '', '', '迪尔和肯尼迪把企业文化整个理论系统概述为5个要素，即企业环境、价值观、英雄人物、文化仪式和文化网络。企业环境是指企业的性质、企业的经营方向、外部环境、企业的社会形象、与外界的联系等方面。它往往决定企业的行为。价值观是指企业内成员对某个事件或某种行为好与坏、善与恶、正确与错误、是否值得仿效的一致认识。价值观是企业文化的核心，统一的价值观使企业内成员在判断自己行为时具有统一的标准，并以此来选择自己的行为。英雄人物是指企业文化的核心人物或企业文化的人格化，其作用在于作为一种活的样板，给企业中其他员工提', 'data/attachment/20150722/20150722155329_29162.jpg', NULL),
(22, 17, 1, 'admin111', NULL, NULL, 1434977141, 1437580372, 0, 0, 27, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', 0, 1, 1, 'page', '', '', '', '管理团队', '', '', '', '团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。任何理念都不能执着，执着生僵化，就会蜕变为形式主义，后果很糟糕。在如今企业管理者热火朝天进行的团队建设中就存在这个问题，将团队作为企业文化建设的至上准则是不恰当的，是不', 'data/attachment/20150722/20150722155252_22766.jpg', NULL),
(23, 17, 1, 'admin111', NULL, NULL, 1434977339, 1437319829, 0, 0, 17, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', 0, 1, 1, 'page', '', '', '', '联系我们', '', '', '', '联系我们', 'data/attachment/20150719/20150719153029_75357.jpg', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_content_page`
--

DROP TABLE IF EXISTS `lulu_content_page`;
CREATE TABLE IF NOT EXISTS `lulu_content_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `lulu_content_page`
--

INSERT INTO `lulu_content_page` (`id`, `content_id`, `body`) VALUES
(2, 20, '<p>\r\n	LuLuCMS是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，LuLuCMS可用于企业建站、个人博客、资讯门户、图片站等各类型站点。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	&nbsp;特点：\r\n</p>\r\n<p>\r\n	1.开源免费\r\n无论是个人还是企业展示型网站均可用本系统来完成&nbsp;\r\n</p>\r\n<p>\r\n	2.数据调用方便快捷\r\n自主研发的数据调用模块，能快速调用各类型数据，方便建站&nbsp;\r\n</p>\r\n<p>\r\n	3.应用范围广\r\n这套系统不是企业网站管理系统，也不是博客程序，更不是专业的图片管理系统，但它却具备大部分企业站、博客站、图片站的功能&nbsp;\r\n</p>\r\n<p>\r\n	4.安全高性能\r\n基于高性能的PHP5的web应用程序开发框架YII构建具有稳定、安全、高效、跨平台等特点&nbsp;\r\n</p>\r\n<p>\r\n	5.URL自定义\r\n系统支持自定义伪静态显示方式，良好的支持搜索引擎SEO。个性化设置每个栏目、内容的标题标签、描述标签、关键词标签&nbsp;\r\n</p>\r\n<p>\r\n	6.自定义数据模型\r\n系统可自定义数据模型满足各种表示形式和字段需求\r\n</p>\r\n<p>\r\n	7.完善的后台权限控制\r\n特有的管理员权限管理机制，可以灵活设置管理员的栏目管理权限、网站信息的添加、修改、删除权限等&nbsp;\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	系统运行环境：&nbsp;\r\n</p>\r\n<p>\r\n	数据库： mysql5+&nbsp;\r\n</p>\r\n<p>\r\n	PHP版本：php5.2.+&nbsp;\r\n</p>\r\n<p>\r\n	服务器：linux,unix,freebsd等\r\n</p>'),
(3, 21, '迪尔和肯尼迪把企业文化整个理论系统概述为5个要素，即企业环境、价值观、英雄人物、文化仪式和文化网络。\r\n企业环境是指企业的性质、企业的经营方向、外部环境、企业的社会形象、与外界的联系等方面。它往往决定企业的行为。\r\n价值观是指企业内成员对某个事件或某种行为好与坏、善与恶、正确与错误、是否值得仿效的一致认识。价值观是企业文化的核心，统一的价值观使企业内成员在判断自己行为时具有统一的标准，并以此来选择自己的行为。\r\n英雄人物是指企业文化的核心人物或企业文化的人格化，其作用在于作为一种活的样板，给企业中其他员工提供可供仿效的榜样，对企业文化的形成和强化起着极为重要的作用。\r\n文化仪式是指企业内的各种表彰、奖励活动、聚会以及文娱活动等，它可以把企业中发生的某些事情戏剧化和形象化，来生动的宣传和体现本企业的价值观，使人们通过这些生动活泼的活动来领会企业文化的内涵，使企业文化“寓教于乐”之中。\r\n文化网络是指非正式的信息传递渠道，主要是传播文化信息。它是由某种非正式的组织和人群，以及某一特定场合所组成，它所传递出的信息往往能反映出职工的愿望和心态。\r\n产生\r\n企业领导者把文化的变化人的功能应用于企业，以解决现代企业管理中的问题，就有了企业文化。企业管理理论和企业文化管理理论都追求效益。但前者为追求效益而把人当作客体，后者为追求效益把文化概念自觉应用于企业，把具有丰富创造性的人作为管理理论的中心。这种指导思想反映到企业管理中去，就有了人们称之为企业文化的种种观念。\r\n认识\r\n从企业文化的现实出发，进行深入的调查研究，把握企业文化各种现象之间的本质联系。依据实践经验，从感认认识到理性认识，进行科学的概括、总结。\r\n意义\r\n一．企业文化能激发员工的使命感。不管是什么企业都有它的责任和使命，企业使命感是全体员工工作的目标和方向，是企业不断发展或前进的动力之源。\r\n二．企业文化能凝聚员工的归属感。　企业文化的作用就是通过企业价值观的提炼和传播，让一群来自不同地方的人共同追求同一个梦想。\r\n三．企业文化能加强员工的责任感。企业要通过大量的资料和文件宣传员工责任感的重要性，管理人员要给全体员工灌输责任意识，危机意识和团队意识，要让大家清楚地认识企业是全体员工共同的企业。\r\n四．企业文化能赋予员工的荣誉感。每个人都要在自己的工作岗位，工作领域，多做贡献，多出成绩，多追求荣誉感。\r\n五．企业文化能实现员工的成就感。一个企业的繁荣昌盛关系到每一个公司员工的生存，企业繁荣了，员工们就会引以为豪，会更积极努力的进取，荣耀越高，成就感就越大，越明显。'),
(4, 22, '团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。任何理念都不能执着，执着生僵化，就会蜕变为形式主义，后果很糟糕。在如今企业管理者热火朝天进行的团队建设中就存在这个问题，将团队作为企业文化建设的至上准则是不恰当的，是不符合多元化的现实状况的。\r\n一个优秀的企业管理者，应该怎样管理员工?道理也很简单，那就是要给员工创造一个充分利用自己的个性将工作干得最好的条件。不一定什么都要团队化，太死板了。虽然现在的企业也都提倡创新，但如果管理者过分强调团队精神，则员工的创新精神必然受到压抑。压抑个性就是压抑创新，没有个性哪来的创新?说得极端一点，企业管理者要谨防团队建设法西斯化。团队是需要的，企业管理者在团队建设的同时要遵循一个原则，不能压抑员工的个性。在团队内部，企业管理者要给员工充分的自由，少说几句少数服从多数，要知道，聪明的人在世界上还就占少数。\r\n企业管理者应该解放思想，要有多元化的思维。不同的企业，团队的性质也不一样。要量体裁衣建设符合企业内在要求的团队，要灵活变化，别搞一刀切。如果该企业是劳动密集型企业，那你可以建设一支高度纪律性组织性的团队。如果该企业是知识密集型企业，那就要以自由主义来管理员工了，建立一支人尽其才的团队是最重要的，严格说算不上是团队，也没必要强调团队，更注重的应该是员工的个人创造力，千万别让团队束缚住员工的头脑，当然应该有的纪律和合作也是不可少的。如果企业既有创造型员工也有操作型员工，那可将团队建设重点放到操作型员工身上。需要注意的一点是，越聪明的人越倾向个人主义，这个情况，企业管理者要注意有的放矢。'),
(5, 23, '联系我们');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_content_post`
--

DROP TABLE IF EXISTS `lulu_content_post`;
CREATE TABLE IF NOT EXISTS `lulu_content_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `lulu_content_post`
--

INSERT INTO `lulu_content_post` (`id`, `content_id`, `body`) VALUES
(1, 1, 'ddddd'),
(2, 15, 'ddd'),
(3, 9, '1.背景最近项目原因使用了durandal.js和knockout.js，颇有受益。决定写一个比较浅显的总结。之前一直在用SpringMVC框架写后台，前台是用JSP+JS+标签库，算是很传统的MVC开发模式了。后来，前端用Flex还有微软的WPF做过开发，到这次，前端使用纯JS+HTML，利用knockout.js，也算是接触了几种语言下的MVVM模式。此次开发中，结合require.js和durandal.js，完成了按需加载、AMD规范以及前端页面路由。当然了，一般控件的编写和改用，还是使'),
(4, 6, '荀彧的“二虎竞食”并不是象“子美”说的那样，也没有什么香饽饽让两人抢啊！~其实他是要曹操借着天子的名义给刘备一个徐州牧的官职，然后让他去打吕布。这样就有两个结果：第一，刘备把吕布灭了，这样刘备少了三国战神的帮助，曹操就能省心了。第二，刘备要是没法灭了吕布，那吕布肯定会反扑，弄不好反到把刘备给灭了，曹操不就更省心！~但是可惜，刘备没上当！~~而“驱虎吞狼”也并完全不是三十六计中的“借刀杀人”。他其实是同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且运用刘备的忠厚老实，吕布的无谋多疑、袁术的'),
(5, 13, '根据视频的显示，火箭已经处于竖直状态，但最后却翻到　　SpaceX公司在前不久的猎鹰9号火箭测试中仍然没有成功，该公司正在分析着陆失败的原因。　　首席执行官伊隆·马斯克一直在致力于打造可重复使用的火箭，猎鹰9号已经实现了数次空间站补给任务，本次发射后将1.6吨的物资送往国际空间站。虽然龙式飞船成功进入了预定轨道，但猎鹰9号火箭的返回级没有实现一次漂亮的着陆，而是在降落平台时发生了侧翻，爆炸成了碎片。　　首席执行官伊隆·马斯克认为火箭出现了过大的横向速度，导致火箭没有处于竖直状态，最终翻到在发射台'),
(6, 4, '适配器模式定义：将两个不兼容的类纠合在一起使用，属于结构型模式，需要有Adaptee(被适配者)和Adaptor(适配器)两个身份。为何使用适配器模式我们经常碰到要将两个没有关系的类组合在一起使用，第一解决方案是：修改各自类的接口，但是如果我们没有源代码，或者，我们不愿意为了一个应用而修改各自的接口..'),
(7, 16, ''),
(8, 5, '"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘'),
(9, 7, '三名国际专家在《英国运动医学》上发表社论，认为运动对抗肥胖症效果有限，而摄取过多的糖类和碳水化合物才是需要注意的重点，专家称食品业鼓吹让消费者相信增加运动就可以忽视不健康的饮食习惯。肥胖者无需大量运动就能减肥，重点就是要少吃一点。研究显示每摄取来自糖类的150卡热量，患糖尿病的风险就比摄取来自脂肪的150卡热量高出10多倍。　　他们引用《柳叶刀》上的研究，指出不适当的饮食所导致的不健康问题，比不运动、喝酒、抽烟所导致的问题加起来还要多。他们的观点也有争议。'),
(10, 11, ''),
(11, 18, 'sss'),
(12, 19, '"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_dict`
--

DROP TABLE IF EXISTS `lulu_dict`;
CREATE TABLE IF NOT EXISTS `lulu_dict` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `value` text NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `thumb` varchar(512) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `lulu_dict`
--

INSERT INTO `lulu_dict` (`id`, `parent_id`, `category_id`, `name`, `value`, `description`, `thumb`, `status`, `sort_num`) VALUES
(3, 0, 'sex', '男', '1', '', '', 1, 100),
(4, 0, 'sex', '女', '0', '', '', 1, 100);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_dict_category`
--

DROP TABLE IF EXISTS `lulu_dict_category`;
CREATE TABLE IF NOT EXISTS `lulu_dict_category` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_dict_category`
--

INSERT INTO `lulu_dict_category` (`id`, `name`, `description`) VALUES
('political_status', '政治面貌', ''),
('sex', '性别', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_menu`
--

DROP TABLE IF EXISTS `lulu_menu`;
CREATE TABLE IF NOT EXISTS `lulu_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url` varchar(512) NOT NULL,
  `target` varchar(64) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `thumb` varchar(512) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `sort_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `lulu_menu`
--

INSERT INTO `lulu_menu` (`id`, `parent_id`, `category_id`, `name`, `url`, `target`, `description`, `thumb`, `status`, `sort_num`) VALUES
(4, 0, 'main', 'tt', '#', '_self', '', '', 1, 10),
(7, 0, 'main', '文章', 'index.php?r=post', '_self', '', '', 1, 10),
(8, 0, 'main', '关于', 'index.php?r=page', '_self', '', '', 1, 10),
(9, 8, 'main', '企业文化', 'index.php?r=page/default/detail&id=21', '_self', '', '', 1, 10),
(10, 8, 'main', '管理团队', 'index.php?r=page%2Fdefault%2Fdetail&id=22', '_self', '', '', 1, 10),
(11, 9, 'main', '测试22', '#', '_self', '', '', 1, 10),
(12, 9, 'main', '测试23', '#', '_self', '', '', 0, 10),
(13, 9, 'main', '测试24', '#', '_self', '', '', 1, 10),
(14, 12, 'main', '测试23——1', '#', '_self', '', '', 1, 10),
(15, 8, 'main', '联系我们', 'index.php?r=page%2Fdefault%2Fdetail&id=23', '_self', '', '', 1, 10),
(16, 8, 'main', '关于我们', 'index.php?r=page%2Fdefault%2Fdetail&id=20', '_self', '', '', 1, 10),
(17, 12, 'main', '测试23-2', '#', '_self', '', '', 1, 10),
(24, 4, 'main', 'dd', '#', '_self', '', '', 1, 100),
(29, 0, 'admin', '设置', '#', '_self', '', 'cog_4.png', 1, 20),
(30, 29, 'admin', '站点信息', '/system/setting/basic', '_self', '', '', 1, 1),
(31, 0, 'admin', '基础功能', '#', '_self', '', 'file_cabinet.png', 1, 40),
(32, 31, 'admin', '菜单管理', '/menu', '_self', '', '', 1, 1),
(33, 29, 'admin', '注册与访问控制', '/system/setting/access', '_self', '', '', 1, 5),
(34, 29, 'admin', 'SEO设置', '/system/setting/seo', '_self', '', '', 1, 10),
(35, 29, 'admin', '时间设置', '/system/setting/datetime', '_self', '', '', 1, 15),
(36, 29, 'admin', '邮件设置', '/system/setting/email', '_self', '', '', 1, 20),
(37, 29, 'admin', '模块设置', '/modularity', '_self', '', '', 1, 25),
(38, 31, 'admin', '分类管理', '/takonomy', '_self', '', '', 1, 5),
(39, 31, 'admin', '字典管理', '/dict', '_self', '', '', 1, 10),
(40, 0, 'admin', '用户', '#', '_self', '', 'users.png', 1, 80),
(41, 40, 'admin', '用户列表', '/user/user', '_self', '', '', 1, 1),
(42, 40, 'admin', '角色管理', '/rbac/role', '_self', '', '', 1, 5),
(43, 40, 'admin', '权限管理', '/rbac/permission', '_self', '', '', 1, 10),
(46, 0, 'admin', '内容', '#', '_self', '', 'create_write.png', 1, 60),
(47, 0, 'admin', '主题', '#', '_self', '', 'images_2.png', 1, 100),
(48, 0, 'admin', '工具', '#', '_self', '', 'tools.png', 1, 120),
(49, 0, 'admin', '首页', '/site/welcome', '_self', '', 'home.png', 1, 0),
(50, 46, 'admin', '单面管理', '/page/page', '_self', '', '', 1, 1436444895),
(51, 46, 'admin', '文章管理', '/post/post', '_self', '', '', 1, 40),
(52, 0, 'footer', '关于本站', '#', '_self', '', '', 1, 1437310069),
(53, 0, 'footer', '投放广告', '#', '_self', '', '', 1, 1437310153),
(54, 0, 'footer', '赞助本站', '#', '_self', '', '', 1, 1437310172),
(55, 0, 'main', '首页', 'index.php', '_self', '', '', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_menu_category`
--

DROP TABLE IF EXISTS `lulu_menu_category`;
CREATE TABLE IF NOT EXISTS `lulu_menu_category` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_menu_category`
--

INSERT INTO `lulu_menu_category` (`id`, `name`, `description`) VALUES
('admin', '后台菜单', ''),
('footer', '底部菜单', ''),
('main', '主导航', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_modularity`
--

DROP TABLE IF EXISTS `lulu_modularity`;
CREATE TABLE IF NOT EXISTS `lulu_modularity` (
  `id` varchar(64) NOT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `is_content` tinyint(1) NOT NULL DEFAULT '0',
  `enable_admin` tinyint(1) NOT NULL DEFAULT '0',
  `enable_home` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_modularity`
--

INSERT INTO `lulu_modularity` (`id`, `is_system`, `is_content`, `enable_admin`, `enable_home`) VALUES
('dict', 0, 0, 1, 1),
('dsf', 0, 0, 1, 0),
('menu', 0, 0, 1, 1),
('modularity', 0, 0, 1, 1),
('page', 0, 0, 1, 1),
('post', 0, 0, 1, 1),
('rbac', 0, 0, 1, 1),
('system', 0, 0, 1, 1),
('takonomy', 0, 0, 1, 1),
('user', 0, 0, 1, 1),
('yy-y', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_takonomy`
--

DROP TABLE IF EXISTS `lulu_takonomy`;
CREATE TABLE IF NOT EXISTS `lulu_takonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url_alias` varchar(64) DEFAULT NULL,
  `thumb` varchar(128) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `contents` int(11) NOT NULL DEFAULT '0',
  `sort_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `lulu_takonomy`
--

INSERT INTO `lulu_takonomy` (`id`, `parent_id`, `category_id`, `name`, `url_alias`, `thumb`, `description`, `contents`, `sort_num`) VALUES
(1, 0, '', '文章分类', 'post', NULL, '', 0, 0),
(2, 0, '', '文章test', '', NULL, '', 0, 0),
(3, 2, '', 'a', '', NULL, '', 0, 0),
(4, 3, '', 'b', 'b', NULL, '', 1, 1),
(5, 2, '', 'c', '', NULL, '', 0, 0),
(6, 0, '', 'a', '', NULL, '', 0, 0),
(7, 0, '', 'b', '', NULL, '', 0, 0),
(8, 0, '', 'c', '', NULL, '', 0, 8),
(9, 11, 'page', '页面分类', 'pgae', NULL, 'xxx', 0, 3),
(10, 12, 'page', 'page2', 'page2', NULL, 'page2', 0, 1),
(11, 14, 'page', 'page3', 'page3', NULL, 'page3', 0, 2),
(12, 13, 'page', 'gg2', 'gg2', NULL, 'xx', 0, 1),
(13, 0, 'page', 'gg', 'gg', NULL, 'gg', 0, 5),
(14, 0, 'page', 'yy', 'yy', NULL, 'yy', 0, 1),
(15, 0, 'post', 'java', '', NULL, '', 0, 1),
(16, 0, 'post', 'dotnot', '', NULL, '', 0, 2),
(17, 0, 'page', '关于', '', NULL, '', 0, 1),
(18, 16, 'post', 'asp.net', 'asp-net', NULL, '', 0, 100);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_takonomy_category`
--

DROP TABLE IF EXISTS `lulu_takonomy_category`;
CREATE TABLE IF NOT EXISTS `lulu_takonomy_category` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_takonomy_category`
--

INSERT INTO `lulu_takonomy_category` (`id`, `name`, `description`) VALUES
('page', '页面分类', ''),
('post', '文章分类', ''),
('tag', 'Tag分类', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_takonomy_content`
--

DROP TABLE IF EXISTS `lulu_takonomy_content`;
CREATE TABLE IF NOT EXISTS `lulu_takonomy_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `takonomy_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lulu_user`
--

DROP TABLE IF EXISTS `lulu_user`;
CREATE TABLE IF NOT EXISTS `lulu_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `lulu_user`
--

INSERT INTO `lulu_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin111', '4PBB6MTWO0ZNhgM8da2jONmIIhapjSlu', '$2y$13$OUWtpKpr4kG4Muyh4kB95eAVWJDIvgMfkQDWYhcmM3a2aLFirqaUe', NULL, 'admin111@admin.com', 1, 1422277168, 1437225091, 'administrator'),
(3, 'test', '', '$2y$13$af/zQm0W.ifVkGzw5c8db.tiRh/plqMBcM4zStU.tEcfQvi3BZeQG', '2', 'test@admin.com', 1, 1436063932, 1437060773, 'editor'),
(4, 'demo', '', '$2y$13$ZNeF3seZWbL4PYhrULx09.MzonXmuzMHFc3.R2c9yJjHG8iRsLBpe', NULL, 'demo@lulucms.com', 1, 1437224909, 1437224967, 'demo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
