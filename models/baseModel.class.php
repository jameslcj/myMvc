<?php

class baseModel
{
    protected static $db = null;
    public function __construct()
    {
        loadUtil('db');
        self::$db = db::getObj();
    }
    
    /**
     * 获取数据库表单
     * @method   getDatabases
     * @Author   lichen
     * @Datetime 2017-02-24T09:49:36+080
     * @return   [type]                  [description]
     */
    protected function getDatabases()
    {
        $resArr = array();
        $query = 'SHOW databases;';
        $result = $this->query($query);
        while ($row = mysql_fetch_assoc($result))
        {
            $resArr[] = $row['Database'];
        }
        return $resArr;
    }
    
    /**
     * 执行sql
     * @method   query
     * @Author   lichen
     * @Datetime 2017-02-24T09:49:46+080
     * @param    [type]                  $query [description]
     * @return   [type]                         [description]
     */
    protected function query($query)
    {
        return $result = self::$db->query($query);
    }
    
    /**
     * 添加记录
     * @method   addRecord
     * @Author   lichen
     * @Datetime 2017-02-24T09:49:55+080
     * @param    [type]                  $dataArr [description]
     * @param    [type]                  $table   [description]
     */
    protected function addRecord($dataArr, $table)
    {
        $keyArr = array_keys($dataArr);
        $keyStr = implode('`,`', $keyArr);
        $valStr = implode("','", $dataArr);
        $query = "INSERT INTO {$table} (`{$keyStr}`) VALUES ('{$valStr}')";
        $result = $this->query($query);
        $result && $result = self::$db->getLastId();
        
        return $result;
    }
    
    /**
     * 获取单条记录
     * @method   getSingleRow
     * @Author   lichen
     * @Datetime 2017-02-24T09:50:03+080
     * @param    string                  $fields [description]
     * @param    [type]                  $table  [description]
     * @param    string                  $where  [description]
     * @return   [type]                          [description]
     */
    protected function getSingleRow($fields = '*', $table, $where = ' 1 ')
    {
        $resArr = array();
        $query = "SELECT {$fields} FROM {$table} WHERE {$where} limit 1";
        $result = $this->query($query);
        while ($row = mysql_fetch_assoc($result))
        {
            $resArr[] = $row;
        }
        
        return isset($resArr[0]) ? $resArr[0] : $resArr;
    }
    
    /**
     * 获取多组数据
     * @method   getMultiRows
     * @Author   lichen
     * @Datetime 2017-02-24T12:58:51+080
     * @param    string                  $fields [description]
     * @param    [type]                  $table  [description]
     * @param    string                  $where  [description]
     * @return   [type]                          [description]
     */
    protected function getMultiRows($fields = '*', $table, $where = ' 1 ')
    {
        $resArr = array();
        $query = "SELECT {$fields} FROM {$table} WHERE {$where}";
        $result = $this->query($query);
        while ($row = mysql_fetch_assoc($result))
        {
            $resArr[] = $row;
        }
        
        return $resArr;
    }
    
    /**
     * 删除记录
     * @method   delRecords
     * @Author   lichen
     * @Datetime 2017-02-24T14:45:28+080
     * @param    [type]                  $where [description]
     * @param    [type]                  $table [description]
     * @return   [type]                         [description]
     */
    public function delRecords($table, $where)
    {
        $query = "DELETE FROM {$table} WHERE {$where}";
        $result = $this->query($query);
        
        return $result;
    }
    
    /**
     * 更新记录
     * @method   updateRecords
     * @Author   lichen
     * @Datetime 2017-02-24T15:18:34+080
     * @param    [type]                  $dataArr [description]
     * @param    [type]                  $table   [description]
     * @param    [type]                  $where   [description]
     * @return   [type]                           [description]
     */
    public function updateRecords($dataArr, $table, $where)
    {
        $keyArr = array_keys($dataArr);
        $keyStr = implode('`,`', $keyArr);
        $valStr = implode("','", $dataArr);
        $query = "UPDATE {$table} set ";
        foreach ($dataArr as $key => $val)
        {
            $query .= "`{$key}`= '{$val}',";
        }
        $query = rtrim($query, ',') . " WHERE {$where}";
        $result = $this->query($query);
        
        return $result;
    }
}
