<?php
namespace WYSIWYGWikiLingo;

class Parser extends Definition
{
	/**
	 * construct
	 *
	 * @access  public
	 */
	public function __construct()
	{
		$this->emptyParserValue = new Parsed();

		$this->events = new Events(__CLASS__);

		parent::__construct();

		$this->renderer = new Render($this);
	}

    public function preParse()
    {
        $this->typeIndex = [];
        $this->typeStack = [];
        $this->type = [];
        $this->processedTypeStack = [];

        $this->htmlElementStack = [];
        $this->htmlElementStackCount = [];
        $this->htmlElementsStackCount = 0;
        $this->htmlElementsStack = [];
    }

    public function parse($input)
    {
        if (empty($input)) {
            return $input;
        }

        $this->parsing = true;
        $this->preParse();
        $parsed = parent::parse($input);
        $this->parsing = false;
        $output = $this->postParse($parsed);

        return $output;
    }

    public function postParse(Parsed &$parsed)
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
}