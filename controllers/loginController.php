<?php
class loginController extends baseController
{
    private static $modelObj = null;
    
    public function __construct()
    {
        parent::__construct();
        self::$modelObj = new loginModel();
    }
    
    /**
     * 展示登录界面
     * @method   indexAction
     * @Author   lichen
     * @Datetime 2017-02-24T09:10:50+080
     * @return   [type]                  [description]
     */
    public function indexAction()
    {
        display('login/index');
    }
    
    /**
     * 登录
     * @method   loginAction
     * @Author   lichen
     * @Datetime 2017-02-24T10:46:15+080
     * @return   [type]                  [description]
     */
    public function loginAction()
    {
        $username = mysql_escape_string(getGP('username'));
        $password = mysql_escape_string(getGP('password'));
        $isAutoLogin = intval(getGP('autoLogin'));
        
        $userInfo = self::$modelObj->getUserInfoByUsername($username);
        if ($userInfo['password'] == md5($password))
        {
            session_start();
            $_SESSION['isLogin'] = true;
            $_SESSION['username'] = $userInfo['username'];
            $_SESSION['id'] = $userInfo['id'];
            //设置7天免登录
            if ($isAutoLogin)
            {
                setcookie('autoLogin', $this->getMd5AutoLoginInfo($userInfo), time() + 7 * 86400);
                setcookie('autoLogin_id', $userInfo['id'], time() + 7 * 86400);
            }
            direct('登录成功', 1);
        }
        
        $urlInfo = array(
            'ctl' => 'login',
            'act' => 'index',
        );
        direct('登录失败, 请重试', 3, $urlInfo);
    }
    
    /**
     * 登出
     * @method   logoutAction
     * @Author   lichen
     * @Datetime 2017-02-24T10:39:28+080
     * @return   [type]                  [description]
     */
    public function logoutAction()
    {
        session_start();
        unset($_SESSION['isLogin']);
        setcookie('autoLogin', '');
        $urlInfo = array(
            'ctl' => 'login',
            'act' => 'index',
        );
        direct('退出成功!', 1, $urlInfo);
    }
    
    /**
     * 展示注册界面
     * @method   registerAction
     * @Author   lichen
     * @Datetime 2017-02-24T09:10:57+080
     * @return   [type]                  [description]
     */
    public function registerAction()
    {
        display('login/register');
    }
    
    /**
     * 注册新用户
     * @method   registerUserAction
     * @Author   lichen
     * @Datetime 2017-02-24T09:13:20+080
     * @return   [type]                  [description]
     */
    public function registerUserAction()
    {
        $username = addslashes(getGP('username'));
        $password = addslashes(getGP('password'));
        $result = self::$modelObj->register($username, $password);
        if ($result)
        {
            session_start();
            $_SESSION['isLogin'] = true;
            $_SESSION['id'] = $result;
            $_SESSION['username'] = $username;
        }
        
        $urlInfo = array(
            'ctl' => $result ? 'index' : 'login',
            'act' => $result ? 'index' : 'register',
        );
        
        direct($result ? '注册成功!' : '注册失败, 请重新注册', 3, $urlInfo);
    }
}
