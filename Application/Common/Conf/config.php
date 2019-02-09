<?php
return array(
	'SHOW_PAGE_TRACE' => false, //调试
	'VAR_MODULE' => 'mod',
	'VAR_CONTROLLER' => 'ctrl',
	'VAR_ACTION' => 'action',
	'DEFAULT_MODULE' => 'Home',
	'URL_MODEL' => 2,
	'SESSION_AUTO_START' => true,
	//'MODULE_ALLOW_LIST' => array('Home','test'),
	//'URL_MODULE_MAP' => array('test' => 'Home'),
	'TMPL_PARSE_STRING' => array(
	'__JS__' => __ROOT__.'/Public/js',
	'__CSS__' => __ROOT__.'/Public/css',
	'__IMG__' => __ROOT__.'/Public/images',
	'__FONT__' => __ROOT__.'/Public/fonts'),
//	'AUTOLOAD_NAMESPACE' => array(
//	'Lib' => COMMON_PATH.'Lib'),
	'LOAD_EXT_CONFIG' => array('db'),
	//'LANG_SWITCH_ON' => true,   // 开启语言包功能
    //'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    //'DEFAULT_LANG' => 'zh-cn', // 默认语言
    //'LANG_LIST'        => 'zh-cn,en-us', // 允许切换的语言列表 用逗号分隔
    //'VAR_LANGUAGE'     => 'l' // 默认语言切换变量
	//'ERROR_PAGE' => '/Public/error.html'
	//'配置项'=>'配置值'
);
