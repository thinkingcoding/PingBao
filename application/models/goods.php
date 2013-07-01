<?php

class goods extends Framework\Model
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
     * @label 商品名称
     */
    protected $_name;
    
    /**
     * @column
     * @readwrite
     * @type integer
     * 
     * @validate required
     * @label 商品类目
     */
    protected $_category_id;
    
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
     * @type text
     * @length 1023
     * 
     * @validate required, min(12), max(1023)
     */
    protected $_describe;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_5star_count;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_4star_count;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_3star_count;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_2star_count;
    
    /**
     * @column
     * @readwrite
     * @type integer
     */
    protected $_1star_count;
}