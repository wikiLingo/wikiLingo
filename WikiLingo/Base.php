<?php
namespace WikiLingo;

use Zend\EventManager\EventManager;
use Exception;
use WikiLingo\Renderer;

class Base
{
    /* parser tracking */
    private $parsing = false;
    public $parseDepth = 0;
    public $types = array();
    public $typesCount = array();

    /* the root parser, where many variables need to be tracked from, maintained on any hierarchy of children parsers */
    public $Parser;

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
    public $prefs;
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

	    /*//TODO: move to expression post-parse
        $negotiator =& $this->pluginNegotiator;

        $negotiator->setPlugin($plugin);

        if ( !$this->optionSkipValidation ) {
            $status = $negotiator->canExecute();
        } else {
            $status = true;
        }

        if ($status === true) {
            //$plugins is a bit different that pluginEntries, an entry will be popped later, $plugins is more for
            tracking, although their values may be the same for a time, the end result will be an empty entries, but
            $plugins will have all executed plugin in it//
            $this->plugins[$negotiator->key] = $negotiator->body;

            $executed = $negotiator->execute();

            if ($negotiator->ignored == true) {
                return $executed;
            } else {
                $this->pluginEntries[$negotiator->key] = $this->parsePlugin($executed);
                return $negotiator->key;
            }
        } else {
            return $negotiator->blockFromExecution($status);
        }
	    */
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


    //end state handlers
    //Wiki Syntax Objects Parsing Start
    /**
     * syntax handler: noparse, ~np~$content~/np~
     *
     * @access  public
     * @param   $content string parsed string found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    public function noParse($content)
    {
        return new Expression\NoParse($content);
    }

    /**
     * syntax handler: pre, ~pp~$content~/pp~
     *
     * @access  public
     * @param   $content string parsed string found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function preFormattedText($content)
    {
	    return new Expression\PreFormattedText($content);
        //return new HtmlElement("preFormattedText", "pre", $content);
    }

    /**
     * syntax handler: double dynamic variable, %%$content%%
     *
     * @access  public
     * @param   $content string parsed string found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function doubleDynamicVar($content)
    {
        global $prefs;

        if ( $prefs['wiki_dynvar_style'] != 'double') {
            return $content;
        }


        return $this->dynamicVar->ui(substr($content, 2, 2), $this->getOption('language'), true);
    }

    /**
     * syntax handler: single dynamic variable, %$content%
     *
     * @access  public
     * @param   $content string parsed string found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function singleDynamicVar($content)
    {
        global $prefs;

        if ( $prefs['wiki_dynvar_style'] != 'single') {
            return $content;
        }

        return $this->dynamicVar->ui(substr($content, 1, 1), $this->getOption('language'));
    }

    /**
     * syntax handler: argument variable, {{$content}}
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function argumentVar($content)
    {
        $content = substr($content, 2, -2); //{{page}}

        global $user, $page;
        $parts = explode('|', $content);
        $value = '';
        $name = '';

        if (isset($parts[0])) {
            $name = $parts[0];
        }

        if (isset($parts[1])) {
            $value = $parts[1];
        }

        switch( $name ) {
            case 'user':
                $value = $user;
                break;
            case 'page':
                $value = $this->getOption('page');
                break;
            default:
                if ( isset($_REQUEST[$name]) ) {
                    $value = $_REQUEST[$name];
                }
                break;
        }

        return $value;
    }

    /**
     * syntax handler: bold/strong, __$content__
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function bold($content) //__content__
    {
	    return new Expression\Bold($content);
        //return new HtmlElement("bold", "strong", $content);
    }

    /**
     * syntax handler: simple box, ^$content^
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function box($content) //^content^
    {
	    return new Expression\Box($content);
        //return new HtmlElement("box", "div", $content->text, array("class" => "simplebox"));
    }

    /**
     * syntax handler: center, ::$content::
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function center($content) //::content::
    {
	    return new Expression\Center($content);
        /*return new HtmlElement(
            "center",
            "div",
            $content,
            array(
                "style" => "text-align: center;"
            )
        );*/
    }

    /**
     * syntax handler: code, -+$content+-
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function code($content)
    {
	    return new Expression\Code($content);
        //return new HtmlElement("code", "code", $content);
    }

    /**
     * syntax handler: text color, ~~$color:$content~~
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function color($content)
    {
        $text = explode(':', $content);
        $color = $text[0];
        $content = $text[1];

	    return new Expression\Color($color, $content);
	    /*
        return new HtmlElement(
            "color", "span", $content,
            array(
                "style" => "color:" . $color .';'
            )
        );*/
    }

    /**
     * syntax handler: italic/emphasis, ''$content''
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function italic($content) //''content''
    {
	    return new Expression\Italic($content);
        //return new HtmlElement("italic", "em", $content);
    }

    /**
     * syntax handler: left to right, \n{l2r}$content
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function l2r($content)
    {
        $content = substr($content, 5);
	    return new Expression\L2R($content);
	    /*
        return new HtmlElement(
            "l2r", "div", $content,
            array(
                "dir" => "ltr"
            )
        );*/
    }

    /**
     * syntax handler: right to left, \n{r2l}$content
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function r2l($content)
    {
        $content = substr($content, 5);
	    return new Expression\R2L($content);
	    /*
        return new HtmlElement(
            "r2l", "div", $content,
            array(
                "dir" => "rtl"
            )
        );*/
    }

    /**
     * syntax handler: list, \n*$content
     * <p>
     * List types: * (unordered), # (ordered), + (line break), - (expandable), ; (definition list)
     * <p>
     * Uses $this->list as a processor. Is called from $this->block().
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function stackList($content)
    {
        $level = 0;
        $listLength = strlen($content);
        $type = '';
        $noiseLength = 0;

        for ($i = 0; $i < $listLength; $i++) {
            if (empty($type)) {
                //This will be the start of the string
                $type = $content{$i};
                $level++;

                //definitions are only 1 in depth
                if ($type == ';') {
                    break;
                }
            } else if (
                $content{$i} == "*" ||
                $content{$i} == "#" ||
                $content{$i} == "+"
            ) {
                $level++;
            } elseif ($content{$i} == '-') {
                $type .= $content{$i};
                $noiseLength++;
                break;
            } else {
                break;
            }
        }

        $content = substr($content, ($level + $noiseLength));
        $this->removeEOF($content);
        $result = $this->list->stack($this->line, $level, $content, $type);

        if (isset($result)) {
            $this->skipBr = true;
            return $result;
        }
        return '';
    }

    /**
     * syntax handler: horizontal row, ---
     *
     * @access  public
     * @return  string  html hr element
     */
    function hr() //---
    {
	    return new Expression\Row();
        /*$this->line++;
        $this->skipBr = true;
        return new HtmlElement("horizontalRow", "hr", "", array(), "inline");
        */
    }

    /**
     * syntax handler: new line, \n
     * <p>
     * Detects if a line break is needed and returns it. If $this->skipBr is set to true, skips output of <br /> and
     * sets it back to false for the next line to process
     *
     * @access  public
     * @param   $ch line line character
     * @return  string  $result of line process
     */
    function line($ch)
    {
	    return new Expression\Line($ch);
        //return new HtmlElement("line", "br", "", array(), "inline");
    }

    /**
     * syntax handler: forced line end, %%%
     * <p>
     * Note: does not affect line number
     *
     * @access  public
     * @return  string  html break, <br />
     */
    function forcedLineEnd($content)
    {
	    return new Expression\ForcedLine($content);
        //return new HtmlElement("forcedLineEnd", "br", "", array(), "inline");
    }

    /**
     * syntax handler: unlink, [[$content|$content]]
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function unlink($content) //[[content|content]
    {
        $contentLength = strlen($content);

        if ($content[$contentLength - 3] == "@" &&
            $content[$contentLength - 2] == "n" &&
            $content[$contentLength - 1] == "p"
        ) {
            $content = substr($content, 0, -3);
        }

        $contentLength = strlen($content);

        if ($content[$contentLength - 1] != "]" && strstr($content, "[[")) {
            $content = substr($content, 1);
        } else if (!strstr($content, "]]")) {
            $content = substr($content, 1);
        }

	    return new Expression\Unlink($content);

        //return new HtmlElement("unlink", "span", $content);
    }

    /**
     * syntax handler: link, [$content|$content], ((Page)), ((Page|$content)), (type(Page)), (type(Page|$content)), ((external:Page)), ((external:Page|$content))
     *
     * @access  public
     * @param   $type string type, np, wiki, alias (or whatever is "(here(", word
     * @param   $content string found inside detected syntax
     * @param   $includePageAsDataAttribute bool includes the page as an attribute in the link "data-page"
     * @return  string  $content desired output from syntax
     */
    function link($type, $page, $includePageAsDataAttribute = false) //[content|content]
    {
        global $tikilib, $prefs;

        if ($type == 'word' && $prefs['feature_wikiwords'] != 'y') {
            return $page;
        }

        $this->removeEOF($page);

        $wikiExternal = '';
        $parts = explode(':', $page);
        if (isset($parts[1]) && $type != 'external') {
            $wikiExternal = array_shift($parts);
            $page = implode(':', $parts);
        }

        $description = '';
        $parts = explode('|', $page);
        if (isset($parts[1])) {
            $page = array_shift($parts);
            $description = implode('|', $parts);
        }

        if (!empty($description)) {
            $feature_wikiwords = $prefs['feature_wikiwords'];
            $prefs['feature_wikiwords'] = 'n';
            $description = $this->parse($description);
            $this->removeEOF($description);
            $prefs['feature_wikiwords'] = $feature_wikiwords;
        }

        return Expression\Link::page($page, $this)
            ->setNamespace($this->getOption('namespace'))
            ->setDescription($description)
            ->setType($type)
            ->setSuppressIcons($this->getOption('suppress_icons'))
            ->setSkipPageCache($this->getOption('skipPageCache'))
            ->setWikiExternal($wikiExternal)
            ->includePageAsDataAttribute($includePageAsDataAttribute)
            ->getHtml();
    }

    /**
     * syntax handler: smile, :)
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function smile($content) //TODO: add all smile handling in parser
    {
        //this needs more tlc too
        //TODO: new WikiLingo_HtmlElement(
	    return new Expression\Smile($content);
        //return '<img src="img/smiles/icon_' . $content . '.gif" alt="' . $content . '" />';
    }

    /**
     * syntax handler: strike, --$content--
     *
     * @access  public
     * @param   $content string parsed content found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function strike($content) //--content--
    {
	    return new Expression\Strike($content);
    }

    /**
     * syntax handler: double dash, --
     *
     * @access  public
     * @return  dash characters
     */
    function doubleDash()
    {
	    return new Expression\DoubleDash();
        //return new HtmlElement("doubleDash", "span", " &mdash; ");
    }

    /**
     * syntax handler: characters
     *
     * @access  public
     * @param   $content char handler, upper or lower case
     * @return  string output of char
     */
    function char($content)
    {
        switch (strtolower($content)) {
            case "&":
                $result = '&amp;';
                break;
            case "~bs~":
                $result = '&#92;';
                break;
            case "~hs~":
                $result = '&nbsp;';
                break;
            case "~amp~":
                $result = '&amp;';
                break;
            case "~ldq~":
                $result = '&ldquo;';
                break;
            case "~rdq~":
                $result = '&rdquo;';
                break;
            case "~lsq~":
                $result = '&lsquo;';
                break;
            case "~rsq~":
                $result = '&rsquo;';
                break;
            case "~c~":
                $result = '&copy;';
                break;
            case "~--~":
                $result = '&mdash;';
                break;
            case "=>":
                $result = '=&gt;';
                break;
            case "~lt~":
                $result = '&lt;';
                break;
            case "~gt~":
                $result = '&gt;';
                break;
            case "{rm}":
                $result = '&rlm;';
                break;
        }

        //if it has not been caught, it is a number, ie ~([0-9]+)~
        if (!isset($result)) {
            $result = '';
            $possibleNumber = substr($content, 1, -1);
            if (is_numeric($possibleNumber)) {
                $result = "&#" . $possibleNumber . ";";
            }
        }

        return new HtmlElement("char", "span", $result);
    }

    /**
     * syntax handler: table, ||$content|$content\n$content|$content||
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function tableParser($content, $incomplete = false) /*|| | \n | ||*/
    {
        $tableContents = '';
        $rows = explode("\n", $content);

	    return new Expression\Table($content);

        if ($incomplete) {
            $result = '';
            end($rows);
            $lastKey = key($rows);
            foreach ($rows as $key => $row) {
                $result .= $row;
                if ($key < $lastKey) {
                    $result .= $this->line("\n");
                }
            }
            return $result;
        }

        for ($i = 0, $count_rows = count($rows); $i < $count_rows; $i++) {
            $row = '';

            $cells = explode('|', $rows[$i]);
            for ($j = 0, $count_cells = count($cells); $j < $count_cells; $j++) {
                $row .= $this->table_td($cells[$j]);
            }
            $tableContents .= $this->table_tr($row);
        }

        $tbody = new HtmlElement('tableBody', 'tbody', $tableContents);

        return new HtmlElement(
            "table", "table", $tbody,
            array(
                "class" => "wikitable"
            )
        );
    }

    /**
     * syntax handler table helper for tr
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    private function table_tr($content)
    {
        return new HtmlElement("tableRow", "tr", $content);
    }

    /**
     * syntax handler table helper for td
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    private function table_td($content)
    {
        return new HtmlElement(
            "tableData", "td", $content,
            array(
                "class" => "wikicell"
            )
        );
    }

    /**
     * syntax handler: titlebar, -=$content=-
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function titleBar($content) //-=content=-
    {
	    return new Expression\TitleBar($content);
	    /*
        $this->skipBr = true;
        return new HtmlElement(
            "titleBar", "div", $content,
            array(
                "class" => "titlebar"
            )
        );*/
    }

    /**
     * syntax handler: underscore, ===$content===
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function underscore($content) //===content===
    {
	    return new Expression\Underscore($content);
        //return new HtmlElement("underscore", "u", $content);
    }


    /**
     * syntax handler: tiki comment, ~tc~$content~/tc~
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function comment($content)
    {
	    return new Expression\Comment($content);
        //return '<!---->';
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
}