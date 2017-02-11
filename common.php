<?php
/**
 * 自动加载方法
 * @method   __autoload
 * @Author   lichen
 * @Datetime 2017-02-11T12:10:19+080
 * @param    [type]                  $objName [description]
 * @return   [type]                           [description]
 */
function __autoload($objName)
{
    //匹配中控制器
    if (false !== strstr($objName, 'Controller'))
    {
        loadController($objName);
    }
    else if (false !== strstr($objName, 'Model'))
    {
        loadModel($objName);
    }
}
/**
 * 获取get和post参数
 * @method   getGP
 * @Author   lichen
 * @Datetime 2017-02-11T11:53:36+080
 * @param    [type]                  $param [description]
 * @return   [type]                         [description]
 */
function getGP($param)
{
    if (isset($_POST[$param]))
    {
        return $_POST[$param];
    }
    
    return isset($_GET[$param]) ? $_GET[$param] : '';
}

/**
 * 加载控制器
 * @method   loadController
 * @Author   lichen
 * @Datetime 2017-02-11T12:18:41+080
 * @param    [type]                  $objName [description]
 * @return   [type]                           [description]
 */
function loadController($objName)
{
    require(CTL_PATH . $objName . '.php');
    // return new $objName();
}

/**
 * 加载model
 * @method   loadModel
 * @Author   lichen
 * @Datetime 2017-02-11T11:53:48+080
 * @param    [type]                  $funcName [description]
 * @return   [type]                            [description]
 */
function loadModel($funcName)
{
    $funcName = $funcName;
    require(MODEL_PATH . $funcName . '.class.php');
    // return new $funcName();
}

/**
 * 加载工具类
 * @method   loadUtil
 * @Author   lichen
 * @Datetime 2017-02-11T16:28:41+080
 * @param    [type]                  $funcName [description]
 * @return   [type]                            [description]
 */
function loadUtil($funcName)
{
    $funcName = $funcName;
    require(UTIL_PATH . $funcName . '.class.php');
    // return new $funcName();
}

/**
 * 加载配置文件
 * @method   loadConfig
 * @Author   lichen
 * @Datetime 2017-02-11T16:33:03+080
 * @param    [type]                  $fileName [description]
 * @return   [type]                            [description]
 */
function loadConfig($fileName)
{
    require(CONF_PATH . $fileName . '.config.php');
    $temp = get_defined_vars ();
    if (isset ( $temp ['php_errormsg'] ))
    {
        unset ( $temp ['php_errormsg'] ); // fix // php5.3.5
    }
    
    return $temp;
}

/**
 * 渲染视图
 * @method   display
 * @Author   lichen
 * @Datetime 2017-02-11T16:00:58+080
 * @param    [type]                  $fileName [description]
 * @param    [type]                  $data     [description]
 * @return   [type]                            [description]
 */
function display($fileName, $data)
{
    $suffix = '.tpl';
    $fileName .= $suffix;
    require(VIEW_PATH . $fileName);
}
