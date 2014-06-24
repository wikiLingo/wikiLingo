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

	public $scripts = null;
	private $parsing = false;
	private $pcreRecursionLimit = null;
    public $wysiwyg = false;
    public $renderer;
    public $expressionInstantiator;
    public $lexerErrors = array();
    public $parserErrors = array();

    /**
     * @param Utilities\Scripts $scripts
     * @param Renderer $renderer
     * @param ExpressionInstantiator $expressionInstantiator;
     */
    public function __construct(Utilities\Scripts $scripts = null, $renderer = null, $expressionInstantiator = null)
	{
		if ($this->scripts === null) {
			if ($scripts !== null ) {
				$this->scripts = $scripts;
			} else {
				$this->scripts = new Utilities\Scripts();
			}
		}

        if ($this->renderer === null) {
            if ($renderer !== null ) {
                $this->renderer = $renderer;
            } else {
                $this->renderer = new Renderer($this);

            }
        }

        if ($this->expressionInstantiator === null) {
            if ($expressionInstantiator !== null) {
                $this->expressionInstantiator = $expressionInstantiator;
            } else {
                $this->expressionInstantiator = new ExpressionInstantiator($this);
            }
        }

		$this->emptyParserValue = new Parsed();
		$this->variableContextStack = new Utilities\Stack();

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

        //there was a failure
        if ($parsed === true) {
            return null;
        }

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
        if (function_exists('ini_get') && function_exists('ini_set')) {
            $this->pcreRecursionLimit = ini_get("pcre.recursion_limit");
            ini_set("pcre.recursion_limit", "524");
        }

        $this->blocks = array();
        $this->blocksLength = 0;
        $this->pluginStack = array();
        $this->pluginStackCount = 0;

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
    public function postParse(Parsed $parsed)
    {
        if ($this->pcreRecursionLimit != null && function_exists('ini_get') && function_exists('ini_set')) {
            ini_set("pcre.recursion_limit", $this->pcreRecursionLimit);
        }

	    $parsed = $this->events->triggerPreRender($parsed);
        $rendered = $this->renderer->render($parsed);
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

    public function lexerError($str = "", LexerError $hash = null)
    {
        $this->lexerErrors[] = $str;
        if ($this->verbose) {
            parent::lexerError($str, $hash);
        }
    }

    public function parseError($str = "", ParserError $hash = null)
    {
        $this->parserErrors[] = $str;
        if ($this->verbose) {
            parent::parseError($str, $hash);
        }
    }
}