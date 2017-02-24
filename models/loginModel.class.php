<?php
class loginModel extends baseModel
{
    static private $table = 'admin';
    
    /**
     * 注册用户
     * @method   register
     * @Author   lichen
     * @Datetime 2017-02-24T09:50:39+080
     * @param    [type]                  $username [description]
     * @param    [type]                  $password [description]
     * @return   [type]                            [description]
     */
    public function register($username, $password)
    {
        $result = $this->getUserInfoByUsername($username);
        if ($result)
        {
            return false;
        }
        $dataArr = array(
            'username' => $username,
            'password' => md5($password),
            'register_time' => time(),
        );
        return $this->addRecord($dataArr, self::$table);
    }
    
    /**
     * 根据用户名获取用户信息
     * @method   getUserInfoByUsername
     * @Author   lichen
     * @Datetime 2017-02-24T09:50:47+080
     * @param    [type]                  $username [description]
     * @return   [type]                            [description]
     */
    public function getUserInfoByUsername($username)
    {
        $where = "`username` = '{$username}'";
        $result = $this->getSingleRow('*', self::$table, $where);
        
        return $result;
    }
    
    /**
     * 根据id获取用户信息
     * @method   getUserInfoById
     * @Author   lichen
     * @Datetime 2017-02-24T11:11:35+080
     * @param    [type]                  $id [description]
     * @return   [type]                      [description]
     */
    public function getUserInfoById($id)
    {
        $where = "`id` = {$id}";
        $result = $this->getSingleRow('*', self::$table, $where);
        
        return $result;
    }
}
