<?php
namespace WikiLingo;


use WikiLingo\Plugin\Parameter;
use WikiLingo\Expression\BlockType\Header;

/**
 * Class Events
 * @package WikiLingo
 */
class Events
{
	//possible events, I hate to re-declare all of them, but it is strongly typed, what can you say
	public $WikiLingoEventTranslate = array();

	public $WikiLingoEventExpressionBlockTypeHeaderIdLookup = array();

	public $WikiLingoEventExpressionPluginExists = array();
    public $WikiLingoEventExpressionPluginPreRender = array();
    public $WikiLingoEventExpressionPluginPostRender = array();

    public $WikiLingoEventExpressionTagAllowed = array();
    public $WikiLingoEventExpressionTagRender = array();

    public $WikiLingoEventExpressionVariableContext = array();
    public $WikiLingoEventExpressionVariableLookup = array();

    public $WikiLingoEventExpressionWikiLinkRender = array();
    public $WikiLingoEventExpressionWikiLinkTypeRender = array();

    public $WikiLingoEventExpressionWordLinkExists = array();
    public $WikiLingoEventExpressionWordLinkRender = array();

    public $WikiLingoEventParsedRenderPermission = array();
    public $WikiLingoEventParsedRenderBlocked = array();

    public $WikiLingoEventPreRender = array();
    public $WikiLingoEventPostRender = array();

    /**
     * @param $event
     * @return $this
     */
    public function bind($event)
	{
		//reduce to fully qualified class name, then remove WikiLingoEvent from front
        $eventName = str_replace("\\", "", get_class($event));
		$this->{$eventName}[] = $event;

		return $this;
	}

    /**
     * @param $value
     * @param $context
     * @return string
     */
    public function triggerTranslate($value, $context)
	{
		foreach($this->WikiLingoEventTranslate as &$event)
		{
			return $event->trigger($value, $context);
		}

		return $value;
	}


	/**
	 * @param string $id
	 * @param Header $header
	 * @return string
	 */
	public function triggerExpressionBlockTypeHeaderIdLookup($id, Header $header)
	{
		foreach($this->WikiLingoEventExpressionBlockTypeHeaderIdLookup as $event)
		{
			return $event->trigger($id, $header);
		}

		return $id;
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
     * @param Model\Element $element
     * @param Expression\Tag $tag
     */
    public function triggerExpressionTagRender(Model\Element &$element, Expression\Tag &$tag)
    {
        foreach($this->WikiLingoEventExpressionTagRender as &$event)
        {
            $event->trigger($element, $tag);
        }
    }

    /**
     * @param $parser
     * @return array
     */
    public function triggerVariableContext(&$parser)
    {
        $result = array();
        foreach($this->WikiLingoEventExpressionVariableContext as &$event)
        {
            return $event->trigger($parser);
        }

        return $result;
    }

    /**
     * @param $key
     * @param Model\Element $element
     * @param Expression\Variable $variable
     */
    public function triggerExpressionVariableLookup(&$key, Model\Element &$element, Expression\Variable &$variable)
	{
		foreach($this->WikiLingoEventExpressionVariableLookup as &$event)
		{
			$event->trigger($key, $element, $variable);
		}
	}

    /**
     * @param Model\Element $element
     * @param Expression\WikiLink $wikiLink
     */
    public function triggerExpressionWikiLinkRender(Model\Element &$element, Expression\WikiLink &$wikiLink)
	{
		foreach($this->WikiLingoEventExpressionWikiLinkRender as &$event)
		{
			$event->trigger($element, $wikiLink);
		}
	}

    /**
     * @param Model\Element $element
     * @param Expression\WikiLinkType $wikiLinkType
     */
    public function triggerExpressionWikiLinkTypeRender(Model\Element &$element, Expression\WikiLinkType &$wikiLinkType)
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
     * @param Model\Element $element
     * @param Expression\WordLink $wordLink
     */
    public function triggerExpressionWordLinkRender(Model\Element &$element, Expression\WordLink &$wordLink)
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

	/**
	 * @param Parsed $parsed
	 * @return Parsed
	 */
	public function triggerPreRender(&$parsed)
	{
		foreach($this->WikiLingoEventPreRender as &$event)
		{
			$event->trigger($parsed);
		}

		return $parsed;
	}

    /**
     * @param String $rendered
     * @return String
     */
    public function triggerPostRender(&$rendered)
    {
        foreach($this->WikiLingoEventPostRender as &$event)
        {
            $event->trigger($rendered);
        }

        return $rendered;
    }


    public function clear()
    {

        $classVars = get_class_vars(get_class($this));

        foreach ($classVars as $name => $value) {
            if (is_array($value)) {
                $this->$name = array();
            }
        }
    }
}