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
    }
    
    public function getDatabases()
    {
        $query = 'SHOW databases;';
        $result = mysql_query($query, self::$connect);
        $result = mysql_fetch_assoc($result);
        return $result;
    }
}
