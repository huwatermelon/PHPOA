<?php
if(!defined('HOST'))die('not access');
//这个文件是初始配置文件，详细安装配置方法浏览网址：http://www.rockoa.com/view_anzz.html
//如果你已经安装成功，这个文件可以删掉哦。
return array(
	'title'		=> '快彩办公系统',	//系统默认标题
	'apptitle'	=> '快彩OA',			//APP上或PC客户端上的标题

	'url'		=> 'http://127.0.0.1/',	//系统URL(这个要设置)
	
	'db_drive'	=> 'mysqli',	//操作数据库驱动有mysql,mysqli,pdo三种
	'db_host'	=> '127.0.0.1',	//数据库地址
	'db_user'	=> 'root',		//数据库用户名
	'db_pass'	=> 'wangwust',			//数据库密码
	'db_base'	=> 'kc.oa',	//数据库名称

	'randkey'	=> 'oyqxnwmpkslbcadugftrjvzehi',			//系统密钥，必须填写(详见上面网址生成)
	
	
	'perfix'	=> 'kc_',	//数据库表名前缀
	'localurl'	=> '',				//本地系统URL，用于服务器上浏览地址(推荐设置)
	
	'updir'		=> 'upload',	//默认上传的目录文件夹
	
	'xinhukey'	=> '',	//快彩官网key，用于在线升级使用
	
	'phppath'	=> 'D:\Program Files (x86)\php-7.1.4-Win32-VC14-x64\php.exe',	//php.exe的地址，win下如：F:\php\php-5.4.14\php.exe，Linux下如：/usr/bin/php
	
	'qom'		=> 'kc_',		//session、cookie前缀
	'highpass'	=> 'wangwust',				//超级管理员密码，可用于登录任何帐号
	'asynkey'	=> 'asynkey23sss',	//这是异步任务key
	'openkey'	=> 'openkey23se',	//对外接口openkey
	'asynsend'	=> '0',	//是否异步发送提醒消息，0同步，1自己服务端异步，2官网VIP用户异步
	'install'	=> true,	//已安装，不要去掉啊
	'sqllog'	=> false,	//是否记录sql日志保存upload/sqllog下
);