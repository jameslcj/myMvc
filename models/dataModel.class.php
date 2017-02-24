<?php
class dataModel extends baseModel
{
    static protected $table = 'data';
    public function index()
    {
        
    }
    
    /**
     * 添加数据
     * @method   addData
     * @Author   lichen
     * @Datetime 2017-02-24T12:59:53+080
     * @param    [type]                  $addArr [description]
     */
    public function addData($addArr)
    {
        $res = $this->addRecord($addArr, self::$table);
        
        return $res;
        
    }
    
    /**
     * 获取所有数据
     * @method   getAllData
     * @Author   lichen
     * @Datetime 2017-02-24T12:59:43+080
     * @return   [type]                  [description]
     */
    public function getAllData()
    {
        $resArr = $this->getMultiRows('*', self::$table, '1');
        
        return $resArr;
    }
    
    /**
     * 根据id获取数据
     * @method   getDataById
     * @Author   lichen
     * @Datetime 2017-02-24T14:59:08+080
     * @param    [type]                  $id [description]
     * @return   [type]                      [description]
     */
    public function getDataById($id)
    {
        $where = "`id` = {$id}";
        $resArr = $this->getSingleRow('*', self::$table, $where);
        
        return $resArr;
    }
    
    /**
     * 根据id删除数据
     * @method   delDataById
     * @Author   lichen
     * @Datetime 2017-02-24T14:51:23+080
     * @param    [type]                  $id [description]
     * @return   [type]                      [description]
     */
    public function delDataById($id)
    {
        $where = "`id` = {$id}";
        $result = $this->delRecords(self::$table, $where);
        return $result;
    }
    
    /**
     * 保存数据
     * @method   saveDataById
     * @Author   lichen
     * @Datetime 2017-02-24T15:12:13+080
     * @param    [type]                  $dataArr [description]
     * @param    [type]                  $id      [description]
     * @return   [type]                           [description]
     */
    public function saveDataById($dataArr, $id)
    {
        $where = "`id`={$id}";
        $result = $this->updateRecords($dataArr, self::$table, $where);
        
        return $result;
    }
}
