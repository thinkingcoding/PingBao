<?php

class Review_Tag extends Framework\Model
{
    /**
     * @column
     * @readwrite
     * @primary
     * @type integer
     */
    protected $_review_id;
    
    /**
     * @column
     * @readwrite
     * @primary
     * @type integer
     */
    protected $_tag_id;
}