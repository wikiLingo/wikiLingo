<?php
namespace WikiLingo;

class Events
{
	public $events = array();

	public function bind($class, $event, &$fn)
	{
        $eventName = $class . '.' . $event;
		if (!isset($this->events[$eventName])) {
			$this->events[$eventName] = array();
		}

		$this->events[$eventName][] =& $fn;
	}

	public function unbind($eventName)
	{
		$this->events[$eventName] = null;
	}

	public function trigger($class, $event, &$item = null, &$out = null)
	{
        $eventName = $class . '.' . $event;
		if (isset($this->events[$eventName])) {
			foreach($this->events[$eventName] as &$fn) {
				$fn($item, $out);
			}
		}
	}
}