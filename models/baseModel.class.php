<?php

class baseModel
{
    protected static $db = null;
    public function __construct()
    {
        loadUtil('db');
        self::$db = db::getObj();
    }
    
    public function getDatabases()
    {
        $query = 'SHOW databases;';
        $result = self::$db->query($query);
        return $result;
    }
}
