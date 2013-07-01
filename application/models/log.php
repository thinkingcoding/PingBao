<?php

class Log extends \Framework\Model
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
	protected $_level;
	
	/**
	 * @column
	 * @readwrite
	 * @type text
	 * @length 1023
	 * 
	 * @validate required, max(1023)
	 */
	protected $_content;
	
	/**
	 * @column
	 * @readwrite
	 * @type datetime
	 */
	protected $_time;
}