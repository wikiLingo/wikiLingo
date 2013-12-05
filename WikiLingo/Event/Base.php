<?php
namespace WikiLingo\Event;


class Base
{
	public $delegates = array();

	public function __construct($delegate = null)
	{
		if ($delegate != null)
		{
			$this->delegates[] =& $delegate;
		}
	}
	public function bind($delegate)
	{
		$this->delegates[] =& $delegate;
	}
} 