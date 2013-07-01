<?php

class Category extends \Framework\Model
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
	protected $_parent_id;
	
	/**
	 * @column
	 * @readwrite
	 * @type text
	 * @length 50
	 * 
	 * @validate required, max(50)
	 */
	protected $_name;
}
