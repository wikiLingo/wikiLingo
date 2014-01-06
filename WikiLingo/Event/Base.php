<?php
namespace WikiLingo\Event;

/**
 * Class Base
 * @package WikiLingo\Event
 */
class Base
{
    /**
     * @var array
     */
    public $delegates = array();

    /**
     * @param function [$delegate]
     */
    public function __construct($delegate = null)
	{
		if ($delegate != null)
		{
			$this->delegates[] =& $delegate;
		}
	}

    /**
     * @param function $delegate
     */
    public function bind($delegate)
	{
		$this->delegates[] =& $delegate;
	}
} 