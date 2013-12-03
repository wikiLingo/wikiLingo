<?php
namespace WikiLingo;

class Events
{
	//possible events, I hate to re-declare all of them, but it is strongly typed, what can you say
	public $WikiLingoEventExpressionPluginExists = array();
    public $WikiLingoEventExpressionPluginPreRender = array();
    public $WikiLingoEventExpressionPluginPostRender = array();

    public $WikiLingoEventExpressionTagAllowed = array();
    public $WikiLingoEventExpressionTagRender = array();

    public $WikiLingoEventExpressionVariableLookup = array();

    public $WikiLingoEventExpressionWikiLinkRender = array();
    public $WikiLingoEventExpressionWikiLinkTypeRender = array();

    public $WikiLingoEventExpressionWordLinkExists = array();
    public $WikiLingoEventExpressionWordLinkRender = array();

    public $WikiLingoEventParsedRenderPermission = array();
    public $WikiLingoEventParsedRenderBlocked = array();

	public function bind(&$event)
	{
		//reduce to fully qualified class name, then remove WikiLingoEvent from front
        $eventName = str_replace("\\", "", get_class($event));
		$this->{$eventName}[] =& $event;

		return $this;
	}

	public function triggerExpressionPluginExists(Expression\Plugin &$plugin)
	{
		foreach($this->WikiLingoEventExpressionPluginExists as &$event)
		{
			$event->trigger($plugin);
		}
	}
	public function triggerExpressionPluginPreRender(Expression\Plugin &$plugin)
	{
		foreach($this->WikiLingoEventExpressionPluginPreRender as &$event)
		{
			$event->trigger($plugin);
		}
	}
	public function triggerExpressionPluginPostRender(&$rendered, Expression\Plugin &$plugin)
	{
		foreach($this->WikiLingoEventExpressionPluginPostRender as &$event)
		{
			$event->trigger($rendered, $plugin);
		}
	}


	public function triggerExpressionTagAllowed(Expression\Tag &$tag)
	{
		foreach($this->WikiLingoEventExpressionTagAllowed as &$event)
		{
			$event->trigger($tag);
		}
	}

    public function triggerExpressionTagRender(Renderer\Element &$element, Expression\Tag &$tag)
    {
        foreach($this->WikiLingoEventExpressionTagRender as &$event)
        {
            $event->trigger($element, $tag);
        }
    }

	public function triggerExpressionVariableLookup(&$key, Renderer\Element &$element, Expression\Variable &$variable)
	{
		foreach($this->WikiLingoEventExpressionVariableLookup as &$event)
		{
			$event->trigger($key, $element, $variable);
		}
	}

	public function triggerExpressionWikiLinkRender(Renderer\Element &$element, Expression\WikiLink &$wikiLink)
	{
		foreach($this->WikiLingoEventExpressionWikiLinkRender as &$event)
		{
			$event->trigger($element, $wikiLink);
		}
	}

	public function triggerExpressionWikiLinkTypeRender(Renderer\Element &$element, Expression\WikiLinkType &$wikiLinkType)
	{
		foreach($this->WikiLingoEventExpressionWikiLinkTypeRender as &$event)
		{
			$event->trigger($element, $wikiLinkType);
		}
	}

	public function triggerExpressionWordLinkExists($word, &$exists)
	{
		foreach($this->WikiLingoEventExpressionWordLinkExists as &$event)
		{
			$event->trigger($word, $exists);
		}
	}
	public function triggerExpressionWordLinkRender(Renderer\Element &$element, Expression\WordLink &$wordLink)
	{
		foreach($this->WikiLingoEventExpressionWordLinkRender as &$event)
		{
			$event->trigger($element, $wordLink);
		}
	}

    public function triggerParsedRenderPermission(Parsed &$parsed)
    {
        foreach($this->WikiLingoEventParsedRenderPermission as &$event)
        {
            $event->trigger($parsed);
        }
    }
    public function triggerParsedRenderBlocked(Parsed &$parsed, &$return)
    {
        foreach($this->WikiLingoEventParsedRenderBlocked as &$event)
        {
            $event->trigger($parsed, $return);
        }
    }
}