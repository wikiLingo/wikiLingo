<?php
namespace WikiLingo;

use WikiLingo\Plugin;
use WikiLingo\Utilities;
use WikiLingo\Event;

/**
 * Class Parser
 * @package WikiLingo
 */
class Parser extends Definition
{

	public $scripts;
	private $parsing = false;
	private $pcreRecursionLimit;
    public $wysiwyg = false;

    /**
     * @param Utilities\Scripts $scripts
     */
    public function __construct(Utilities\Scripts &$scripts = null)
	{
		if (empty($this->scripts)) {
			if ($scripts != null ) {
				$this->scripts =& $scripts;
			} else {
				$this->scripts = new Utilities\Scripts();
			}
		}

		$this->emptyParserValue = new Parsed();

		if (empty($this->events)) {
            $this->events = new Events();
		}

        parent::__construct();
    }

    /**
     * @param String $input
     * @return String
     */
    function parse($input)
    {
        if (empty($input)) {
            return $input;
        }
        $this->parsing = true;
        $this->preParse($input);
        $parsed = parent::parse($input);
        $this->parsing = false;
        $output = $this->postParse($parsed);

        return $output;
    }

    /**
     * Event just before $this->parse($input), used to ready parser, ensuring defaults needed for parsing are set.
     *
     * pcre.recursion_limit is temporarily changed here. php default is 100,000 which is just too much for this type of
     * parser. The reason for this code is the use of preg_* functions using pcre library.  Some of the regex needed is
     * just too much for php to handle, so by limiting this for regex we speed up the parser and allow it to safely
     * lex/parse a string more here: http://stackoverflow.com/questions/7620910/regexp-in-preg-match-function-returning-browser-error
     *
     * @param $input
     */
    public function preParse(&$input)
    {
        $this->pcreRecursionLimit = ini_get("pcre.recursion_limit");
        ini_set("pcre.recursion_limit", "524");

        $this->blocks = array();
        $this->blocksLength = 0;
        $input = $input . "≤REAL_EOF≥"; //this is dynamically removed later
        $input = str_replace("\r", "", $input);
        //this is used for returning the syntax of a parsed
        $this->originalInput = explode("\n", $input);
        //$this->originalInput = preg_split('/\n/', $input);
    }

    /**
     * Where what has been parsed is then rendered
     * @param Parsed $parsed
     * @return string
     */
    public function postParse(Parsed &$parsed)
    {
        $rendered = $parsed->render();
        $rendered = $this->events->triggerPostRender($rendered);
        return $rendered;
    }

    /**
     * @param $input
     */
    public function setInput($input)
    {
        parent::setInput($input);

        $this->begin('BOF');
    }
}