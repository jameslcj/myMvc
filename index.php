<?php
//初始化
//加载全局通用方法
require('./common.php');
//加载全局配置信息
require('./config.php');

//是否开发模式
ini_set('display_errors', DEV_MODEL);

//解析路由 km.com/index.php?ctl=index&act=index
$ctl = getGP('ctl');
$act = getGP('act');
$ctl = $ctl ? $ctl : 'index';
$act = $act ? $act : 'index';

//加载对应文件
$ctlName = $ctl . 'Controller';
// require(CTL_PATH . $ctlName . '.php');
$obj = new $ctlName();
$actName = $act . 'Action';
$obj->$actName();
//实例化对应的文件
