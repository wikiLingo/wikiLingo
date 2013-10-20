<?php
/**
 * @namespace
 */
namespace WikiLingo;

use Zend\EventManager\EventManager;
use Exception;
use WikiLingo\Renderer;

/**
 * @constructor
 */
class Base
{
    /* parser tracking */
    private $parsing = false;
    public $parseDepth = 0;
    public $types = array();
    public $typesCount = array();

    public $events;

    /* parser debug */
    public $parserDebug = false;
    public $lexerDebug = false;

    /* plugin tracking */
    public $pluginStack = array();
    public $pluginStackCount = 0;
    public $pluginEntries = array();
    public $plugins = array();
    public static $pluginIndexes = array();
    public $pluginNegotiator;
    public $originalInput = '';

    /* track syntax that is broken */
    public $repairingStack = array();

    /* np tracking */
    public $npStack = false; //There can only be 1 active np stack

    /* pp tracking */
    public $ppStack = false; //There can only be 1 active np stack

    /* link tracking*/
    public $linkStack = false; //There can only be 1 active link stack

	public $blocks = array();
	public $blocksLength = 0;

    /* used in block level items, should be set to true if the next line needs skipped of a <br />
    The next break sets it back to false; */
    public $skipBr = false;
    public $tableStack = array();

    /* list tracking and parser */
    public $lists = array();
    public $listsLength = 0;

    public $headers = array();
    public $headersLength = 0;

    /* autoLink parser */
    public $autoLink;

    /* wiki link parser */
    public $link;

    /*hotWords parser */
    public $hotWords;

    /* smiley parser */
    public $smileys;

    /* dynamic var parser */
    public $dynamicVar;

    /* special character */
    public $specialCharacter;

    /* html tag tracking */
    public $nonBreakingTagDepth = 0;

    public $user;
    public $page;

    public $isHtmlPurifying = false;

    public $option = array();
	public $optionProtectEmail = false;
	public $optionSkipValidation = false;
    public $optionIsHtml = false;
    public $optionAbsoluteLinks = false;
    public $optionLanguage = '';
    public $optionPrint = false;
    public $optionPreviewMode = false;
    public $optionSuppressIcons = false;
    public $optionParseTOC = true;
    public $optionParseSmileys = true;
    public $optionSkipPageCache = false;



    /*
        function parserPerformAction(&$thisS, $yytext, $yyleng, $yylineno, $yystate, $S, $_S, $O)
        {
            $result = parent::parser_performAction($thisS, $yytext, $yyleng, $yylineno, $yystate, $S, $_S, $O);
            if ($this->parserDebug == true) {
                $thisS = "{" . $thisS . ":" . $yystate ."," . $this->skipBr . "}";
            }
            return $result;
        }

        function lexerPerformAction(&$yy, $yy_, $avoiding_name_collisions, $YY_START = null) {
            $result = parent::lexer_performAction($yy, $yy_, $avoiding_name_collisions, $YY_START);
            if ($this->lexerDebug == true) {
                echo "{" . $result . ":" .$avoiding_name_collisions . "," . $this->skipBr . "}" . $yy_->yytext . "\n";
            }
            return $result;
        }

        function parseError($error, $info)
        {
            echo $error;
            die;
        }
    */



    public function addType($class, &$type)
    {
        if (empty($this->types[$class])) {
            $this->types[$class] = array();
            $this->typesCount[$class] = -1;
        }
        $this->types[$class][] =& $type;
        $this->typesCount[$class]++;
        return $type->index = $this->typesCount[$class];
    }

    /**
     * Parse a plugin's body.  public so that negotiator can use.  option 'noparseplugins' makes this function return the body without parse.
     *
     * @access  public
     * @param   string  $input Plugin body
     * @return  string  $output Parsed plugin body or $input if not parsed
     */
    public function parsePlugin($input)
    {
        if (empty($input)) return "";

        if ($this->getOption('noparseplugins') == false) {

            $is_html = $this->getOption('is_html');

            if ($is_html == false) {
                $this->setOption(array('is_html' => true));
            }

            $output = $this->parse($input);

            if ($is_html == false) {
                $this->setOption(array('is_html' => $is_html));
            }

            return $output;
        } else {
            return $input;
        }
    }

	public function content(&$content)
	{
		return new Expression\Content($content);
	}

    /**
     * Handles plugins directly from the wiki parser.  A plugin can be on a different level of the current parser, and
     * if so, the execution is delayed until the parser reaches that level.
     *
     * @access  private
     * @param   array  &$pluginDetails plugins details in an array
     * @return  string  either returns $key or block from execution message
     */
    public function plugin(&$name, &$parameters, &$end = null, &$body = null)
    {
        if (is_null($body)) {
            return new Expression\Plugin($name->text, $parameters->text, (isset($end->text) ? $end->text : null), null, null, '');
        }

        return new Expression\Plugin($name->text, $parameters->text, $end->text, $body->text, $this->syntaxBetween($parameters->loc, $end->loc), $this->syntax($name->loc, $end->loc));
    }

    public function inlinePlugin($yytext)
    {
        $pluginName = $this->match('/^\{([a-z]+)/', $yytext);
        return new Expression\Plugin($pluginName, $yytext, '', $yytext, '');
    }

    /**
     * Stacks plugins for execution, since plugins can be called within each other.  Public because called directly by
     * the lexer of the wiki parser
     *
     * @access  public
     * @param   string  $yytext The analysed text from the wiki parser
     */
    public function stackPlugin($name)
    {
        $this->pluginStackCount++;
	    $this->pluginStack[] = substr($name, 1, -1);
    }

    /**
     * Detects if we are in a state that we can call the lexed grammer 'content'.  Since the execution technique from
     * the parser is inside-out, this helps us reverse the execution from outside-in in some cases.
     *
     * @access  public
     * @param   array  $skipTypes List of different ignourable stack types found on $this, like npStack, ppStack, or lineStack
     * @return  string  true if content is current not parse-able
     */
    public function isContent($skipTypes = array())
    {
        //These types will be found in $this.  If any of these states are active, we should NOT parse wiki syntax
        $types = array(
            'npStack' => true,
            'ppStack' => true,
            'linkStack' => true
        );

        foreach ($skipTypes as $skipType) {
            if (isset($types[$skipType])) {
                unset($types[$skipType]);
            }
        }

        //second, if we are not in a plugin, check if we are in content, ie, non-parse-able wiki syntax
        foreach ($types as $type => $value) {
            if ($this->$type == $value) {
                return true;
            }
        }

        //lastly, if we are not in content, return null, which allows cases to continue lexing
        return null;
    }

    /**
     * helper function to detect what is at the beginning of a string
     *
     * @access  public
     * @param   $haystack
     * @param   $needle
     * @return  bool  true if found at beginning, false if not
     */
    function beginsWith($haystack, $needle)
    {
        return (strncmp($haystack, $needle, strlen($needle)) === 0);
    }

    /**
     * helper function to detect a match in string
     *
     * @access  public
     * @param   $pattern
     * @param   $subject
     * @return  bool  true if found at beginning, false if not
     */
    function match($pattern, $subject)
    {
        preg_match($pattern, $subject, $match);

        return (!empty($match[1]) ? $match[1] : false);
    }

    function isRepairing($syntaxType, $pop = false)
    {
        $isRepairing = false;
        end($this->repairingStack);
        $key = key($this->repairingStack);


        if (isset($this->repairingStack[$key])) {
            $lastRepaired = $this->repairingStack[$key];

            if ($lastRepaired == $syntaxType) {
                $isRepairing = true;
                if ($pop == true) {
                    array_pop($this->repairingStack);
                }
            }
        }

        return $isRepairing;
    }

    function syntax(ParserLocation $startLoc, ParserLocation $endLoc = null)
    {
        $firstLine = $startLoc->firstLine;
        $lastLine = (isset($endLoc) ? $endLoc->lastLine : $startLoc->lastLine);
        $firstColumn = $startLoc->firstColumn;
        $lastColumn = (isset($endLoc) ? $endLoc->lastColumn : $startLoc->lastColumn);

        $input = $this->originalInput;

        if ($firstLine == $lastLine) {
            $text = $input[$firstLine - 1];
            $fromEnd = -(strlen($text) - $lastColumn);
            $syntax = substr($text, $firstColumn, $fromEnd);
            return $syntax;
        } else {
            $syntax = '';
            for ($i = $firstLine; $i <= $lastLine; $i++) {
                if ($i == $firstLine) { //first line
                    $syntax .= substr($input[$i - 1], $firstColumn);

                } else if ($i == $lastLine) {//last line
                    $syntax .= substr($input[$i - 1], 0, $lastColumn);

                } else {//lines in between
                    $syntax .= $input[$i - 1];
                }
            }

            return $syntax;
        }
    }

    public function syntaxBetween(ParserLocation $startLoc, ParserLocation $endLoc)
    {
        $firstLine = $startLoc->lastLine;
        $lastLine = $endLoc->firstLine;
        $firstColumn = $startLoc->lastColumn;
        $lastColumn = $endLoc->firstColumn;

        $input = $this->originalInput;

        if ($firstLine == $lastLine) {
            $text = $input[$firstLine - 1];
            $fromEnd = -(strlen($text) - $lastColumn);
            $syntax = substr($text, $firstColumn, $fromEnd);
            return $syntax;
        } else {
            $syntax = '';
            for ($i = $firstLine; $i <= $lastLine; $i++) {
                if ($i == $firstLine) { //first line
                    $syntax .= substr($input[$i - 1], $firstColumn);

                } else if ($i == $lastLine) {//last line
                    $syntax .= substr($input[$i - 1], 0, $lastColumn);

                } else {//lines in between
                    $syntax .= $input[$i - 1];
                }
            }

            return $syntax;
        }
    }

	function element($type, $name)
	{
        return new Renderer\Element($type, $name);
	}

	function helper($name)
	{
        return new Renderer\Helper($name);
	}

    function removeEOF( &$output )
    {
        $output = str_replace("≤REAL_EOF≥", "", $output);
    }

    public function setInput($input)
    {
        parent::setInput($input);

        $this->begin('BOF');
    }

	public function bind($eventName, $fn)
	{
		if (!isset($this->events)) {
			$this->events = new Events();
		}

		$this->events->bind($eventName, $fn);
	}

	public function unbind($eventName)
	{
		if (isset($this->events)) {
			$this->events->unbind($eventName);
		}
	}

	public function trigger($eventName)
	{
		if (isset($this->events)) {
			$this->events->trigger($eventName);
		}
	}
}