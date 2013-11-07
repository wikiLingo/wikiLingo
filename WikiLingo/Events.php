<?php
namespace WikiLingo;

class Events
{
	//possible events, I hate to re-declare all of them, but it is strongly typed, what can you say
	private $ExpressionPluginExists = array();
    private $ExpressionPluginPreRender = array();

    private $ExpressionTagAllowed = array();
    private $ExpressionTagRender = array();

    private $ExpressionVariableLookup = array();

    private $ExpressionWikiLinkRender = array();
    private $ExpressionWikiLinkTypeRender = array();

    private $ExpressionWordLinkExists = array();
    private $ExpressionWordLinkRender = array();

    private $ParsedRenderPermission = array();
    private $ParsedRenderBlocked = array();

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
	public function triggerExpressionPluginPreRender(Expression\Plugin &$plugin)
	{
		foreach($this->ExpressionPluginPreRender as &$event)
		{
			$event->trigger($plugin);
		}
	}


	public function triggerExpressionTagAllowed(Expression\Tag &$tag)
	{
		foreach($this->ExpressionTagAllowed as &$event)
		{
			$event->trigger($tag);
		}
	}

    public function triggerExpressionTagRender(Renderer\Element &$element, Expression\Tag &$tag)
    {
        foreach($this->ExpressionTagRender as &$event)
        {
            $event->trigger($element, $tag);
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

    public function triggerParsedRenderPermission(Parsed &$parsed)
    {
        foreach($this->ParsedRenderPermission as &$event)
        {
            $event->trigger($parsed);
        }
    }
    public function triggerParsedRenderBlocked(Parsed &$parsed, &$return)
    {
        foreach($this->ParsedRenderBlocked as &$event)
        {
            $event->trigger($parsed, $return);
        }
    }
}