-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 05 月 11 日 11:28
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `lulublog`
--
CREATE DATABASE IF NOT EXISTS `lulublog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lulublog`;

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `lulu_auth_assignment` (
  `user` varchar(64) NOT NULL,
  `role` varchar(64) NOT NULL,
  `created_at` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`user`,`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_assignment`
--

INSERT INTO `lulu_auth_assignment` (`user`, `role`, `created_at`, `note`) VALUES
('admin111', 'administrator', 1427599963, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_category`
--

CREATE TABLE IF NOT EXISTS `lulu_auth_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `sort_num` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `lulu_auth_category`
--

INSERT INTO `lulu_auth_category` (`id`, `name`, `type`, `sort_num`, `note`) VALUES
(1, '管理员角色', 1, 1, ''),
(2, '会员角色', 1, 1, ''),
(3, 'c', 2, 3, ''),
(5, '基本操作规则', 3, 1, ''),
(6, '基本权限操作', 2, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_permission`
--

CREATE TABLE IF NOT EXISTS `lulu_auth_permission` (
  `key` varchar(64) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `form` int(11) NOT NULL,
  `options` text,
  `default_value` text,
  `note` text,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_permission`
--

INSERT INTO `lulu_auth_permission` (`key`, `category_id`, `name`, `form`, `options`, `default_value`, `note`) VALUES
('create', 6, '增加权限', 1, '', '1', ''),
('createnews', 3, '添加新闻', 1, '', '', ''),
('createpost', 3, '增加文章', 2, '', '', ''),
('delete', 6, '删除权限', 4, '1|x\r\n2|xx\r\n3|xxx', '2', ''),
('index', 6, '查看权限', 1, '', '', ''),
('list', 6, '列表权限', 3, '', '', ''),
('update', 6, '更新权限', 2, '', '', ''),
('updatenews', 3, '更新新闻', 3, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_relation`
--

CREATE TABLE IF NOT EXISTS `lulu_auth_relation` (
  `role` varchar(64) NOT NULL,
  `permission` varchar(64) NOT NULL,
  `value` text,
  PRIMARY KEY (`role`,`permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_relation`
--

INSERT INTO `lulu_auth_relation` (`role`, `permission`, `value`) VALUES
('administrator', 'create', '0'),
('administrator', 'createnews', '1'),
('administrator', 'createpost', '3'),
('administrator', 'delete', '2,3'),
('administrator', 'index', '0'),
('administrator', 'list', ''),
('administrator', 'update', '1'),
('administrator', 'updatenews', ''),
('member_1', 'create', '1'),
('member_1', 'createnews', '0'),
('member_1', 'createpost', ''),
('member_1', 'delete', '1'),
('member_1', 'index', '0'),
('member_1', 'list', ''),
('member_1', 'update', ''),
('member_1', 'updatenews', ''),
('member_2', 'createnews', 'member_2');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_auth_role`
--

CREATE TABLE IF NOT EXISTS `lulu_auth_role` (
  `key` varchar(64) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `lulu_auth_role`
--

INSERT INTO `lulu_auth_role` (`key`, `category_id`, `name`, `created_at`, `updated_at`, `note`) VALUES
('administrator', 1, '管理员', 1427551056, 1427600194, ''),
('member_1', 2, '初级会员', 1427599089, 1427599089, ''),
('member_2', 2, '中级会员', 1427599301, 1427599301, '');

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
('sys_allow_register', '0'),
('sys_datetime_date_format', ''),
('sys_datetime_pretty_format', ''),
('sys_datetime_timezone', ''),
('sys_datetime_time_format', ''),
('sys_date_format', ''),
('sys_date_format_custom', ''),
('sys_default_role', 'subscriber'),
('sys_icp', ''),
('sys_lang', 'zh-CN'),
('sys_seo_description', 'aaa'),
('sys_seo_title', 'seo标题'),
('sys_site_description', '个人博客(yii2)'),
('sys_site_email', ''),
('sys_site_name', 'lulu blog'),
('sys_site_theme', 'blank'),
('sys_site_url', ''),
('sys_stat', 'aaa'),
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
  `is_sticky` tinyint(1) NOT NULL DEFAULT '0',
  `is_recommend` tinyint(1) NOT NULL DEFAULT '0',
  `is_headline` tinyint(1) NOT NULL DEFAULT '0',
  `flag` tinyint(4) NOT NULL DEFAULT '0',
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
  `summary` varchar(512) DEFAULT NULL,
  `thumb` varchar(256) DEFAULT NULL,
  `url_alias` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `lulu_content`
--

INSERT INTO `lulu_content` (`id`, `takonomy_id`, `user_id`, `user_name`, `last_user_id`, `last_user_name`, `created_at`, `updated_at`, `focus_count`, `favorite_count`, `view_count`, `comment_count`, `agree_count`, `against_count`, `is_sticky`, `is_recommend`, `is_headline`, `flag`, `allow_comment`, `password`, `template`, `sort_num`, `visibility`, `status`, `content_type`, `seo_title`, `seo_keywords`, `seo_description`, `title`, `summary`, `thumb`, `url_alias`) VALUES
(1, NULL, 1, '', NULL, NULL, 1429888267, 1429888267, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '习近平在亚非领导人会议上的讲话（全文）', '合作具有越来越重要的全球意义。面对新机遇新挑战，亚非国家要坚持安危与共、守望相助，把握机遇、共迎挑战，提高亚非合作水平，继续做休戚与共、同甘共苦的好朋友、好伙伴、好兄弟。　　非洲有句谚语，“一根原木盖不起一幢房屋”。中国也有句古话，“孤举者难起，众行者易趋”。亚非国家加强互利合作，能产生“一加一大于二”的积极效应。我们要坚持互利共赢、共同发展，对接发展战略，加强基础设施互联互通，推进工业、农业、人力资源开发等各领域务实合作，打造绿色能源、环保、电子商务等合作新亮点，把亚非经济互补性转化为发展互助', 'data/attachment/20150424/20150424140031_35735.jpg', ''),
(2, NULL, 1, '', NULL, NULL, 1429888331, 1429888331, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'BootStrap入门教程 (二)', '上讲回顾：Bootstrap的手脚架(Scaffolding)提供了固定(fixed)和流式(fluid)两种布局，它同时建立了一个宽达940px和12列的格网系统。基于手脚架(Scaffolding)之上，Bootstrap的基础CSS(BaseCSS)提供了一系列的基础Html页面要素，旨在为用户提供新鲜、一致的页面外观和感觉。本文将主要深入讲解排版(Typography),表格(Table),表单(Forms),按钮(Buttons)这四个方面的内容。排版(Typography)，它囊括标', 'data/attachment/20150424/20150424125736_98917.jpg', ''),
(3, NULL, 1, '', NULL, NULL, 1429891708, 1429891708, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '(fixed)和流式(fluid)两种', '上讲回顾：Bootstrap的手脚架(Scaffolding)提供了固定(fixed)和流式(fluid)两种布局，它同时建立了一个宽达940px和12列的格网系统。基于手脚架(Scaffolding)之上，Bootstrap的基础CSS(BaseCSS)提供了一系列的基础Html页面要素，旨在为用户提供新鲜、一致的页面外观和感觉。本文将主要深入讲解排版(Typography),表格(Table),表单(Forms),按钮(Buttons)这四个方面的内容。排版(Typography)，它囊括标', 'data/attachment/20150424/20150424125757_30151.jpg', ''),
(4, 16, 1, '', NULL, NULL, 1431160693, 1431160693, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, 'Java适配器模式（Adapter模式）', '适配器模式定义：将两个不兼容的类纠合在一起使用，属于结构型模式，需要有Adaptee(被适配者)和Adaptor(适配器)两个身份。为何使用适配器模式我们经常碰到要将两个没有关系的类组合在一起使用，第一解决方案是：修改各自类的接口，但是如果我们没有源代码，或者，我们不愿意为了一个应用而修改各自的接口..', 'data/attachment/20150424/20150424125806_35680.jpg', ''),
(5, NULL, 1, '', NULL, NULL, 1431162045, 1431162045, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, '驱虎吞狼', '典故来历编辑然而从字面不难理解，"驱虎吞狼"的操作者需要有高超的技术和手段，否则虎害大于狼害，后患无穷。2具体实例编辑例一:荀彧同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且利用刘备对汉室的忠诚、吕布的贪婪自大和袁术的逞强好胜来达到调动他们互相攻伐。例二:东汉未年,大将军何进召董卓入京勤王,后被十常侍计杀,董卓入京后,祸乱后宫,扰乱朝纲.引得朝野不满,群雄割据,东汉灭亡。例三:益州牧刘璋，想藉刘备之力，抵抗张鲁、曹操。不料被庞统用计，刘备反手攻击刘璋，刘璋不得已于214年投降，被流放至', 'data/attachment/20150424/20150424125850_61281.jpg', 'xx'),
(6, 15, 1, '', NULL, NULL, 1431158480, 1431158480, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, '三国中的"驱虎吞狼"和"二虎竞食"是什么意思?', '荀彧的“二虎竞食”并不是象“子美”说的那样，也没有什么香饽饽让两人抢啊！~其实他是要曹操借着天子的名义给刘备一个徐州牧的官职，然后让他去打吕布。这样就有两个结果：第一，刘备把吕布灭了，这样刘备少了三国战神的帮助，曹操就能省心了。第二，刘备要是没法灭了吕布，那吕布肯定会反扑，弄不好反到把刘备给灭了，曹操不就更省心！~但是可惜，刘备没上当！~~而“驱虎吞狼”也并完全不是三十六计中的“借刀杀人”。他其实是同时掌握了刘备、吕布、袁术三人的性格特征和心理状态，并且运用刘备的忠厚老实，吕布的无谋多疑、袁术的', 'data/attachment/20150424/20150424125917_60446.jpg', ''),
(7, NULL, 1, '', NULL, NULL, 1431162568, 1431162568, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, '专家认为饮食在减肥上的效果大于运动', '三名国际专家在《英国运动医学》上发表社论，认为运动对抗肥胖症效果有限，而摄取过多的糖类和碳水化合物才是需要注意的重点，专家称食品业鼓吹让消费者相信增加运动就可以忽视不健康的饮食习惯。肥胖者无需大量运动就能减肥，重点就是要少吃一点。研究显示每摄取来自糖类的150卡热量，患糖尿病的风险就比摄取来自脂肪的150卡热量高出10多倍。　　他们引用《柳叶刀》上的研究，指出不适当的饮食所导致的不健康问题，比不运动、喝酒、抽烟所导致的问题加起来还要多。他们的观点也有争议。', 'data/attachment/20150424/20150424130320_76950.jpg', 'tt'),
(8, NULL, 1, '', NULL, NULL, 1429888360, 1429888360, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '海尔出了一款洗衣机…手持的…要用7号电池', '　4月24日消息，此前在家博会上亮相的海尔手持式洗衣机咕咚近日在海尔官网接受预约，售价299元。　　海尔codo咕咚手持洗衣机采用三节7号电池驱动，能够产生每分钟700次频率的拍打，用“挤压洗”的洗涤方式去污，号称可洗掉酒渍、血渍等较小的污渍，避免了为一个小小的污渍就大动干戈洗整件衣服的情况。　　目前，海尔在其官网公布了这款codo咕咚手持洗衣机的预约价格为299元，将于5月正式开卖。', 'data/attachment/20150424/20150424130634_66285.jpg', 'nn'),
(9, NULL, 1, NULL, NULL, NULL, 1431158470, 1431158470, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, '由项目浅谈JS中MVVM模式', '1.背景最近项目原因使用了durandal.js和knockout.js，颇有受益。决定写一个比较浅显的总结。之前一直在用SpringMVC框架写后台，前台是用JSP+JS+标签库，算是很传统的MVC开发模式了。后来，前端用Flex还有微软的WPF做过开发，到这次，前端使用纯JS+HTML，利用knockout.js，也算是接触了几种语言下的MVVM模式。此次开发中，结合require.js和durandal.js，完成了按需加载、AMD规范以及前端页面路由。当然了，一般控件的编写和改用，还是使', 'data/attachment/20150424/20150424004759_37040.jpg', ''),
(10, NULL, 1, NULL, NULL, NULL, 1429837422, 1429837422, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'hh', 'hh', '', ''),
(11, NULL, 1, NULL, NULL, NULL, 1429889589, 1429889589, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, 'C#.NET机器学习与彩票数据分析', '接触机器学习1年多了，由于只会用C#堆代码，所以只关注.NET平台的资源，一边积累，一边收集，一边学习，所以在本站第101篇博客到来之际，分享给大家。部分用过的，会有稍微详细点的说明，其他没用过的，也是我关注的，说不定以后会用上。机器学习并不等于大数据或者数据挖掘，还有有些区别，有些东西可以用来处理大数据的问题或者数据挖掘的问题，他们之间也是有部分想通的，所以这些组件不仅仅可以用于机器学习，也可以用于数据挖掘相关的。　　按照功能把资源分为3个部分，开源综合与非综合类，以及其他网站博客等资料。都是', 'data/attachment/20150424/20150424153309_37202.jpg', ''),
(12, NULL, 1, NULL, NULL, NULL, 1429891733, 1429891733, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '嵌入式JavaScript框架 EmbedJS', '开源中国的IT公司开源软件整理计划介绍Embed.JS是一个用于嵌入式设备的JavaScript框架如：移动电话，TVs、tablets和soforth。EmbedJS强大之处在于，它拥有专门为特定平台和浏览器如iOS,Firefox，Android等提供相应的开发版本。这样就能够以最少的代码，为用户提供最佳的体验。而且假如你喜欢自己定制，可以利用其提供的EmbedJSBuildtool工具实现。EmbedJS基于Dojo实现，所以你如果熟悉DojoAPI语法，那EmbedJS将是你最佳的选择。', '', ''),
(13, 16, 1, NULL, NULL, NULL, 1431162035, 1431162035, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, 'Space X寻“猎鹰9号”失败原因：腿短站不稳', '根据视频的显示，火箭已经处于竖直状态，但最后却翻到　　SpaceX公司在前不久的猎鹰9号火箭测试中仍然没有成功，该公司正在分析着陆失败的原因。　　首席执行官伊隆·马斯克一直在致力于打造可重复使用的火箭，猎鹰9号已经实现了数次空间站补给任务，本次发射后将1.6吨的物资送往国际空间站。虽然龙式飞船成功进入了预定轨道，但猎鹰9号火箭的返回级没有实现一次漂亮的着陆，而是在降落平台时发生了侧翻，爆炸成了碎片。　　首席执行官伊隆·马斯克认为火箭出现了过大的横向速度，导致火箭没有处于竖直状态，最终翻到在发射台', '', ''),
(14, 15, 1, NULL, NULL, NULL, 1429892526, 1429892526, 0, 0, 75, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 0, 1, 1, 'post', NULL, NULL, NULL, '25张美图，贺哈勃望远镜升空25年！', '到今年4月24日，近地轨道上的哈勃空间望远镜就已经升空整整25年了。图片来源：NASA　　1990年4月24日，发现号航天飞机从美国肯尼迪中心发射升空，将哈勃空间望远镜送上了近地轨道。尽管在最初的几年里，这台望远镜备受视力模糊的困扰，但经过修复和多次维护之后，哈勃已经成为了有史以来最著名、也最重要的天文望远镜，改变了我们对于宇宙的诸多认识，更不用说它还拍摄过许多已经成为经典的绝美太空照片了。　　现在，我们不妨用一组哈勃空间望远镜拍摄的照片，来庆祝它升空25周年。木星和它的大红斑。图片来源：NAS', 'data/attachment/20150424/20150424162206_46279.jpg', ''),
(15, NULL, 1, NULL, NULL, NULL, 1431158460, 1431158460, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, 'ff', '', '', ''),
(16, NULL, 1, NULL, NULL, NULL, 1431161738, 1431161738, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'post', NULL, NULL, NULL, 'ddd', '', '', ''),
(17, NULL, 1, NULL, NULL, NULL, 1431343419, 1431343419, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '', '', 0, 1, 1, 'page', NULL, NULL, NULL, 'dd', 'dd', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_content_page`
--

CREATE TABLE IF NOT EXISTS `lulu_content_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lulu_content_page`
--

INSERT INTO `lulu_content_page` (`id`, `content_id`, `body`) VALUES
(1, 17, 'dd');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_content_post`
--

CREATE TABLE IF NOT EXISTS `lulu_content_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

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
(8, 5, ''),
(9, 7, '三名国际专家在《英国运动医学》上发表社论，认为运动对抗肥胖症效果有限，而摄取过多的糖类和碳水化合物才是需要注意的重点，专家称食品业鼓吹让消费者相信增加运动就可以忽视不健康的饮食习惯。肥胖者无需大量运动就能减肥，重点就是要少吃一点。研究显示每摄取来自糖类的150卡热量，患糖尿病的风险就比摄取来自脂肪的150卡热量高出10多倍。　　他们引用《柳叶刀》上的研究，指出不适当的饮食所导致的不健康问题，比不运动、喝酒、抽烟所导致的问题加起来还要多。他们的观点也有争议。');

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
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `sort_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `lulu_menu`
--

INSERT INTO `lulu_menu` (`id`, `parent_id`, `category_id`, `name`, `url`, `target`, `description`, `thumb`, `enabled`, `sort_num`) VALUES
(1, 0, 'admin', 'aad', 'dd', '_blank', '', '', 1, 1),
(2, 3, 'admin', 'xx', 'xx', '', '', '', 1, 10),
(3, 6, 'admin', 'tc', 'v', '', '', '', 1, 10),
(4, 0, 'main', 'tt', '#', '_self', '', '', 1, 10),
(6, 1, 'admin', 'yy', 'y', '', '', '', 1, 10),
(7, 0, 'main', '文章', 'index.php?r=post', '_self', '', '', 1, 10),
(8, 0, 'main', '单页', 'index.php?r=page', '_self', '', '', 1, 10);

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
('dd', 'xx', 'dd'),
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
('menu', 0, 0, 1, 1),
('modularity', 0, 0, 1, 1),
('page', 0, 0, 1, 0),
('post', 0, 0, 1, 0),
('system', 0, 0, 1, 1),
('takonomy', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_takonomy`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

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
(16, 0, 'post', 'dotnot', '', NULL, '', 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `lulu_takonomy_category`
--

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
('rr', 'rr', 'rr'),
('tag', 'Tag分类', ''),
('y', 'yy', '');

-- --------------------------------------------------------

--
-- 表的结构 `lulu_takonomy_content`
--

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `lulu_user`
--

INSERT INTO `lulu_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin111', '4PBB6MTWO0ZNhgM8da2jONmIIhapjSlu', '$2y$13$tGFMmA2lvR5dgcwJ2RSRGOKWZuGHd.4k6OJ8xO2aQsODaH9GuRXYS', NULL, 'admin111@admin.com', 10, 1422277168, 1422277168);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
