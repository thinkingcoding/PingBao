<?php

use Framework\RequestMethods as RequestMethods;

class User extends Framework\Model
{
    /**
    * @column
    * @readwrite
    * @primary
    * @type autonumber
    */
    protected $_id;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 50
    *
    * @validate required, min(3), max(32)
    * @label 用户名
    */
    protected $_name;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    *
    * @validate required, max(255)
    * @label 邮箱
    */
    protected $_email;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    * @index
    *
    * @validate required, min(8), max(32)
    * @label 密码
    */
    protected $_password;
    
    /**
     * @readwrite
     */
    protected $_password_again;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     */
    protected $_avatar_file;
    
    /**
     * @column
     * @readwrite
     * @type boolean
     */
    protected $_verified;
    
    /**
     * @column
     * @readwrite
     * @type boolean
     */
    protected $_forbidden;
    
    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_reg_time;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 15
     */
    protected $_reg_ip;
    
    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_last_login;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 15
     */
    protected $_last_ip;
    
    public function __construct($options = array())
    {
        if(!isset($options["verified"]))
        {
            $options["verified"] = false;
        }
        
        if(!isset($options["forbidden"]))
        {
            $options["forbidden"] = false;
        }
        
        if(!isset($options["reg_time"]))
            $options["reg_time"] = date("Y-m-d h:i:s", time());
        
        if(!isset($options["reg_ip"]))
            $options["reg_ip"] = RequestMethods::server("REMOTE_ADDR");
        
        parent::__construct($options);
    }
    
    public function validate()
    {
        parent::validate();
        $this->_validateName($this->name);
        $this->_validateEmail($this->email);
        $this->_validatePassword($this->_password);
        return !sizeof($this->errors);
    }
    
    public function _validateName($value)
    {
        if($this::count(array("name = ?" => $value)) > 0)
        {
            if (!isset($this->_errors["name"]))
            {
                $this->_errors["name"] = array();
            }
            
            $this->_errors["name"][] = "该用户名已被注册！";
            return false;
        }
        return true;
    }
    
    protected function _validatePassword($value)
    {
        if ($this->_password_again != $value)
        {
            if (!isset($this->_errors["password_again"]))
            {
                $this->_errors["password_again"] = array();
            }
            $this->_errors["password_again"][] = "两次密码输入不一致！";
            return false;
        }
        return true;
    }
    
    protected function _validateEmail($value)
    {
        if(!filter_var($value, FILTER_VALIDATE_EMAIL))
        {
            if (!isset($this->_errors["email"]))
            {
                $this->_errors["email"] = array();
            }
            	
            $this->_errors["email"][] = "错误的邮箱地址！";
            return false;
        }
    
        if($this::count(array("email = ?" => $value)) > 0)
        {
            if (!isset($this->_errors["email"]))
            {
                $this->_errors["email"] = array();
            }
    
            $this->_errors["email"][] = "该邮箱已被注册！";
            return false;
        }
        return true;
    }
    
    public function save()
    {
        $this->password = md5(md5($user->password));
        parent::save();
    }
    
    public function checkPassword($value)
    {
        if ($this->password == md5(md5($value)))
        {
            return true;
        }
        return false;
    }
}
