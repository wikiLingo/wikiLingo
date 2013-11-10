<?php
/**
 * @namespace
 */
namespace WikiLingo;

use Exception;
use WikiLingo\Renderer;

/**
 * @constructor
 */
abstract class Base
{
    /* parser tracking */
    public $types = array();
    public $typesCount = array();

    public $events;

    /* plugin tracking */
    public $pluginStack = array();
    public $pluginStackCount = 0;
    public $pluginInstances = array();
    public $plugins = array();
    public static $pluginIndexes = array();
    public $originalInput = '';

    /* track syntax that is broken */
    public $repairingStack = array();

    /* np tracking */
    public $npStack = false; //There can only be 1 active np stack

    /* pp tracking */
    public $ppStack = false; //There can only be 1 active np stack

	/* tc tracking */
	public $tcStack = false; //There can only be 1 active tc stack

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
            'linkStack' => true,
	        'tcStack' => true
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

}