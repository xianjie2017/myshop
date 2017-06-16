<?php
return array(
	//'配置项'=>'配置值',
	'URL_MODEL'	=> 2,

	// 显示页面Trace信息
	'SHOW_PAGE_TRACE' =>true, 

	'APP_SUB_DOMAIN_DEPLOY' =>  true,   // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES'  =>  array(
		'admin' => 'Admin',
	), // 子域名部署规则


	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'xjshop_db',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'xianj_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数    
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
	
	// 自定义类库
	'AUTOLOAD_NAMESPACE' => [
		'Lib'     => APP_PATH . 'Library',
	],
	
	'TMPL_PARSE_STRING'  =>array(
		 '__PUBLIC__' => '/Public/' . CONTROLLER_NAME . '/', // 更改默认的/Public 替换规则
		 '__JS__'     => '/Public/JS/', // 增加新的JS类库路径替换规则
		 '__UPLOAD__' => '/', // 增加新的上传路径替换规则
	),
);