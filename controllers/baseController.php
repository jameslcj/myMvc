<?php
class baseController
{
    public function __construct()
    {
        session_start();
        if (! $this->isLogin() && ! $this->isAutoLogin())
        {
            //判断是否有免登录
            $jumpArr = array(
                'ctl' => 'login',
                'act' => 'index',
            );
            direct('请先登录', 1, $jumpArr);
        }
    }
    
    /**
     * 判断是否自动登录
     * @method   isAutoLogin
     * @Author   lichen
     * @Datetime 2017-02-24T11:14:38+080
     * @return   boolean                 [description]
     */
    protected function isAutoLogin()
    {
        $id = isset($_COOKIE['autoLogin_id']) ? intval($_COOKIE['autoLogin_id']) : '';
        $md5 = isset($_COOKIE['autoLogin']) ? $_COOKIE['autoLogin'] : '';
        if (! $id || ! $md5)
        {
            return false;
        }
        
        $modelObj = new loginModel();
        $userInfo = $modelObj->getUserInfoById($id);
        if ($md5 == $this->getMd5AutoLoginInfo($userInfo))
        {
            $_SESSION['isLogin'] = true;
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['username'] = $userInfo['username'];
            return true;
        }
        
        return false;
    }
    
    /**
     * 获取md5自动登录信息
     * @method   getMd5AutoLoginInfo
     * @Author   lichen
     * @Datetime 2017-02-24T11:14:26+080
     * @param    [type]                  $userInfo [description]
     * @return   [type]                            [description]
     */
    protected function getMd5AutoLoginInfo($userInfo)
    {
        if (! $userInfo)
        {
            return '';
        }
        return md5($userInfo['username']. $userInfo['password'] . '@#$@%' . $userInfo['register_time']);
    }
    
    /**
     * 判断是否已登录
     * @method   isLogin
     * @Author   lichen
     * @Datetime 2017-02-23T14:16:50+080
     * @return   boolean                 [description]
     */
    protected function isLogin()
    {
        if (getGP('ctl') == 'login' || isset($_SESSION['isLogin']) && $_SESSION['isLogin'])
        {
            return true;
        }
        
        return false;
    }
    
    /**
     * 上传图片
     * @method   uploadImage
     * @Author   lichen
     * @Datetime 2017-02-24T12:49:10+080
     * @param    [type]                  $name [description]
     * @param    [type]                  $path [description]
     * @return   [type]                        [description]
     */
    protected function uploadImage($name, $path)
    {
        // 其他安全问题过滤 以后再添加
        if (! $_FILES[$name])
        {
            return false;
        }
        
        $dir = UPLOAD_PATH . $path . '/';
        if (! is_dir($dir))
        {
            mkdir($dir, 0777, true);
        }
        $suffix = substr($_FILES[$name]['name'], strrpos($_FILES[$name]['name'], '.'));
        $newFile = md5($_FILES[$name]['name'] + time()) . $suffix;
        $res = move_uploaded_file($_FILES[$name]['tmp_name'], $dir . $newFile);
        
        return $res ? $path . '/' . $newFile : $res;
    }
}
