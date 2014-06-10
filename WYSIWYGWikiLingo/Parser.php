<?php
namespace WYSIWYGWikiLingo;

/**
 * Class Parser
 * @package WYSIWYGWikiLingo
 */
class Parser extends Definition
{
    public $lexerErrors = array();
    public $parserErrors = array();

    /**
     *
     */
    public function __construct()
	{
		$this->emptyParserValue = new Parsed();

		$this->events = new Events(__CLASS__);
        $this->renderer = new Renderer($this);

		parent::__construct();
	}

    /**
     *
     */
    public function preParse()
    {
        $this->typeIndex = [];
        $this->typeStack = [];
        $this->processedTypeStack = [];

        $this->htmlElementStack = [];
        $this->htmlElementStackCount = 0;
        $this->htmlElementsStackCount = 0;
        $this->htmlElementsStack = [];
	    $this->inputAdjustedForLineAtBeginning = false;
    }

    /**
     * @param String $input
     * @return string
     */
    public function parse($input)
    {
        if (empty($input)) {
            return $input;
        }

        $this->parsing = true;
        $this->preParse();
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
     * @param Parsed $parsed
     * @return string
     */
    public function postParse(Parsed $parsed)
    {
        /* While parsing we add a "\n" to the beginning of all block types, but if the input started with a block char,
         * it is also valid, but treated and restored as with "\n" just before it, here we remove that extra "\n" but
         * only if we are a block, which are determined from $this->blockChars
        */

        $output = $this->renderer->render($parsed);

        if ($parsed->isBlock) { //remove the "\n"
            $output = substr($output, 1);
        }

	    return $output;

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