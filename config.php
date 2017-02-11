<?php
//是否开发模式
! defined('DEV_MODEL') && define('DEV_MODEL', true);

//路由配置信息
! defined('ROOT_PATH') && define('ROOT_PATH', dirname(__FILE__));
! defined('CTL_PATH') && define('CTL_PATH', ROOT_PATH . '/controllers/');
! defined('MODEL_PATH') && define('MODEL_PATH', ROOT_PATH . '/models/');
! defined('VIEW_PATH') && define('VIEW_PATH', ROOT_PATH . '/views/');
! defined('CONF_PATH') && define('CONF_PATH', ROOT_PATH . '/config/');
! defined('PUBLIC_PATH') && define('PUBLIC_PATH', ROOT_PATH . '/public/');
