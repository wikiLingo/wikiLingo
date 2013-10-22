<?php
namespace WikiLingo;
use Zend\EventManager\EventManager;
use WikiLingo\Plugin;

class Parser extends Definition {

	public $renderer;
	private $parsing = false;
	private $pcreRecursionLimit;

	/**
	 * construct
	 *
	 * @access  public
	 */
	public function __construct()
	{
		$this->emptyParserValue = new Parsed();

        $this->events = new EventManager(__CLASS__);

		$this->pluginNegotiator = new Plugin\Negotiator($this);

        parent::__construct();

		$this->renderer = new Render($this);
    }

    /**
     * Where a parse generally starts.  Can be self-called, as this is detected, and if nested, a new parser is instantiated
     *
     * @access  private
     * @param   string  $input Wiki syntax to be parsed
     * @return  string  $output Parsed wiki syntax
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
     * Event just before JisonParser_Wiki->parse(), used to ready parser, ensuring defaults needed for parsing are set.
     * <p>
     * pcre.recursion_limit is temporarily changed here. php default is 100,000 which is just too much for this type of
     * parser. The reason for this code is the use of preg_* functions using pcre library.  Some of the regex needed is
     * just too much for php to handle, so by limiting this for regex we speed up the parser and allow it to safely
     * lex/parse a string more here: http://stackoverflow.com/questions/7620910/regexp-in-preg-match-function-returning-browser-error
     *
     * @access  private
     * @param   string  &$input input that will be parsed
     */
    private function preParse(&$input)
    {
        $this->pcreRecursionLimit = ini_get("pcre.recursion_limit");
        ini_set("pcre.recursion_limit", "524");


        $input = $input . "≤REAL_EOF≥"; //here we add 2 lines, so the parser doesn't have to do special things to track the first line and last, we remove these when we insert breaks, these are dynamically removed later
        $input = str_replace("\r", "", $input);

        $this->originalInput = preg_split('/\n/', $input);
    }

    /**
     * Event just after JisonParser_Wiki->parse(), used to ready parser, ensuring defaults needed for parsing are set.
     * <p>
     * pcre.recursion_limit is reset here if parser depth is 0 (ie, no nested parsing)
     *
     * @param   string  &$output parsed output of wiki syntax
     */
    function postParse(&$parsed)
    {
        return $this->renderer->render($parsed);
    }

    public function setInput($input)
    {
        parent::setInput($input);

        $this->begin('BOF');
    }
}