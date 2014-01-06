<?php
namespace WikiLingoWYSIWYG;

use WikiLingo;
use WikiLingo\Renderer;
use WikiLingo\Utilities;
use WikiLingo\Parsed;

/**
 * Class Parser
 * @package WikiLingoWYSIWYG
 */
class Parser extends WikiLingo\Parser
{
    public $wysiwyg = true;

    /**
     * @param Utilities\Scripts $scripts
     */
    public function __construct(Utilities\Scripts &$scripts = null)
	{
		if ($scripts != null) {
			$this->scripts =& $scripts;
		} else {
			$this->scripts = new Utilities\Scripts();
		}

		$this->emptyParserValue = new Parsed();

		$this->events = new \WikiLingoWYSIWYG\Events();

		parent::__construct();
	}

    /**
     * @param $type
     * @param $name
     * @return Renderer\Element
     */
    function element($type, $name)
    {
        $element = new Renderer\Element($type, $name);
        $element->useDetailedAttributes = true;
        return $element;
    }

    /**
     * @param $name
     * @return Renderer\Helper
     */
    function helper($name)
    {
        $helper = new Renderer\Helper($name);
        $helper->useDetailedAttributes = true;
        return $helper;
    }
}