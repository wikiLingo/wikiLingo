<?php
namespace WikiLingo;

/**
 * Class Events
 * @package WikiLingo
 */
class Events
{
	//possible events, I hate to re-declare all of them, but it is strongly typed, what can you say
	public $WikiLingoEventTranslate = array();

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
     * @param $value
     * @param $context
     * @return mixed
     */
    public function triggerTranslate(&$value, $context)
	{
		foreach($this->WikiLingoEventTranslate as &$event)
		{
			return $event->trigger($value, $context);
		}

		return $value;
	}

    /**
     * @param Expression\Plugin $plugin
     */
    public function triggerExpressionPluginExists(Expression\Plugin &$plugin)
	{
		foreach($this->WikiLingoEventExpressionPluginExists as &$event)
		{
			$event->trigger($plugin);
		}
	}

    /**
     * @param Expression\Plugin $plugin
     */
    public function triggerExpressionPluginPreRender(Expression\Plugin &$plugin)
	{
		foreach($this->WikiLingoEventExpressionPluginPreRender as &$event)
		{
			$event->trigger($plugin);
		}
	}

    /**
     * @param $rendered
     * @param Expression\Plugin $plugin
     */
    public function triggerExpressionPluginPostRender(&$rendered, Expression\Plugin &$plugin)
	{
		foreach($this->WikiLingoEventExpressionPluginPostRender as &$event)
		{
			$event->trigger($rendered, $plugin);
		}
	}


    /**
     * @param Expression\Tag $tag
     */
    public function triggerExpressionTagAllowed(Expression\Tag &$tag)
	{
		foreach($this->WikiLingoEventExpressionTagAllowed as &$event)
		{
			$event->trigger($tag);
		}
	}

    /**
     * @param Renderer\Element $element
     * @param Expression\Tag $tag
     */
    public function triggerExpressionTagRender(Renderer\Element &$element, Expression\Tag &$tag)
    {
        foreach($this->WikiLingoEventExpressionTagRender as &$event)
        {
            $event->trigger($element, $tag);
        }
    }

    /**
     * @param $key
     * @param Renderer\Element $element
     * @param Expression\Variable $variable
     */
    public function triggerExpressionVariableLookup(&$key, Renderer\Element &$element, Expression\Variable &$variable)
	{
		foreach($this->WikiLingoEventExpressionVariableLookup as &$event)
		{
			$event->trigger($key, $element, $variable);
		}
	}

    /**
     * @param Renderer\Element $element
     * @param Expression\WikiLink $wikiLink
     */
    public function triggerExpressionWikiLinkRender(Renderer\Element &$element, Expression\WikiLink &$wikiLink)
	{
		foreach($this->WikiLingoEventExpressionWikiLinkRender as &$event)
		{
			$event->trigger($element, $wikiLink);
		}
	}

    /**
     * @param Renderer\Element $element
     * @param Expression\WikiLinkType $wikiLinkType
     */
    public function triggerExpressionWikiLinkTypeRender(Renderer\Element &$element, Expression\WikiLinkType &$wikiLinkType)
	{
		foreach($this->WikiLingoEventExpressionWikiLinkTypeRender as &$event)
		{
			$event->trigger($element, $wikiLinkType);
		}
	}

    /**
     * @param $word
     * @param $exists
     * @param $exists
     */
    public function triggerExpressionWordLinkExists($word, &$exists)
	{
		foreach($this->WikiLingoEventExpressionWordLinkExists as &$event)
		{
			$event->trigger($word, $exists);
		}
	}

    /**
     * @param Renderer\Element $element
     * @param Expression\WordLink $wordLink
     */
    public function triggerExpressionWordLinkRender(Renderer\Element &$element, Expression\WordLink &$wordLink)
	{
		foreach($this->WikiLingoEventExpressionWordLinkRender as &$event)
		{
			$event->trigger($element, $wordLink);
		}
	}

    /**
     * @param Parsed $parsed
     */
    public function triggerParsedRenderPermission(Parsed &$parsed)
    {
        foreach($this->WikiLingoEventParsedRenderPermission as &$event)
        {
            $event->trigger($parsed);
        }
    }

    /**
     * @param Parsed $parsed
     * @param $return
     */
    public function triggerParsedRenderBlocked(Parsed &$parsed, &$return)
    {
        foreach($this->WikiLingoEventParsedRenderBlocked as &$event)
        {
            $event->trigger($parsed, $return);
        }
    }
}