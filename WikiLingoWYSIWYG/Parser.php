<?php
namespace WikiLingoWYSIWYG;

use WikiLingo;
use WikiLingo\Utilities;
use WikiLingo\Parsed;
use WikiLingoWYSIWYG;

/**
 * Class Parser
 * @package WikiLingoWYSIWYG
 */
class Parser extends WikiLingo\Parser
{
    public $allowsMutation = false;
    public $wysiwyg = true;

    /**
     * @param Utilities\Scripts $scripts
     */
    public function __construct(Utilities\Scripts $scripts = null)
	{
		if ($scripts != null) {
			$this->scripts = $scripts;
		} else {
			$this->scripts = new Utilities\Scripts();
		}

		$this->emptyParserValue = new Parsed();

		$this->events = new WikiLingoWYSIWYG\Events();
        $this->renderer = new WikiLingoWYSIWYG\Renderer($this);

		parent::__construct();
	}
}