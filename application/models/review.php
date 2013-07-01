<?php

class Review extends Framework\Model
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
     * @type integer
     */
    protected $_goods_id;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 1023
     * 
     * @validate max(1023)
     */
    protected $_pros;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 1023
     * 
     * @validate max(1023)
     */
    protected $_cons;
    
    /**
     * @column
     * @readwrite
     * @type text
     * @length 1023
     * 
     * @validate max(1023)
     */
    protected $_summary;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_rate;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_useful_count;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_unuseful_count;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_uid;
    
    /**
     * @column
     * @readwrite
     * @type datetime
     */
    protected $_create_time;
    
    public function __construct($options = array())
    {
        if(!isset($options["create_time"]))
            $options["create_time"] = date("Y-m-d h:i:s", time());
    
        parent::__construct($options);
    }
}