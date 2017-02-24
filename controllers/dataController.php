<?php
class dataController extends baseController
{
    static protected $modelObj = null;
    public function __construct()
    {
        parent::__construct();
        self::$modelObj = new dataModel();
    }
    
    /**
     * 展示数据
     * @method   indexAction
     * @Author   lichen
     * @Datetime 2017-02-24T13:28:37+080
     * @return   [type]                  [description]
     */
    public function indexAction()
    {
        $data = self::$modelObj->getAllData();
        // echo "<hr><pre>";var_dump($data);exit("<hr>");
        display('data/index', $data);
    }
    
    /**
     * 展现和添加数据
     * @method   addAction
     * @Author   lichen
     * @Datetime 2017-02-24T12:56:41+080
     */
    public function addAction()
    {
        if (getGP('title'))
        {
            $dataArr = array(
                'title' => mysql_escape_string(getGP('title')),
                'desc' => mysql_escape_string(getGP('desc')),
                'add_time' => time(),
            );
            
            if ($_FILES['image']['name'] && ! $path = $this->uploadImage('image', '/data'))
            {
                direct('上传图片失败!', 3, $_SERVER['HTTP_REFERER']);
            }
            isset($path) && $dataArr['image'] = $path;
            $res = self::$modelObj->addData($dataArr);
            
            $urlInfo = $res ? array(
                'ctl' => 'data',
                'act' => 'index',
            ) : $_SERVER['HTTP_REFERER'];
            direct($res ? '添加成功' : '添加失败', 1, $urlInfo);
        }
        
        display('data/add');
    }
    
    /**
     * 根据id删除数据
     * @method   delDataAction
     * @Author   lichen
     * @Datetime 2017-02-24T14:47:19+080
     * @return   [type]                  [description]
     */
    public function delDataAction()
    {
        $id = intval(getGP('id'));
        $res = self::$modelObj->delDataById($id);
        direct($res ? '删除成功' : '删除失败', 1, $_SERVER['HTTP_REFERER']);
    }
    
    /**
     * 编辑页面
     * @method   editDataAction
     * @Author   lichen
     * @Datetime 2017-02-24T14:57:49+080
     * @return   [type]                  [description]
     */
    public function editDataAction()
    {
        $id = intval(getGP('id'));
        $dataArr = self::$modelObj->getDataById($id);
        
        display('data/add', $dataArr);
    }
    
    /**
     * 保存数据
     * @method   saveAction
     * @Author   lichen
     * @Datetime 2017-02-24T15:10:04+080
     * @return   [type]                  [description]
     */
    public function saveAction()
    {
        $id = intval(getGP('id'));
        $dataArr = array(
            'title' => mysql_escape_string(getGP('title')),
            'desc' => mysql_escape_string(getGP('desc')),
            'image' => mysql_escape_string(getGP('image')),
        );
        
        if ($_FILES['image']['name'] && $path = $this->uploadImage('image', '/data'))
        {
            $dataArr['image'] = $path;
        }
        
        $result = self::$modelObj->saveDataById($dataArr, $id);
        
        $urlInfo = array(
            'ctl' => 'data',
            'act' => 'index',
        );
        
        direct($result ? '修改完成' : '修改失败', 1, $urlInfo);
    }
}
