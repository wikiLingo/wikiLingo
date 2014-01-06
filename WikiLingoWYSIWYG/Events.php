<?php
namespace WikiLingoWYSIWYG;

use WikiLingo;

/**
 * Class Events
 * @package WikiLingoWYSIWYG
 */
class Events extends WikiLingo\Events
{
	//possible events, I hate to re-declare all of them, but it is strongly typed, what can you say
	public $WikiLingoWYSIWYGEventExpressionSyntaxRegistered = array();

    /**
     * @param $event
     * @return $this
     */
    public function bind(&$event)
	{
		//reduce to fully qualified class name, then remove WikiLingoEvent from front
        $eventName = str_replace("\\", "", get_class($event));
		$this->{$eventName}[] =& $event;

		return $this;
	}

    /**
     * @param ExpressionType $expression
     */
    public function triggerExpressionSyntaxRegistered(ExpressionType &$expression)
	{
		foreach($this->WikiLingoWYSIWYGEventExpressionSyntaxRegistered as &$event)
		{
			$event->trigger($expression);
		}
	}
}