<?php

class Good_History extends Framework\Model
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
     * @type integer
     * 
     * @validate required
     */
    protected $_category_id;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 255
     */
    protected $avatar_file;

    /**
     * @column
     * @readwrite
     * @type text
     * @length 1023
     * 
     * @validate required, max(1023)
     */
    protected $_describe;

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
}