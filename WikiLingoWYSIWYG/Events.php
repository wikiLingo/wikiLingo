<?php
namespace WikiLingoWYSIWYG;

use WikiLingo;

class Events extends WikiLingo\Events
{
	//possible events, I hate to re-declare all of them, but it is strongly typed, what can you say
	public $WikiLingoWYSIWYGEventExpressionSyntaxRegistered = array();

	public function bind(&$event)
	{
		//reduce to fully qualified class name, then remove WikiLingoEvent from front
        $eventName = str_replace("\\", "", get_class($event));
		$this->{$eventName}[] =& $event;

		return $this;
	}

	public function triggerExpressionSyntaxRegistered(ExpressionType &$expression)
	{
		foreach($this->WikiLingoWYSIWYGEventExpressionSyntaxRegistered as &$event)
		{
			$event->trigger($expression);
		}
	}
}