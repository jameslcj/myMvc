<?php

final class db
{
    protected static $obj = null;
    protected static $connect = null;
    protected function __construct()
    {
        $this->connect();
    }
    
    public static function getObj()
    {
        if (self::$obj instanceof self)
        {
            return self::$obj;
        }
        
        return self::$obj = new self();
    }
    
    protected function connect()
    {
        $config = loadConfig('db');
        self::$connect = mysql_connect($config['hostname'], $config['username'], $config['password']);
        self::$connect || die('db connect err');
        mysql_query('set names utf8');
        mysql_select_db($config['database']);
    }
    
    public function query($query)
    {
        $resArr = array();
        $result = mysql_query($query, self::$connect);
        if ($result)
        {
            while ($row = mysql_fetch_assoc($result))
            {
                $resArr[] = $row;
            }
        }
        else
        {
            self::$obj->getErr();
        }
        
        return $resArr;
    }
    
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
