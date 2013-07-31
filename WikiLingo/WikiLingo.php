<?php
namespace WikiLingo;
use Zend\EventManager\EventManager;

class WikiLingo extends Definition {

	private $parsing = false;
	private $pcreRecursionLimit;

	public $cssLocations = array();
	public $scriptLocations = array();
	public $scripts = array();

	public $existingScriptsAndLocations = array();

	/**
	 * construct
	 *
	 * @access  public
	 */
	public function __construct()
	{
		global $user;
		$this->emptyParserValue = new Parsed();

		$this->user = (isset($user) ? $user : '');
		/*

		  if (isset($this->pluginNegotiator) == false) {
			  $this->pluginNegotiator = new WikiLingo\PluginNegotiator($this->Parser);
		  }

		  if (isset($this->Parser->list) == false) {
			  //$this->Parser->list = new WikiLingo_Expression_List($this->Parser);
		  }

		  if (isset($this->Parser->hotWords) == false) {
			  $this->Parser->hotWords = new WikiLingo\Expression\HotWords($this->Parser);
		  }

		  if (isset($this->Parser->smileys) == false) {
			  $this->Parser->smileys = new WikiLingo\Expression\Smileys();
		  }

		  if (isset($this->Parser->dynamicVar) == false) {
			  $this->Parser->dynamicVar = new WikiLingo\Expression\DynamicVariables($this->Parser);
		  }
  */
		if (isset($this->specialCharacter) == false) {
			$this->specialCharacter = new Expression\SpecialChar($this);
		}


		$this->events = new EventManager(__CLASS__);

		parent::__construct();
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
		$input = $this->specialCharacter->protect($input);

		$this->originalInput = preg_split('/\n/', $input);
	}

	/**
	 * Event just after JisonParser_Wiki->parse(), used to ready parser, ensuring defaults needed for parsing are set.
	 * <p>
	 * pcre.recursion_limit is reset here if parser depth is 0 (ie, no nested parsing)
	 *
	 * @access  private
	 * @param   string  &$output parsed output of wiki syntax
	 */
	function postParse(&$parsed)
	{
		/*
				//remove comment artifacts
				$output = str_replace("<!---->", "", $output);

				//Replace special end tag
				$this->removeEOF($output);

				if ( $this->getOption('parseLists') == true) {
					$lists = $this->Parser->list->toHtml();
					if (!empty($lists)) {
						$lists = array_reverse($lists);
						foreach ($lists as $key => &$list) {

							$output = str_replace($key, $list, $output);
							unset($list);

						}
					}
				}

				if (isset($this->Parser->smileys) && $this->getOption('parseSmileys')) {
					$this->Parser->smileys->parse($output);
				}

				$this->restorePluginEntities($output);

				if (isset($this->Parser->autoLink)) {
					$this->Parser->autoLink->parse($output);
				}

				if (isset($this->Parser->hotWords)) {
					$this->Parser->hotWords->parse($output);
				}

				if (isset($this->Parser->dynamicVar)) {
					$this->Parser->dynamicVar->makeForum($output);
				}

				if ($this->Parser->parseDepth == 0) {
					ini_set("pcre.recursion_limit", $this->pcreRecursionLimit);
					$output = $this->specialCharacter->unprotect($output);
				}
				*/

        $render = new Render($this);

		return $render->render($parsed);
	}


	public function addCssLocation( $href, $i = -1 )
	{
		if (isset($this->existingScriptsAndLocations[$href])) {
			return $this;
		}

		if ($i > -1) {
			$this->cssLocations[$i] = $href;
		} else {
			$this->cssLocations[] = $href;
		}

		$this->existingScriptsAndLocations[$href] = true;

		return $this;
	}

	public function addScriptLocation( $src, $i = -1 )
	{
		if (isset($this->existingScriptsAndLocations[$src])) {
			return $this;
		}

		if ($i > -1) {
			$this->scriptLocations[$i] = $src;
		} else {
			$this->scriptLocations[] = $src;
		}

		$this->existingScriptsAndLocations[$src] = true;

		return $this;
	}

	public function addScript( $script, $i = -1 )
	{
		if (isset($this->existingScriptsAndLocations[$script])) {
			return $this;
		}

		if ($i > -1) {
			$this->scripts[$i] = $script;
		} else {
			$this->scripts[] = $script;
		}

		$this->existingScriptsAndLocations[$script] = true;

		return $this;
	}

	public function renderCss()
	{
		$css = '';
		foreach ($this->cssLocations as $location) {
			$css .= "<link rel='stylesheet' type='text/css' href='" . $location . "' />";
		}
		return $css;
	}

	public function renderScript()
	{
		$scriptLocations = '';

		foreach ($this->scriptLocations as $location) {
			$scriptLocations .= "<script type='text/javascript' src='" . $location . "'></script>";
		}

		$scripts = "";
		foreach ($this->scripts as $script) {
			$scripts .=  $script;
		}


		return $scriptLocations . "<script type='text/javascript'>" . $scripts . "</script>";
	}
}