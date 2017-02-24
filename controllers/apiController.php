<?php
class apiController
{
    static public $modelObj = null;
    public function __construct()
    {
        self::$modelObj = new dataModel();
    }
    
    public function indexAction()
    {
        $dataArr = self::$modelObj->getAllData();
        $this->data2Json($dataArr);
    }
    
    /**
     * 转json输出
     * @method   data2Json
     * @Author   lichen
     * @Datetime 2017-02-24T14:37:25+080
     * @param    [type]                  $dataArr [description]
     * @return   [type]                           [description]
     */
    public function data2Json($dataArr)
    {
        echo json_encode($dataArr);
        exit();
    }
}
