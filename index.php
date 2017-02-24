<?php
//初始化
//加载全局配置信息
require_once('./config.php');
//加载全局通用方法
require_once('./common.php');

//是否开发模式
ini_set('display_errors', DEV_MODEL);
//强制设置为utf-8 因为我php设置的gbk 必须要有这句 不然为乱码
header('Content-Type: text/html; charset=utf-8;');

//解析路由 km.com/index.php?ctl=index&act=index
$ctl = getGP('ctl');
$act = getGP('act');

$ctl = $ctl ? $ctl : 'index';
$act = $act ? $act : 'index';
$_GET['ctl'] = $ctl;
$_GET['act'] = $act;
//加载对应文件
$ctlName = $ctl . 'Controller';
// require(CTL_PATH . $ctlName . '.php');
$obj = new $ctlName();
$actName = $act . 'Action';
$obj->$actName();
//实例化对应的文件
