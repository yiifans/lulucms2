<?php

namespace common\includes;


/**
 * ChannelController implements the CRUD actions for Channel model.
 */
class SqlData
{
	public static $initFields=[
		['name'=>'标题',		'field_name'=>'title',			'type'=>'varchar',	'length'=>128,	'is_null'=>FALSE,'is_main'=>TRUE,'is_sys'=>TRUE,],
		['name'=>'标题格式',	'field_name'=>'title_format',	'type'=>'varchar',	'length'=>128,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE,],
		['name'=>'自定义属性',	'field_name'=>'att',			'type'=>'tinyint',	'length'=>4,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		//['name'=>'属性2',	'field_name'=>'att2',			'type'=>'tinyint',	'length'=>4,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		//['name'=>'属性3',	'field_name'=>'att3',			'type'=>'tinyint',	'length'=>4,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		['name'=>'聚合标签',	'field_name'=>'flag',			'type'=>'tinyint',	'length'=>4,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		['name'=>'状态',		'field_name'=>'status',			'type'=>'tinyint',	'length'=>1,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		['name'=>'标题图片',	'field_name'=>'title_pic',		'type'=>'varchar',	'length'=>128,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		['name'=>'转向连接',	'field_name'=>'redirect_url',	'type'=>'varchar',	'length'=>128,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		['name'=>'关键字',	'field_name'=>'keywords',		'type'=>'varchar',	'length'=>128,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		['name'=>'副标题',	'field_name'=>'sub_title',		'type'=>'varchar',	'length'=>128,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		['name'=>'简介',		'field_name'=>'summary',			'type'=>'varchar',	'length'=>512,	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>TRUE],
		['name'=>'内容',		'field_name'=>'content',			'type'=>'text',		'length'=>'',	'is_null'=>TRUE,'is_main'=>TRUE,'is_sys'=>FALSE],
	];
	
	private static $createTableSql="CREATE TABLE IF NOT EXISTS `{tablename}` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`channel_id` int(11) NOT NULL,
			`user_id` int(11) NOT NULL,
			`user_name` varchar(80) NOT NULL,
			`publish_time` timestamp NOT NULL,
			`modify_time` timestamp NOT NULL,
			`att1` tinyint(4) NOT NULL DEFAULT '0',
			`att2` tinyint(4) NOT NULL DEFAULT '0',
			`att3` tinyint(4) NOT NULL DEFAULT '0',
			`flag` tinyint(4) NOT NULL DEFAULT '0',
			`views` int(11) NOT NULL DEFAULT '0',
  			`commonts` int(11) NOT NULL DEFAULT '0',
			`allow_commont` tinyint(1) NOT NULL DEFAULT '1',
			`detail_tpl` varchar(64) NULL,
			`status` tinyint(1) NOT NULL DEFAULT '1',
			`title` varchar(128) NOT NULL,
			`title_format` varchar(128) NULL,
			`title_pic` varchar(128) NULL,
			`is_pic` tinyint(1) NOT NULL DEFAULT '0' ,
			`redirect_url` varchar(128) NULL,
			`keywords` varchar(128) NULL,
			`sub_title` varchar(128) NULL,
			`summary` varchar(512) NULL,
			`content` text NULL,
			 PRIMARY KEY (`id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
	
	private static $renameTableSql="RENAME TABLE  `{oldtablename}` TO  `{newtablename}` ;";
	
	private static $dropTableSql="DROP TABLE IF EXISTS `{tablename}` ";
	
	public static function getCreateTableSql($tableName)
	{
		return str_replace('{tablename}',$tableName,self::$createTableSql);
	}
	
	public static function getRenameTableSql($oldTableName,$newTableName)
	{
		$sql=str_replace('{oldtablename}', $oldTableName, self::$renameTableSql);
		$sql=str_replace('{newtablename}', $newTableName, $sql);
		return $sql;
	}
	
	public static function getDropTableSql($tableName)
	{
		return str_replace('{tablename}', $tableName, self::$dropTableSql);
	}
	
	private static $addFieldSql="ALTER TABLE  `{tablename}` ADD  `{fieldname}` {dbtype} {null} ;";
	private static $dropFieldSql="ALTER TABLE  `{tablename}` DROP  `{fieldname}` ;";
	
	public static function getAddFieldSql($tableName,$fieldName,$dbType,$isNull=true)
	{
		$sql = str_replace('{tablename}',$tableName,self::$addFieldSql);
		$sql = str_replace('{fieldname}',$fieldName,$sql);
		$sql = str_replace('{dbtype}',$dbType,$sql);
		$null = $isNull? 'NULL' :'NOT NULL';
		return str_replace('{null}',$null,$sql);
	}
	
	public static function getDropFieldSql($tableName,$fieldName)
	{
		$sql = str_replace('{tablename}',$tableName,self::$dropFieldSql);
		return str_replace('{fieldname}',$fieldName,$sql);
	}
	
}
