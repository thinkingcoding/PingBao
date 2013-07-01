<?php

class Comment extends \Framework\Model
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
	protected $_review_id;
	
	/**
	 * @column
	 * @readwrite
	 * @type integer
	 */
	protected $_parent_id;
	
	/**
	 * @column
	 * @readwrite
	 * @type integer
	 */
	protected $_uid;
	
	/**
	 * @column
	 * @readwrite
	 * @type text
	 * @length 255
	 * 
	 * @validate required, min(6), max(255)
	 */
	protected $_content;
	
	/**
	 * @column
	 * @readwrite
	 * @type datetime
	 */
	protected $_create_time;
}