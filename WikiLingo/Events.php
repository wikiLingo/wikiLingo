<?php
namespace WikiLingo;

class Events
{
	public $events = array();

	public function bind($eventName, &$method)
	{
		if (!isset($this->events[$eventName])) {
			$this->events[$eventName] = array();
		}

		$this->events[$eventName][] =& $method;
	}

	public function unbind($eventName)
	{
		$this->events[$eventName] = null;
	}

	public function trigger($eventName)
	{
		if (isset($this->events[$eventName])) {
			foreach($this->events[$eventName] as &$event) {
				$event();
			}
		}
	}
}