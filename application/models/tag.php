<?php

class Tag extends \Framework\Model
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
	 * @validate required, max(32)
	 */
	protected $_name;
}