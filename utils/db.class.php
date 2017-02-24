<?php

final class db
{
    private static $obj = null;
    private static $connect = null;
    private function __construct()
    {
        $this->connect();
    }
    
    /**
     * 获取单列对象
     * @method   getObj
     * @Author   lichen
     * @Datetime 2017-02-24T09:48:17+080
     * @return   [type]                  [description]
     */
    public static function getObj()
    {
        if (self::$obj instanceof self)
        {
            return self::$obj;
        }
        
        return self::$obj = new self();
    }
    
    /**
     * 连接数据库
     * @method   connect
     * @Author   lichen
     * @Datetime 2017-02-24T09:48:32+080
     * @return   [type]                  [description]
     */
    private function connect()
    {
        $config = loadConfig('db');
        self::$connect = mysql_connect($config['hostname'], $config['username'], $config['password']);
        self::$connect || die('db connect err');
        mysql_query('set names utf8');
        mysql_select_db($config['database']);
    }
    
    /**
     * 获取最新插入id
     * @method   getLastId
     * @Author   lichen
     * @Datetime 2017-02-24T09:48:40+080
     * @return   [type]                  [description]
     */
    public function getLastId()
    {
        return mysql_insert_id(self::$connect);
    }
    
    /**
     * 执行sql
     * @method   query
     * @Author   lichen
     * @Datetime 2017-02-24T09:48:55+080
     * @param    [type]                  $query [description]
     * @return   [type]                         [description]
     */
    public function query($query)
    {
        $result = mysql_query($query, self::$connect);
        if (! $result)
        {
            return self::$obj->getErr();
        }
        
        return $result;
    }
    
    /**
     * 获取错误信息
     * @method   getErr
     * @Author   lichen
     * @Datetime 2017-02-24T09:49:09+080
     * @return   [type]                  [description]
     */
    public function getErr()
    {
        $err = mysql_error(self::$connect);
        
        if (DEV_MODEL && $err)
        {
            echo $err, '<br>';
        }
        return $err;
    }
}
