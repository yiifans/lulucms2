-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 12 月 16 日 15:45
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
('allow_access', 'system', '允许访问', '', 3, NULL, '*', 'BooleanRule', 10),
('deny_access', 'system', '禁止访问', '', 3, NULL, '', NULL, 1000),
('dict/dict', 'controller', '字典子项', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 35),
('dict/dict-category', 'controller', '字典管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 30),
('fragment/fragment', 'controller', '碎片管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 1437841612),
('fragment/fragment-category', 'controller', '碎片分类', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 1437841665),
('fragment/fragment1-data', 'controller', '代码碎片内容管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 1437841615),
('fragment/fragment2-data', 'controller', '静态碎片内容管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 1437841620),
('manager_admin', 'system', '管理后台', '', 1, NULL, '', 'BooleanRule', 0),
('menu/menu', 'controller', '菜单子项', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 15),
('menu/menu-category', 'controller', '菜单管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 10),
('modularity/default', 'controller', '模块管理', '', 5, NULL, 'index|首页\r\ninstall|安装\r\nactive|开启\r\ndeactive|关闭\r\nuninstall|卸载', 'ControllerRule', 5),
('page/page', 'controller', '单面管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 50),
('page/setting', 'controller', '单面设置', '', 5, NULL, 'index:get|分类(GET)\r\nindex:post|分类(POST)', 'ControllerRule', 55),
('post/post', 'controller', '文章管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 40),
('post/setting', 'controller', '文章设置', '', 5, NULL, 'index:get|分类(GET)\r\nindex:post|分类(POST)', 'ControllerRule', 45),
('rbac/permission', 'controller', '权限管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 1437841705),
('rbac/role', 'controller', '角色管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nrelation:get|设置权限(GET)\r\nrelation:post|设置权限(POST)\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 1437841695),
('site', 'controller', 'site', '', 5, NULL, 'test|test', 'ControllerRule', 1440027272),
('system/setting', 'controller', '系统设置', '', 5, NULL, 'basic:get|站点信息(GET)\r\nbasic:post|站点信息(POST)\r\naccess:get|注册与访问控制(GET)\r\naccess:post|注册与访问控制(POST)\r\nseo:get|SEO设置(GET)\r\nseo:post|SEO设置(POST)\r\ndatetime:get|时间设置(GET)\r\ndatetime:post|时间设置(POST)\r\nemail:get|邮件设置(GET)\r\nemail:post|邮件设置(POST)', 'ControllerRule', 0),
('taxonomy/taxonomy', 'controller', '分类子项', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 25),
('taxonomy/taxonomy-category', 'controller', '分类管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 20),
('theme/setting', 'controller', '主题设置', '', 5, NULL, 'index:get|编辑(GET)\r\nindex:post|编辑(POST)', 'ControllerRule', 1437918729),
('tools/cache', 'controller', '缓存管理', '', 5, NULL, 'index:get|编辑(GET)\r\nindex:post|编辑(POST)', 'ControllerRule', 1438264497),
('tools/db', 'controller', '数据库管理', '', 5, NULL, 'index:get|编辑(GET)\r\nindex:post|编辑(POST)', 'ControllerRule', 1438264591),
('user/user', 'controller', '用户管理', '', 5, NULL, 'index|首页\r\ncreate|录入\r\nupdate:get|编辑(GET)\r\nupdate:post|编辑(POST)\r\ndelete|删除', 'ControllerRule', 1437841685);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_relation`
--

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
('administrator', 'fragment/fragment', 'index,create,update:get,update:post,delete'),
('administrator', 'fragment/fragment-category', 'index,create,update:get,update:post,delete'),
('administrator', 'fragment/fragment1-data', 'index,create,update:get,update:post,delete'),
('administrator', 'fragment/fragment2-data', 'index,create,update:get,update:post,delete'),
('administrator', 'manager_admin', '1'),
('administrator', 'menu/menu', 'index,create,update:get,update:post,delete'),
('administrator', 'menu/menu-category', 'index,create,update:get,update:post,delete'),
('administrator', 'modularity/default', 'index,install,active,deactive,uninstall'),
('administrator', 'page/page', 'index,create,update:get,update:post,delete'),
('administrator', 'page/setting', 'index:get,index:post'),
('administrator', 'post/post', 'index,create,update:get,update:post,delete'),
('administrator', 'post/setting', 'index:get,index:post'),
('administrator', 'rbac/permission', 'index,create,update:get,update:post,delete'),
('administrator', 'rbac/role', 'index,create,relation:get,relation:post,update:get,update:post,delete'),
('administrator', 'site', 'test'),
('administrator', 'system/setting', 'basic:get,basic:post,access:get,access:post,seo:get,seo:post,datetime:get,datetime:post,email:get,email:post'),
('administrator', 'taxonomy/taxonomy', 'index,create,update:get,update:post,delete'),
('administrator', 'taxonomy/taxonomy-category', 'index,create,update:get,update:post,delete'),
('administrator', 'theme/setting', 'index:get,index:post'),
('administrator', 'tools/cache', 'index:get,index:post'),
('administrator', 'tools/db', 'index:get,index:post'),
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

CREATE TABLE IF NOT EXISTS `lulu_auth_role` (
  `id` varchar(64) NOT NULL,
  `category` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_role`
--

INSERT INTO `lulu_auth_role` (`id`, `category`, `name`, `description`, `is_system`) VALUES
('administrator', 'admin', '管理员', '', 1),
('demo', 'admin', '测试角色', '', 0),
('deny_access', 'system', '禁止访问', '', 1),
('deny_speak', 'system', '禁止发言', '', 1),
('editor', 'admin', '编辑', '', 0),
('guest', 'system', '游客', '', 1),
('member_1', 'member', '初级会员', '', 0),
('member_2', 'member', '中级会员', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_comment`
--

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
('page_taxonomy', 'page'),
('post_takonomy', 'post'),
('post_taxonomy', 'post'),
('sys_allow_register', '0'),
('sys_datetime_date_format', 'Y-m-d'),
('sys_datetime_pretty_format', '1'),
('sys_datetime_timezone', 'Etc/GMT-8'),
('sys_datetime_time_format', '24'),
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
('sys_theme_admin', 'dandelion'),
('sys_theme_home', 'CodingLife'),
('sys_timezone', ''),
('sys_time_format', ''),
('sys_time_format_custom', ''),
('sys_utc', ''),
('test_data_theme', 'tttccc');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_content`
--

CREATE TABLE IF NOT EXISTS `lulu_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taxonomy_id` int(11) DEFAULT NULL,
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
  `view` varchar(64) DEFAULT NULL,
  `layout` varchar(64) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `lulu_content`
--

INSERT INTO `lulu_content` (`id`, `taxonomy_id`, `user_id`, `user_name`, `last_user_id`, `last_user_name`, `created_at`, `updated_at`, `focus_count`, `favorite_count`, `view_count`, `comment_count`, `agree_count`, `against_count`, `recommend`, `headline`, `sticky`, `flag`, `allow_comment`, `password`, `view`, `layout`, `sort_num`, `visibility`, `status`, `content_type`, `seo_title`, `seo_keywords`, `seo_description`, `title`, `sub_title`, `url_alias`, `redirect_url`, `summary`, `thumb`, `thumbs`) VALUES
(1, NULL, 1, '', NULL, NULL, 1429888267, 1429888267, 0, 0, 9, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '习近平在亚非领导人会议上的讲话（全文）', NULL, NULL, NULL, '合作具有越来越重要的全球意义。面对新机遇新挑战，亚非国家要坚持安危与共、守望相助，把握机遇、共迎挑战，提高亚非合作水平，继续做休戚与共、同甘共苦的好朋友、好伙伴、好兄弟。　　非洲有句谚语，“一根原木盖不起一幢房屋”。中国也有句古话，“孤举者难起，众行者易趋”。亚非国家加强互利合作，能产生“一加一大于二”的积极效应。我们要坚持互利共赢、共同发展，对接发展战略，加强基础设施互联互通，推进工业、农业、人力资源开发等各领域务实合作，打造绿色能源、环保、电子商务等合作新亮点，把亚非经济互补性转化为发展互助', 'data/attachment/20150424/20150424140031_35735.jpg', NULL),
(2, NULL, 1, '', NULL, NULL, 1429888331, 1429888331, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'BootStrap入门教程 (二)', NULL, NULL, NULL, '上讲回顾：Bootstrap的手脚架(Scaffolding)提供了固定(fixed)和流式(fluid)两种布局，它同时建立了一个宽达940px和12列的格网系统。基于手脚架(Scaffolding)之上，Bootstrap的基础CSS(BaseCSS)提供了一系列的基础Html页面要素，旨在为用户提供新鲜、一致的页面外观和感觉。本文将主要深入讲解排版(Typography),表格(Table),表单(Forms),按钮(Buttons)这四个方面的内容。排版(Typography)，它囊括标', 'data/attachment/20150424/20150424125736_98917.jpg', NULL),
(3, NULL, 1, '', NULL, NULL, 1429891708, 1429891708, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '(fixed)和流式(fluid)两种', NULL, NULL, NULL, '上讲回顾：Bootstrap的手脚架(Scaffolding)提供了固定(fixed)和流式(fluid)两种布局，它同时建立了一个宽达940px和12列的格网系统。基于手脚架(Scaffolding)之上，Bootstrap的基础CSS(BaseCSS)提供了一系列的基础Html页面要素，旨在为用户提供新鲜、一致的页面外观和感觉。本文将主要深入讲解排版(Typography),表格(Table),表单(Forms),按钮(Buttons)这四个方面的内容。排版(Typography)，它囊括标', 'data/attachment/20150424/20150424125757_30151.jpg', NULL),
(4, 16, 1, '', NULL, NULL, 1431160693, 1431160693, 0, 0, 22, 0, 0, 0, 0, 0, 0, 0, 1, '', '', NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'Java适配器模式（Adapter模式）', NULL, NULL, NULL, '适配器模式定义：将两个不兼容的类纠合在一起使用，属于结构型模式，需要有Adaptee(被适配者)和Adaptor(适配器)两个身份。为何使用适配器模式我们经常碰到要将两个没有关系的类组合在一起使用，第一解决方案是：修改各自类的接口，但是如果我们没有源代码，或者，我们不愿意为了一个应用而修改各自的接口..', 'data/attachment/20150424/20150424125806_35680.jpg', NULL),
(5, NULL, 1, '', NULL, NULL, 1431162045, 1435468665, 0, 0, 10, 0, 0, 0, 0, 0, 0, 0, 1, '', '', NULL, 0, 1, 1, 'post', '', '', '', '驱虎吞狼', '', '', '', '典故来历编辑然而从字面不难理解，"驱虎吞狼"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘备之力，抵抗张鲁、曹操。不料被庞统用计，刘备反手攻击刘璋，刘璋不得已于214年投降，被流放至', '', NULL),
(6, 15, 1, '', NULL, NULL, 1431158480, 1431158480, 0, 0, 12, 0, 0, 0, 0, 0, 0, 0, 1, '', '', NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '三国中的"驱虎吞狼"和"二虎竞食"是什么意思?', NULL, NULL, NULL, '荀彧的“二虎竞食”并不是象“子美”说的那样，也没有什么香饽饽让两人抢啊！~其实他是要曹操借着天子的名义给刘备一个徐州牧的官职，然后让他去打吕布。这样就有两个结果：第一，刘备把吕布灭了，这样刘备少了三国战神的帮助，曹操就能省心了。第二，刘备要是没法灭了吕布，那吕布肯定会反扑，弄不好反到把刘备给灭了，曹操不就更省心！~但是可惜，刘备没上当！~~而“驱虎吞狼”也并完全不是三十六计中的“借刀杀人”。他其实是同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且运用刘备的忠厚老实，吕布的无谋多疑、袁术的', 'data/attachment/20150424/20150424125917_60446.jpg', NULL),
(7, 19, 1, '', NULL, NULL, 1431162568, 1449577788, 0, 0, 76, 0, 0, 0, 1, 2, 3, 0, 1, '', '', '', 0, 1, 1, 'post', '', '', '', '专家认为饮食在减肥上的效果大于运动', '', '', '', '三名国际专家在《英国运动医学》上发表社论，认为运动对抗肥胖症效果有限，而摄取过多的糖类和碳水化合物才是需要注意的重点，专家称食品业鼓吹让消费者相信增加运动就可以忽视不健康的饮食习惯。肥胖者无需大量运动就能减肥，重点就是要少吃一点。研究显示每摄取来自糖类的150卡热量，患糖尿病的风险就比摄取来自脂肪的150卡热量高出10多倍。　　他们引用《柳叶刀》上的研究，指出不适当的饮食所导致的不健康问题，比不运动、喝酒、抽烟所导致的问题加起来还要多。他们的观点也有争议。', 'data/attachment/20150424/20150424130320_76950.jpg', NULL),
(8, NULL, 1, '', NULL, NULL, 1429888360, 1429888360, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '海尔出了一款洗衣机…手持的…要用7号电池', NULL, NULL, NULL, '　4月24日消息，此前在家博会上亮相的海尔手持式洗衣机咕咚近日在海尔官网接受预约，售价299元。　　海尔codo咕咚手持洗衣机采用三节7号电池驱动，能够产生每分钟700次频率的拍打，用“挤压洗”的洗涤方式去污，号称可洗掉酒渍、血渍等较小的污渍，避免了为一个小小的污渍就大动干戈洗整件衣服的情况。　　目前，海尔在其官网公布了这款codo咕咚手持洗衣机的预约价格为299元，将于5月正式开卖。', 'data/attachment/20150424/20150424130634_66285.jpg', NULL),
(9, NULL, 1, NULL, NULL, NULL, 1431158470, 1431158470, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, '', '', NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '由项目浅谈JS中MVVM模式', NULL, NULL, NULL, '1.背景最近项目原因使用了durandal.js和knockout.js，颇有受益。决定写一个比较浅显的总结。之前一直在用SpringMVC框架写后台，前台是用JSP+JS+标签库，算是很传统的MVC开发模式了。后来，前端用Flex还有微软的WPF做过开发，到这次，前端使用纯JS+HTML，利用knockout.js，也算是接触了几种语言下的MVVM模式。此次开发中，结合require.js和durandal.js，完成了按需加载、AMD规范以及前端页面路由。当然了，一般控件的编写和改用，还是使', 'data/attachment/20150424/20150424004759_37040.jpg', NULL),
(10, NULL, 1, NULL, NULL, NULL, 1429837422, 1429837422, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'hh', NULL, NULL, NULL, 'hh', '', NULL),
(11, NULL, 1, NULL, NULL, NULL, 1429889589, 1429889589, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'C#.NET机器学习与彩票数据分析', NULL, NULL, NULL, '接触机器学习1年多了，由于只会用C#堆代码，所以只关注.NET平台的资源，一边积累，一边收集，一边学习，所以在本站第101篇博客到来之际，分享给大家。部分用过的，会有稍微详细点的说明，其他没用过的，也是我关注的，说不定以后会用上。机器学习并不等于大数据或者数据挖掘，还有有些区别，有些东西可以用来处理大数据的问题或者数据挖掘的问题，他们之间也是有部分想通的，所以这些组件不仅仅可以用于机器学习，也可以用于数据挖掘相关的。　　按照功能把资源分为3个部分，开源综合与非综合类，以及其他网站博客等资料。都是', 'data/attachment/20150424/20150424153309_37202.jpg', NULL),
(12, NULL, 1, NULL, NULL, NULL, 1429891733, 1429891733, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '嵌入式JavaScript框架 EmbedJS', NULL, NULL, NULL, '开源中国的IT公司开源软件整理计划介绍Embed.JS是一个用于嵌入式设备的JavaScript框架如：移动电话，TVs、tablets和soforth。EmbedJS强大之处在于，它拥有专门为特定平台和浏览器如iOS,Firefox，Android等提供相应的开发版本。这样就能够以最少的代码，为用户提供最佳的体验。而且假如你喜欢自己定制，可以利用其提供的EmbedJSBuildtool工具实现。EmbedJS基于Dojo实现，所以你如果熟悉DojoAPI语法，那EmbedJS将是你最佳的选择。', '', NULL),
(13, 16, 1, NULL, NULL, NULL, 1431162035, 1431162035, 0, 0, 7, 0, 0, 0, 0, 0, 0, 0, 1, '', '', NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'Space X寻“猎鹰9号”失败原因：腿短站不稳', NULL, NULL, NULL, '根据视频的显示，火箭已经处于竖直状态，但最后却翻到　　SpaceX公司在前不久的猎鹰9号火箭测试中仍然没有成功，该公司正在分析着陆失败的原因。　　首席执行官伊隆·马斯克一直在致力于打造可重复使用的火箭，猎鹰9号已经实现了数次空间站补给任务，本次发射后将1.6吨的物资送往国际空间站。虽然龙式飞船成功进入了预定轨道，但猎鹰9号火箭的返回级没有实现一次漂亮的着陆，而是在降落平台时发生了侧翻，爆炸成了碎片。　　首席执行官伊隆·马斯克认为火箭出现了过大的横向速度，导致火箭没有处于竖直状态，最终翻到在发射台', '', NULL),
(14, 15, 1, NULL, NULL, NULL, 1429892526, 1429892526, 0, 0, 77, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '25张美图，贺哈勃望远镜升空25年！', NULL, NULL, NULL, '到今年4月24日，近地轨道上的哈勃空间望远镜就已经升空整整25年了。图片来源：NASA　　1990年4月24日，发现号航天飞机从美国肯尼迪中心发射升空，将哈勃空间望远镜送上了近地轨道。尽管在最初的几年里，这台望远镜备受视力模糊的困扰，但经过修复和多次维护之后，哈勃已经成为了有史以来最著名、也最重要的天文望远镜，改变了我们对于宇宙的诸多认识，更不用说它还拍摄过许多已经成为经典的绝美太空照片了。　　现在，我们不妨用一组哈勃空间望远镜拍摄的照片，来庆祝它升空25周年。木星和它的大红斑。图片来源：NAS', 'data/attachment/20150424/20150424162206_46279.jpg', NULL),
(16, NULL, 1, NULL, NULL, NULL, 1431856521, 1450275319, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', '', 0, 1, 1, 'post', '', '', '', 'ddd', '', '', '', '', '', NULL),
(18, NULL, 1, 'admin111', NULL, NULL, 1434635391, 1434635391, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 1, '', '', NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'ateaa', NULL, NULL, NULL, 'sss', '', NULL),
(19, 16, 1, 'admin111', NULL, NULL, 1434635464, 1449328440, 0, 0, 19, 0, 0, 0, 3, NULL, NULL, 0, 1, '', '', '', 0, 1, 1, 'post', '', '', '', 'aaaaaa', '', '', '', '"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘', '', NULL),
(20, 17, 1, 'admin111', NULL, NULL, 1434977081, 1437580617, 0, 0, 12, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', NULL, 0, 1, 1, 'page', '', '', '', '关于我们', '', '', '', 'LuLuCMS是一款基于php5+mysql5开发的多功能开源的网站内容管理系统。使用高性能的PHP5的web应用程序开发框架YII构建，具有操作简单、稳定、安全、高效、跨平台等特点。采用MVC设计模式，模板定制方便灵活，内置小挂工具，方便制作各类功能和效果，LuLuCMS可用于企业建站、个人博客、资讯门户、图片站等各类型站点。特点：1.开源免费无论是个人还是企业展示型网站均可用本系统来完成2.数据调用方便快捷自主研发的数据调用模块，能快速调用各类型数据，方便建站3.应用范围广这套系统不是企业网', '', NULL),
(21, 17, 1, 'admin111', NULL, NULL, 1434977117, 1437580409, 0, 0, 27, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', NULL, 0, 1, 1, 'page', '', '', '', '企业文化', '', '', '', '迪尔和肯尼迪把企业文化整个理论系统概述为5个要素，即企业环境、价值观、英雄人物、文化仪式和文化网络。企业环境是指企业的性质、企业的经营方向、外部环境、企业的社会形象、与外界的联系等方面。它往往决定企业的行为。价值观是指企业内成员对某个事件或某种行为好与坏、善与恶、正确与错误、是否值得仿效的一致认识。价值观是企业文化的核心，统一的价值观使企业内成员在判断自己行为时具有统一的标准，并以此来选择自己的行为。英雄人物是指企业文化的核心人物或企业文化的人格化，其作用在于作为一种活的样板，给企业中其他员工提', 'data/attachment/20150722/20150722155329_29162.jpg', NULL),
(22, 17, 1, 'admin111', NULL, NULL, 1434977141, 1449577848, 0, 0, 69, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', '', 0, 1, 1, 'page', '', '', '', '管理团队', '', '', '', '团队是现代企业管理中战斗的核心，几乎没有一家企业不谈团队，好象团队就是企业做大做强的灵丹妙药，只要抓紧团队建设就能有锦锈前程了。团队是个好东西，但怎样的团队才算一个好团队，怎样才能运作好一个团队呢？却是许多企业管理者不甚了然的，于是在企业团队建设的过程中就出现了许多弊病，例如从理论著作中生搬硬套到团队运作里面，是很难产生好团队的。任何理念都不能执着，执着生僵化，就会蜕变为形式主义，后果很糟糕。在如今企业管理者热火朝天进行的团队建设中就存在这个问题，将团队作为企业文化建设的至上准则是不恰当的，是不', 'data/attachment/20150722/20150722155252_22766.jpg', NULL),
(23, 17, 1, 'admin111', NULL, NULL, 1434977339, 1437319829, 0, 0, 32, 0, 0, 0, NULL, NULL, NULL, 0, 1, '', '', NULL, 0, 1, 1, 'page', '', '', '', '联系我们', '', '', '', '联系我们', 'data/attachment/20150719/20150719153029_75357.jpg', NULL),
(24, NULL, 1, 'admin111', NULL, NULL, 1441025947, 1450275325, 0, 0, 2, 0, 0, 0, 3, 1, 4, 0, 1, NULL, '', '', 1441025905, 1, 1, 'post', '', '', '', 'tes', 'd', 's', '', 's', '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_content_page`
--

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

CREATE TABLE IF NOT EXISTS `lulu_content_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `lulu_content_post`
--

INSERT INTO `lulu_content_post` (`id`, `content_id`, `body`) VALUES
(1, 1, 'ddddd'),
(3, 9, '1.背景最近项目原因使用了durandal.js和knockout.js，颇有受益。决定写一个比较浅显的总结。之前一直在用SpringMVC框架写后台，前台是用JSP+JS+标签库，算是很传统的MVC开发模式了。后来，前端用Flex还有微软的WPF做过开发，到这次，前端使用纯JS+HTML，利用knockout.js，也算是接触了几种语言下的MVVM模式。此次开发中，结合require.js和durandal.js，完成了按需加载、AMD规范以及前端页面路由。当然了，一般控件的编写和改用，还是使'),
(4, 6, '荀彧的“二虎竞食”并不是象“子美”说的那样，也没有什么香饽饽让两人抢啊！~其实他是要曹操借着天子的名义给刘备一个徐州牧的官职，然后让他去打吕布。这样就有两个结果：第一，刘备把吕布灭了，这样刘备少了三国战神的帮助，曹操就能省心了。第二，刘备要是没法灭了吕布，那吕布肯定会反扑，弄不好反到把刘备给灭了，曹操不就更省心！~但是可惜，刘备没上当！~~而“驱虎吞狼”也并完全不是三十六计中的“借刀杀人”。他其实是同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且运用刘备的忠厚老实，吕布的无谋多疑、袁术的'),
(5, 13, '根据视频的显示，火箭已经处于竖直状态，但最后却翻到　　SpaceX公司在前不久的猎鹰9号火箭测试中仍然没有成功，该公司正在分析着陆失败的原因。　　首席执行官伊隆·马斯克一直在致力于打造可重复使用的火箭，猎鹰9号已经实现了数次空间站补给任务，本次发射后将1.6吨的物资送往国际空间站。虽然龙式飞船成功进入了预定轨道，但猎鹰9号火箭的返回级没有实现一次漂亮的着陆，而是在降落平台时发生了侧翻，爆炸成了碎片。　　首席执行官伊隆·马斯克认为火箭出现了过大的横向速度，导致火箭没有处于竖直状态，最终翻到在发射台'),
(6, 4, '适配器模式定义：将两个不兼容的类纠合在一起使用，属于结构型模式，需要有Adaptee(被适配者)和Adaptor(适配器)两个身份。为何使用适配器模式我们经常碰到要将两个没有关系的类组合在一起使用，第一解决方案是：修改各自类的接口，但是如果我们没有源代码，或者，我们不愿意为了一个应用而修改各自的接口..'),
(7, 16, ''),
(8, 5, '"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘'),
(9, 7, '三名国际专家在《英国运动医学》上发表社论，认为运动对抗肥胖症效果有限，而摄取过多的糖类和碳水化合物才是需要注意的重点，专家称食品业鼓吹让消费者相信增加运动就可以忽视不健康的饮食习惯。肥胖者无需大量运动就能减肥，重点就是要少吃一点。研究显示每摄取来自糖类的150卡热量，患糖尿病的风险就比摄取来自脂肪的150卡热量高出10多倍。　　他们引用《柳叶刀》上的研究，指出不适当的饮食所导致的不健康问题，比不运动、喝酒、抽烟所导致的问题加起来还要多。他们的观点也有争议。'),
(10, 11, ''),
(11, 18, 'sss'),
(12, 19, '"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘'),
(13, 24, 's');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_dict`
--

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
-- 表的结构 `lulu_fragment`
--

CREATE TABLE IF NOT EXISTS `lulu_fragment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `lulu_fragment`
--

INSERT INTO `lulu_fragment` (`id`, `category_id`, `name`, `description`, `type`) VALUES
(1, 3, 'Yii2高级视频', 'sss', 1),
(2, 0, '代码碎片', '森', 1),
(3, 1, '首页焦点图', '首页焦点图', 2),
(4, 0, '代码碎片2', '', 1),
(5, 1, '首页3个介绍', '', 2),
(6, 1, '我们的产品', '', 2),
(7, 1, '最新资讯', '', 2),
(8, 1, '为什么选择我们', '', 2),
(9, 0, '我们的客户', '', 2),
(10, 1, '热门帖子', '', 2);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_fragment1_data`
--

CREATE TABLE IF NOT EXISTS `lulu_fragment1_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fragment_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(64) DEFAULT NULL,
  `sort_num` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `lulu_fragment1_data`
--

INSERT INTO `lulu_fragment1_data` (`id`, `fragment_id`, `title`, `content`, `created_at`, `created_by`, `sort_num`, `status`) VALUES
(1, 1, 'Yii2视频', '<embed src="http://player.youku.com/player.php/sid/XODgwOTg0MTY0/v.swf" allowFullScreen="true" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>', 1437844763, NULL, 1437746627, 1),
(3, 4, '上上上上上', '上上上上上', 0, NULL, 1437748391, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_fragment2_data`
--

CREATE TABLE IF NOT EXISTS `lulu_fragment2_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fragment_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `title_format` varchar(64) DEFAULT NULL,
  `thumb` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `sub_title` varchar(256) DEFAULT NULL,
  `summary` varchar(512) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(64) DEFAULT NULL,
  `sort_num` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `lulu_fragment2_data`
--

INSERT INTO `lulu_fragment2_data` (`id`, `fragment_id`, `title`, `title_format`, `thumb`, `url`, `sub_title`, `summary`, `created_at`, `created_by`, `sort_num`, `status`) VALUES
(1, 3, 'LuLu CMS', NULL, 'data/attachment/20150725/20150725103733_75876.jpg', '', 'one powerful cms based on Yii2 Framework', '简介：乔任梁，1987年10月15日出生于上海，中国歌手，演员。大学毕业于上海电机学院。曾是全国跳高冠军，国家二级运动', 1437750011, NULL, 1437749991, 1),
(2, 3, '表党中央', NULL, 'data/attachment/20150725/20150725103741_11818.jpg', '', '向大会的召开表示热烈的祝贺', '表党中央，向大会的召开表示热烈的祝贺！向全国各族各界青年和青年学生、向广大海外中华青年，表示诚挚的问候！', 1437750194, NULL, 1437750189, 1),
(3, 3, '导和共青团', NULL, 'data/attachment/20150725/20150725103749_98656.jpg', '', '各级青联和学联组织围绕中心', '导和共青团帮助指导下，各级青联和学联组织围绕中心、服务大局，积极组织青年、宣传青年', 1437750206, NULL, 1437750198, 1),
(5, 5, '行业优势', NULL, 'data/attachment/20150725/20150725041532_65340.png', '', '', '点和规律，为广大青年成长成才、建功立业创造良好环境和条件，帮助和支持广大青年在时代的舞台上展现风采、发光发热，努力', 1437797732, NULL, 1437797686, 1),
(6, 5, '解决方案', NULL, 'data/attachment/20150725/20150725041627_72781.png', '', '', '2015年6月16日 - 节目中三对夫妇类型不同,个性迥异,其中乔任梁和徐璐这对年龄最小的“慌张夫妇”在节目中的各种粉红浪漫可谓虐遍...', 1437797787, NULL, 1437797741, 1),
(7, 5, '环境保护', NULL, 'data/attachment/20150725/20150725041725_55513.png', '', '', '电影《魔卡行动》新剧照1P这是看到了什么？帅呆赞！帅的好想看！！！#乔任梁##灭楼组八周年生日快乐#你是火...', 1437797845, NULL, 1437797802, 1),
(8, 6, '多媒体', NULL, 'data/attachment/20150725/20150725042909_50671.jpg', '', '', '南都讯记者 程姝雯 今天（7月23日）下午，国家审计署发布6月份重大政策跟踪审计结果公告，其列出的问题清单显示，在铁路建设项', 1437798549, NULL, 1437798385, 1),
(9, 6, '互联网', NULL, 'data/attachment/20150725/20150725042951_33337.jpg', '', '', '2012年11月起实施的《铁路建设项目变更设计管理办法》中规定，I类变更设计一般在30个工作日内完成批复，需要补充材料的，在资料补充后20个工作日内另行批复', 1437798591, NULL, 1437798553, 1),
(10, 6, '广告业', NULL, 'data/attachment/20150725/20150725043026_55060.jpg', '', '', '今年6月，国家审计署共对29个省（区、市）和36个中央部门和企业在稳增长促改革调结构惠民生防风险政策的措施落实情况进行跟踪审计，共抽查了362个单位和258个建设项目，涉及投资额7149.06亿元。', 1437798626, NULL, 1437798597, 1),
(11, 7, '上半年全国信访总量下降18% 进京上访降', NULL, '', '', '', '　上半年进京上访量下降超过20%\r\n　　与会的省级信访部门一把手、中央国家机关分管信访工作的负责人普遍觉得，这是信访改革走到关键节点的一次重要会议。“在深圳开，特别切题”，舒晓琴在会上强调，开弓没有回头箭，改革“只能加速', 1437799538, NULL, 1437799463, 1),
(12, 7, '英媒关注中国是否放开二胎政策问题', NULL, '', '', '', '报道称，最近联合国关于老龄化人口的报告显示，虽然中国是世界上人口最多的国家，但自20世纪90年代以来的出生率下降意味着其人口老龄化要快于其他许多发展中国家。根据联合国的估算，到2050年，中国60岁以上的人口将近4.4亿。', 1437799598, NULL, 1437799554, 1),
(13, 8, '我们团队具有资深行业经验的专业人士', NULL, '', '', '', '我们团队由具有资深行业经验的创意策划、设计开发、多媒体创作、营销推广等专业人士组成，每一位成员都具有服务国内外知名企业的经验及成功案例。凭借这样的经验与技术优势，2ECS不像某些同业只专注于某一特定行业的解决方案，无论您是来自任何行业的尊贵客户，我们都能竭力为您打造专属与精准的互联网及多媒体服务。', 1437816571, NULL, 1437816515, 1),
(14, 8, '商业---- 我们追求技术及服务的不断创新', NULL, '', '', '', '我们追求技术及服务的不断创新。我们不是用一个产品“搞定”所有客户，我们完全根据您的需求，为您打造最个性和最匹配您公司业务的网站及IT产品；同时，我们没有一成不变和“繁文缛节”的管理模式，根据每一个客户，提供您最方便快捷的服务模式。', 1437816590, NULL, 1437816574, 1),
(15, 8, '我们承诺的是高品质的产品与服务', NULL, '', '', '', '我们没有庞大的运营负担及落后的业绩提成制度，所以能帮助您以最低廉的价格实现您的愿望。然而我们承诺的是高品质的产品与服务，竭力确保您的项目达到预期的目标，所以2ECS也从不依赖以价格战来求生存。我们为每一个客户提供的服务，都使客户感觉“物有所值，物超所值”！', 1437816607, NULL, 1437816597, 1),
(16, 8, '我们团队成员均是各行业精英人员', NULL, '', '', '', '我们团队成员均是来自于行业优秀公司的精英人员，我们长期服务于各行业高端客户，其服务水平与服务态度深得客户认可，自成立以来，未发生一起项目纠纷或退单事件，以专业水平树立了良好的服务品牌。', 1437816623, NULL, 1437816614, 1),
(17, 9, 'CLEVER', NULL, 'data/attachment/20150725/20150725095924_65154.png', '', '', '', 1437818364, NULL, 1437818295, 1),
(18, 9, 'TU42', NULL, 'data/attachment/20150725/20150725095936_13048.png', '', '', '', 1437818376, NULL, 1437818367, 1),
(19, 9, 'STARCORP', NULL, 'data/attachment/20150725/20150725095959_26723.png', '', '', '', 1437818399, NULL, 1437818378, 1),
(20, 9, 'SECOND', NULL, 'data/attachment/20150725/20150725100015_52778.png', '', '', '', 1437818415, NULL, 1437818401, 1),
(21, 9, 'FOREVER', NULL, 'data/attachment/20150725/20150725100032_86360.png', '', '', '', 1437818432, NULL, 1437818418, 1),
(22, 10, '理论和技术无缝衔接', NULL, 'data/attachment/20150725/20150725101503_20972.jpg', '', '', '各城市轨道交通集团、轨道车辆厂、铁路工程局等单位签订战略合作协议实施订单培养。采取定点招生、订单培养、定向分配的方式招收成都地铁、青岛地铁、宁波地铁、无锡地铁、苏州地铁、重', 1437819303, NULL, 1437819001, 1),
(23, 10, '揭密黑客轻易成为百万富翁之路', NULL, 'data/attachment/20150725/20150725102225_20700.jpg', '', '', '黑客赚钱是个众所周知的事实。但是，这个行业有多赚钱？黑客们又是怎样进行内部交易以避免互相倾轧', 1437819356, NULL, 1437819307, 1),
(24, 10, '工在要', NULL, '', '在', '在要在要', '要', 1438422710, NULL, 1438422689, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_fragment_category`
--

CREATE TABLE IF NOT EXISTS `lulu_fragment_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `lulu_fragment_category`
--

INSERT INTO `lulu_fragment_category` (`id`, `name`, `type`) VALUES
(1, '首页碎片', 2),
(2, '静态分类2', 2),
(3, '首页碎片', 1),
(4, '代码分类2', 1);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_menu`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

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
(38, 31, 'admin', '分类管理', '/taxonomy', '_self', '', '', 1, 5),
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
(55, 0, 'main', '首页', 'index.php', '_self', '', '', 1, 0),
(56, 0, 'admin', '碎片', '#', '_self', '', 'documents_1.png', 1, 70),
(57, 56, 'admin', '代码碎片', '/fragment/fragment/index&type=1', '_self', '', '', 1, 1437665304),
(58, 56, 'admin', '静态碎片', '/fragment/fragment/index&type=2', '_self', '', '', 1, 1437665686),
(59, 56, 'admin', '碎片分类', '/fragment/fragment-category', '_self', '', '', 1, 1437665739),
(60, 47, 'admin', '主题设置', '/theme/setting', '_self', '', '', 1, 1437875675),
(61, 48, 'admin', '缓存管理', '/tools/cache', '_self', '', '', 1, 1438095271),
(62, 48, 'admin', '数据库管理', '/tools/db', '_self', '', '', 1, 1438095412),
(63, 48, 'admin', 's', 'd', '_self', '', '', 1, 1438095910);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_menu_category`
--

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
('footer1', '底部1', ''),
('footer2', '底部2', ''),
('footer3', '底部3', ''),
('main', '主导航', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_modularity`
--

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
('fragment', 0, 0, 1, 0),
('install', 0, 0, 1, 1),
('menu', 0, 0, 1, 1),
('modularity', 0, 0, 1, 1),
('page', 0, 0, 1, 1),
('post', 0, 0, 1, 1),
('rbac', 0, 0, 1, 1),
('system', 0, 0, 1, 1),
('taxonomy', 0, 0, 1, 1),
('theme', 0, 0, 1, 0),
('tools', 0, 0, 1, 1),
('user', 0, 0, 1, 1),
('yy-y', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_taxonomy`
--

CREATE TABLE IF NOT EXISTS `lulu_taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `url_alias` varchar(64) DEFAULT NULL,
  `redirect_url` varchar(128) DEFAULT NULL,
  `thumb` varchar(128) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `page_size` int(11) DEFAULT NULL,
  `list_view` varchar(64) DEFAULT NULL,
  `list_layout` varchar(64) DEFAULT NULL,
  `detail_view` varchar(64) DEFAULT NULL,
  `detail_layout` varchar(64) DEFAULT NULL,
  `seo_title` varchar(256) DEFAULT NULL,
  `seo_keywords` varchar(256) DEFAULT NULL,
  `seo_description` varchar(256) DEFAULT NULL,
  `contents` int(11) NOT NULL DEFAULT '0',
  `sort_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `lulu_taxonomy`
--

INSERT INTO `lulu_taxonomy` (`id`, `parent_id`, `category_id`, `name`, `url_alias`, `redirect_url`, `thumb`, `description`, `page_size`, `list_view`, `list_layout`, `detail_view`, `detail_layout`, `seo_title`, `seo_keywords`, `seo_description`, `contents`, `sort_num`) VALUES
(1, 0, '', '文章分类', 'post', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(2, 0, '', '文章test', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(3, 2, '', 'a', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(4, 3, '', 'b', 'b', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(5, 2, '', 'c', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(6, 0, '', 'a', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(7, 0, '', 'b', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(8, 0, '', 'c', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 8),
(9, 11, 'page', '页面分类', 'pgae', NULL, NULL, 'xxx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3),
(10, 12, 'page', 'page2', 'page2', NULL, NULL, 'page2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(11, 14, 'page', 'page3', 'page3', NULL, NULL, 'page3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2),
(12, 13, 'page', 'gg2', 'gg2', NULL, NULL, 'xx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(13, 0, 'page', 'gg', 'gg', NULL, NULL, 'gg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 5),
(14, 0, 'page', 'yy', 'yy', NULL, NULL, 'yy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(15, 0, 'post', 'java', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(16, 0, 'post', 'dotnot', '', '', '', '', NULL, '', '', '', '', '', '', '', 0, 2),
(17, 0, 'page', '关于', '', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1),
(18, 16, 'post', 'asp.net', 'asp-net', '', '', '', 2, 'list_default', 'list_layout', 'detail_default', 'detail_layout', 'seo_title', 'seo_keywords', 'seo_description', 0, 100),
(19, 0, 'post', 'php', '', NULL, NULL, 'php是世界上最好的语言', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1437825794);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_taxonomy_category`
--

CREATE TABLE IF NOT EXISTS `lulu_taxonomy_category` (
  `id` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_taxonomy_category`
--

INSERT INTO `lulu_taxonomy_category` (`id`, `name`, `description`) VALUES
('page', '页面分类', ''),
('post', '文章分类', ''),
('tag', 'Tag分类', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_taxonomy_content`
--

CREATE TABLE IF NOT EXISTS `lulu_taxonomy_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `takonomy_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `lulu_user`
--

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
(1, 'admin111', '4PBB6MTWO0ZNhgM8da2jONmIIhapjSlu', '$2y$13$EgcZe15RcT6r3FwunLOg8.suXwPYHwkDHRNf0y4/6IP7Vjca/3Khu', NULL, 'admin111@admin.com', 1, 1422277168, 1437848160, 'administrator'),
(3, 'test', '', '$2y$13$S8UW2MW4RGO/CJhqWNO7J.jjlyVnMuFBF7HGNjZMCdY5gm/6fpqaC', '2', 'test@admin.com', 1, 1436063932, 1450196715, 'editor'),
(4, 'demo', '', '$2y$13$ZNeF3seZWbL4PYhrULx09.MzonXmuzMHFc3.R2c9yJjHG8iRsLBpe', NULL, 'demo@lulucms.com', 1, 1437224909, 1437224967, 'demo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
