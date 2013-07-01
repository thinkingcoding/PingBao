<?php

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
    * @label ÓÃ»§Ãû
    */
    protected $_name;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 255
    *
    * @validate required, max(255)
    * @label ÓÊÏä
    */
    protected $_email;
    
    /**
    * @column
    * @readwrite
    * @type text
    * @length 50
    * @index
    *
    * @validate required, min(8), max(32)
    * @label ÃÜÂë
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
     * @length 50
     */
    protected $_salt;
    
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
}
