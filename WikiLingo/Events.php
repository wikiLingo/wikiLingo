<?php
namespace WikiLingo;

class Events
{
	//possible events, I hate to re-declare all of them, but it is strongly typed, what can you say
	public $ExpressionPluginExists = array();
	public $ExpressionPluginCanExecute = array();
	public $ExpressionPluginPreRender = array();
	public $ExpressionPluginRenderBlocked = array();

	public $ExpressionTagAllowed = array();

	public $ExpressionVariableLookup = array();

	public $ExpressionWikiLinkRender = array();
	public $ExpressionWikiLinkTypeRender = array();

	public $ExpressionWordLinkExists = array();
	public $ExpressionWordLinkRender = array();

	public function bind(&$event)
	{
		//reduce to fully qualified class name, then remove WikiLingoEvent from front
        $eventName = substr(str_replace("\\", "", get_class($event)), 14);
		$this->{$eventName}[] =& $event;

		return $this;
	}

	public function triggerExpressionPluginExists(Expression\Plugin &$plugin)
	{
		foreach($this->ExpressionPluginExists as &$event)
		{
			$event->trigger($plugin);
		}
	}
	public function triggerExpressionPluginCanExecute(Expression\Plugin &$plugin)
	{
		foreach($this->ExpressionPluginCanExecute as &$event)
		{
			$event->trigger($plugin);
		}
	}
	public function triggerExpressionPluginPreRender(Expression\Plugin &$plugin)
	{
		foreach($this->ExpressionPluginPreRender as &$event)
		{
			$event->trigger($plugin);
		}
	}
	public function triggerExpressionPluginRenderBlocked(Expression\Plugin &$plugin, &$return)
	{
		foreach($this->ExpressionPluginRenderBlocked as &$event)
		{
			$event->trigger($plugin, $return);
		}
	}

	public function triggerExpressionTagAllowed(Expression\Tag &$tag)
	{
		foreach($this->ExpressionTagAllowed as &$event)
		{
			$event->trigger($tag);
		}
	}

	public function triggerExpressionVariableLookup(&$key, Renderer\Element &$element, Expression\Variable &$variable)
	{
		foreach($this->ExpressionVariableLookup as &$event)
		{
			$event->trigger($key, $element, $variable);
		}
	}

	public function triggerExpressionWikiLinkRender(Renderer\Element &$element, Expression\WikiLink &$wikiLink)
	{
		foreach($this->ExpressionWikiLinkRender as &$event)
		{
			$event->trigger($element, $wikiLink);
		}
	}

	public function triggerExpressionWikiLinkTypeRender(Renderer\Element &$element, Expression\WikiLinkType &$wikiLinkType)
	{
		foreach($this->ExpressionWikiLinkTypeRender as &$event)
		{
			$event->trigger($element, $wikiLinkType);
		}
	}

	public function triggerExpressionWordLinkExists($word, &$exists)
	{
		foreach($this->ExpressionWordLinkExists as &$event)
		{
			$event->trigger($word, $exists);
		}
	}
	public function triggerExpressionWordLinkRender(Renderer\Element &$element, Expression\WordLink &$wordLink)
	{
		foreach($this->ExpressionWordLinkRender as &$event)
		{
			$event->trigger($element, $wordLink);
		}
	}
}