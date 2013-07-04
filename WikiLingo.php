<?php
class WikiLingo extends WikiLingo_Definition
{
    /* parser tracking */
    private $parsing = false;
    private static $spareParsers = array();
    public $parseDepth = 0;

    /* the root parser, where many variables need to be tracked from, maintained on any hierarchy of children parsers */
    public $Parser;

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

    /* header tracking */
    public $header;
    public $headerStack = false;

    /* list tracking and parser */
    public $list;

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

    /* line tracking */
    public $isFirstBr = false;
    public $line = 0;

    public $user;
    public $prefs;
    public $page;

    public $isHtmlPurifying = false;
    private $pcreRecursionLimit;

    public $cssLocations = array();
    public $scriptLocations = array();
    public $scripts = array();

    public $existingScriptsAndLocations = array();

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

    /**
     * construct
     *
     * @access  public
     * @param   JisonParser_Wiki_Handler  $Parser Filename to be used
     */
    public function __construct(JisonParser_Wiki_Handler &$Parser = null)
    {
        global $user;
        $this->emptyParserValue = new WikiLingo_Expression();
        parent::__construct();


        $this->user = (isset($user) ? $user : '');

        if (empty($Parser)) {
            $this->Parser = &$this;
        } else {
            $this->Parser = &$Parser;
        }

        if (isset($this->pluginNegotiator) == false) {
            $this->pluginNegotiator = new WikiLingo_PluginNegotiator($this->Parser);
        }

        if (isset($this->Parser->header) == false) {
            $this->Parser->header = new WikiLingo_Expression_Header($this->Parser);
        }

        if (isset($this->Parser->list) == false) {
            $this->Parser->list = new WikiLingo_Expression_List($this->Parser);
        }

        if (isset($this->Parser->hotWords) == false) {
            $this->Parser->hotWords = new WikiLingo_Expression_HotWords($this->Parser);
        }

        if (isset($this->Parser->smileys) == false) {
            $this->Parser->smileys = new WikiLingo_Expression_Smileys();
        }

        if (isset($this->Parser->dynamicVar) == false) {
            $this->Parser->dynamicVar = new WikiLingo_Expression_DynamicVariables($this->Parser);
        }

        if (isset($this->specialCharacter) == false) {
            $this->specialCharacter = new WikiLingo_Expression_SpecialChar($this->Parser);
        }

        parent::__construct();
    }

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

        if ($this->parsing == true) {
            $class = get_class($this->Parser);
            $parser = new $class($this->Parser);
            $output = $parser->parse($input);
            unset($parser);
        } else {
            $this->parsing = true;

            $this->preParse($input);

            $this->Parser->parseDepth++;
            $output = parent::parse($input)->text;
            $this->Parser->parseDepth--;

            $this->parsing = false;
            $this->postParse($output);
        }

        return $output;
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
        if ($this->Parser->parseDepth == 0) {
            $this->pcreRecursionLimit = ini_get("pcre.recursion_limit");
            ini_set("pcre.recursion_limit", "524");

            $this->Parser->list->reset();
        }

        $this->line = 0;
        $this->isFirstBr = false;
        $this->skipBr = false;
        $this->tableStack = array();
        $this->nonBreakingTagDepth = 0;
        $this->npStack = false;
        $this->ppStack = false;
        $this->linkStack = false;

        if ($input{0} == "\n" && $this->isBlockStartSyntax($input{1})) {
            $this->isFirstBr = true;
        }

        $input = "\n" . $input . "≤REAL_EOF≥"; //here we add 2 lines, so the parser doesn't have to do special things to track the first line and last, we remove these when we insert breaks, these are dynamically removed later
        $input = str_replace("\r", "", $input);
        $input = $this->specialCharacter->protect($input);

        if ($this->Parser->parseDepth == 0) {
            $this->Parser->originalInput = preg_split('/\n/', $input);
        }
    }

    /**
     * Event just after JisonParser_Wiki->parse(), used to ready parser, ensuring defaults needed for parsing are set.
     * <p>
     * pcre.recursion_limit is reset here if parser depth is 0 (ie, no nested parsing)
     *
     * @access  private
     * @param   string  &$output parsed output of wiki syntax
     */
    function postParse(&$output)
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

	    $output = $output->render($this->Parser);
    }

	public function content(&$content)
	{
		return new WikiLingo_Expression($content);
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
            return new WikiLingo_Expression_Plugin($name->text, $parameters->text, (isset($end->text) ? $end->text : null), null, null, '');
        }

        return new WikiLingo_Expression_Plugin($name->text, $parameters->text, $end->text, $body->text, $this->syntaxBetween($parameters->loc, $end->loc), $this->syntax($name->loc, $end->loc));

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
        return new WikiLingo_Plugin($pluginName, $yytext, '', $yytext, '');
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

        //first off, if in plugin
        if ($this->pluginStackCount > 0) {
            return true;
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
     * Removed any entity (plugin, list, header) from an input
     *
     * @param   string  $input The analysed text from the wiki parser
     */
    static function deleteEntities(&$input)
    {
        $input = preg_replace('/§[a-z0-9]{32}§/', '', $input);
    }

    /**
     * restores the plugins back into the string being parsed.
     *
     * @access  private
     * @param   string  $output Parsed syntax
     */
    private function restorePluginEntities(&$output)
    {
        //use of array_reverse, jison is a reverse bottom-up parser, if it doesn't reverse jison doesn't restore the plugins in the right order, leaving the some nested keys as a result
        array_reverse($this->pluginEntries);
        $iterations = 0;
        $limit = 100;

        while (!empty($this->pluginEntries) && $iterations <= $limit) {
            $iterations++;
            foreach ($this->pluginEntries as $key => $entity) {
                if (strstr($output, $key)) {
                    if ($this->getOption('stripplugins') == true) {
                        $output = str_replace($key, '', $output);
                    } else {
                        $output = str_replace($key, $entity, $output);
                    }
                }
            }
        }

        if ($this->Parser->parseDepth == 0) {
            $this->pluginNegotiator->executeAwaiting($output);
        }
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
        if ( $this->getOption('parseNps') == true) {
            $content = $this->specialCharacter->unprotect($content);
        }

        return $content;
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
        return $this->createWikiTag("preFormattedText", "pre", $content);
    }

    /**
     * syntax handler: generic html
     * <p>
     * Used in detecting if we need a break, and line number in some cases
     *
     * @access  public
     * @param   $content string parsed string found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function htmlTag($content)
    {
        $parts = preg_split("/[ >]/", substr($this->specialCharacter->unprotect($content, true), 1)); //<tag> || <tag name="">
        $name = strtolower(trim($parts[0]));

        switch ($name) {
            //start block level
            case 'h1':
            case 'h2':
            case 'h3':
            case 'h4':
            case 'h5':
            case 'h6':
            case 'pre':
            case 'ul':
            case 'li':
            case 'dl':
            case 'div':
            case 'table':
            case 'p':
                $this->skipBr = true;
            case 'script':
                $this->nonBreakingTagDepth++;
                $this->line++;
                break;

            //end block level
            case '/h1':
            case '/h2':
            case '/h3':
            case '/h4':
            case '/h5':
            case '/h6':
            case '/pre':
            case '/ul':
            case '/li':
            case '/dl':
            case '/div':
            case '/table':
            case '/p':
                $this->skipBr = true;
            case '/script':
                $this->nonBreakingTagDepth--;
                $this->nonBreakingTagDepth = max($this->nonBreakingTagDepth, 0);
                $this->line++;
                break;

            //skip next block level
            case 'hr':
            case 'br':
                $this->skipBr = true;
                break;
        }

        return $content;
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


        return $this->Parser->dynamicVar->ui(substr($content, 2, 2), $this->getOption('language'), true);
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

        return $this->Parser->dynamicVar->ui(substr($content, 1, 1), $this->getOption('language'));
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
        return $this->createWikiTag("bold", "strong", $content);
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
        return $this->createWikiTag("box", "div", $content->text, array("class" => "simplebox"));
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
        return $this->createWikiTag(
            "center",
            "div",
            $content,
            array(
                "style" => "text-align: center;"
            )
        );
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
        return $this->createWikiTag("code", "code", $content);
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

        return $this->createWikiTag(
            "color", "span", $content,
            array(
                "style" => "color:" . $color .';'
            )
        );
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
        return $this->createWikiTag("italic", "em", $content);
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
        return $this->createWikiTag(
            "l2r", "div", $content,
            array(
                "dir" => "ltr"
            )
        );
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

        return $this->createWikiTag(
            "r2l", "div", $content,
            array(
                "dir" => "rtl"
            )
        );
    }

    /**
     * syntax handler: header, \n!$content
     * <p>
     * Uses $this->Parser->header as a processor.  Is called from $this->block().
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function header($content, $trackExclamationCount = false) //!content
    {
        global $prefs;
        $exclamationCount = 0;
        $headerLength = strlen($content);
        for ($i = 0; $i < $headerLength; $i++) {
            if ($content[$i] == '!') {
                $exclamationCount++;
            } else {
                break;
            }
        }

        $content = substr($content, $exclamationCount);
        $this->removeEOF($content);

        $hNum = min(6, $exclamationCount); //html doesn't support 7+ header level
        $id = $this->Parser->header->stack($hNum, $content);
        $button = '';
        global $section, $tiki_p_edit;
        if (
            $prefs['wiki_edit_section'] === 'y' &&
            $section === 'wiki page' &&
            $tiki_p_edit === 'y' &&
            (
                $prefs['wiki_edit_section_level'] == 0 ||
                $hNum <= $prefs['wiki_edit_section_level']
            ) &&
            ! $this->getOption('print') &&
            ! $this->getOption('suppress_icons') &&
            ! $this->getOption('preview_mode')
        ) {
            $button = $this->createWikiHelper("header", "span", $this->Parser->header->button($prefs['wiki_edit_icons_toggle']));
        }

        $this->skipBr = true;

        //expanding headers
        $expandingHeaderClose = '';
        $expandingHeaderOpen = '';

        if ($this->headerStack == true) {
            $this->headerStack = false;
            $expandingHeaderClose = $this->createWikiHelper("header", "div", "", array(), "close");
        }

        if ($content{0} == '-') {
            $content = substr($content, 1);
            $this->headerStack = true;
            $expandingHeaderOpen =
                $this->createWikiHelper(
                    "header", "a", "[+]",
                    array(
                        "id" => "flipperflip" . $id,
                        "href" => "javascript:flipWithSign(\'flip' . $id .'\')"
                    )
                ) .
                $this->createWikiHelper(
                    "header", "div", "",
                    array(
                        "id" => "flip". $id,
                        "class" => "showhide_heading",
                    ), "open"
                );
        }

        $params = array(
            "id" => $id,
        );

        if ($trackExclamationCount) {
            $params['data-count'] = $exclamationCount;
        }

        $result =
            $expandingHeaderClose .
            $button .
            $this->createWikiTag(
                "header", 'h' . $hNum, $content, $params
            ) .
            $expandingHeaderOpen;

        return $result;
    }

    /**
     * syntax handler: list, \n*$content
     * <p>
     * List types: * (unordered), # (ordered), + (line break), - (expandable), ; (definition list)
     * <p>
     * Uses $this->Parser->list as a processor. Is called from $this->block().
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
        $result = $this->Parser->list->stack($this->line, $level, $content, $type);

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
        $this->line++;
        $this->skipBr = true;
        return $this->createWikiTag("horizontalRow", "hr", "", array(), "inline");
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
        $this->line++;
        $skipBr = $this->skipBr;
        $this->skipBr = false; //skipBr must always must be false when done processing line

        //The first \n was inserted just before parse
        if ($this->isFirstBr == false) {
            $this->isFirstBr = true;
            return new WikiLingoWYSIWYG_Expression($ch->text);
        }

        $result = new WikiLingoWYSIWYG_Expression('');

        if ($skipBr == false && $this->nonBreakingTagDepth == 0) {
            $result = $this->createWikiTag("line", "br", "", array(), "inline");
        }

	    $result->text .= $ch->text;

        return $result;
    }

    /**
     * syntax handler: forced line end, %%%
     * <p>
     * Note: does not affect line number
     *
     * @access  public
     * @return  string  html break, <br />
     */
    function forcedLineEnd()
    {
        return $this->createWikiTag("forcedLineEnd", "br", "", array(), "inline");
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

        return $this->createWikiTag("unlink", "span", $content);
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

        return JisonParser_Wiki_Link::page($page, $this->Parser)
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
        return '<img src="img/smiles/icon_' . $content . '.gif" alt="' . $content . '" />';
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
        return $this->createWikiTag("strike", "strike", $content);
    }

    /**
     * syntax handler: double dash, --
     *
     * @access  public
     * @return  dash characters
     */
    function doubleDash()
    {
        return $this->createWikiTag("doubleDash", "span", " &mdash; ");
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
        if ($this->isContent() || $this->Parser->parseDepth > 1) return $content;

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

        return $this->createWikiTag("char", "span", $result);
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

        $tbody = $this->createWikiTag('tableBody', 'tbody', $tableContents);

        return $this->createWikiTag(
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
        return $this->createWikiTag("tableRow", "tr", $content);
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
        return $this->createWikiTag(
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
        $this->skipBr = true;
        return $this->createWikiTag(
            "titleBar", "div", $content,
            array(
                "class" => "titlebar"
            )
        );
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
        return $this->createWikiTag("underscore", "u", $content);
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
        return '<!---->';
    }

    public $blocks = array(
        "header" => array('!'),

        "stackList" => array('*','#','+',';'),

        "r2l" => array('{r2l}'),
        "l2r" => array('{l2r}'),
    );

    /**
     * syntax handler: block, \n$content\n
     *
     * @access  public
     * @param   $content string parsed content  found inside detected syntax
     * @return  string  $content desired output from syntax
     */
    function block($content)
    {
        $this->line++;
        $this->skipBr = false;
        $this->isFirstBr = true;

        $newLine = $content{0};
        $content = substr($content, 1);

        foreach ($this->blocks as $function => &$set) {
            foreach ($set as &$startsWith) {
                if ($this->beginsWith($content, $startsWith)) {
                    return $this->$function($content);
                }
            }
        }

        return $newLine . $content;
    }

    /**
     * tag helper creation, noise items that will be disposed
     *
     * @access  public
     * @param   $syntaxType string from what syntax type
     * @param   $tagType string what output tag type
     * @param   $content string what is inside the tag
     * @param   $attributes array what params to add to the tag, array, key = param, value = value
     * @param   $type default is "standard", of types : standard, inline, open, close
     * @return  string  $tag desired output from syntax
     */
    public function createWikiHelper($syntaxType, $tagType, $content = "", $attributes = array(), $type = "standard")
    {
        $tagOpen = "<" . $tagType;

        if (!empty($attributes)) {
            foreach ($attributes as $attribute => $value) {
	            $tagOpen .= " " . $attribute . "='" . $value . "'";
            }
        }

        switch ($type) {
            case "inline": $tagOpen .= "/>";
                return new WikiLingo_Expression($tagOpen);
            case "standard":
	            $tagOpen .= ">";
                $tagClosed = "</" . $tagType . ">";
                return new WikiLingo_Expression($tagOpen, $tagClosed, $content);
            case "open": $tagOpen .= ">";
                return new WikiLingo_Expression($tagOpen);
            case "close":
	            $tagClosed = '</' .$tagType . '>';
	            return new WikiLingo_Expression($tagClosed);
        }
    }

    /**
     * tag creation, should only be used with items that are directly related to wiki syntax, buttons etc, should use createWikiHelper
     *
     * @access  public
     * @param   $syntaxType string from what syntax type
     * @param   $tagType string what output tag type
     * @param   $content string what is inside the tag
     * @param   $params array what params to add to the tag, array, key = param, value = value
     * @param   $inline bool the content to be ignored and for tag to close, ie <tag />
     * @return  string  $tag desired output from syntax
     */
    public function createWikiTag($syntaxType, $tagType, $content = "", $attributes = array(), $type = "standard")
    {
        $this->isRepairing($syntaxType, true);

        $tagOpen = "<" . $tagType;

        if (!empty($attributes)) {
            foreach ($attributes as $attribute => $value) {
                $tagOpen .= " " . $attribute . "='" . trim($value) . "'";
            }
        }

        switch ($type) {
            case "inline": $tagOpen .= "/>";
                return new WikiLingoWYSIWYG_Expression($tagOpen);
            case "standard":
                $tagOpen .= ">";
                $tagClose = "</" . $tagType . ">";
                return new WikiLingoWYSIWYG_Expression($tagOpen, $tagClose, $content);
            case "open": $tagOpen .= ">";
                return new WikiLingoWYSIWYG_Expression($tagOpen);
            case "close":
                $tagClose = '</' .$tagType . '>';
                return new WikiLingoWYSIWYG_Expression($tagClose);
        }
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

    function isBlockStartSyntax($char)
    {
        if (
            $char == "*" ||
            $char == "#" ||
            $char == "+" ||
            $char == ";" ||
            $char == "!"
        ) {
            return true;
        }
    }

    function syntax(Jison_ParserLocation $startLoc, Jison_ParserLocation $endLoc = null)
    {
        $firstLine = $startLoc->firstLine;
        $lastLine = (isset($endLoc) ? $endLoc->lastLine : $startLoc->lastLine);
        $firstColumn = $startLoc->firstColumn;
        $lastColumn = (isset($endLoc) ? $endLoc->lastColumn : $startLoc->lastColumn);

        $input = $this->Parser->originalInput;

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

    public function syntaxBetween(Jison_ParserLocation $startLoc, Jison_ParserLocation $endLoc)
    {
        $firstLine = $startLoc->lastLine;
        $lastLine = $endLoc->firstLine;
        $firstColumn = $startLoc->lastColumn;
        $lastColumn = $endLoc->firstColumn;

        $input = $this->Parser->originalInput;

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

    function removeEOF( &$output )
    {
        $output = str_replace("≤REAL_EOF≥", "", $output);
    }

    public function addCssLocation( $href, $i = -1 )
    {
        if (isset($this->Parser->existingScriptsAndLocations[$href])) {
            return $this;
        }

        if ($i > -1) {
            $this->Parser->cssLocations[$i] = $href;
        } else {
            $this->Parser->cssLocations[] = $href;
        }

        $this->Parser->existingScriptsAndLocations[$href] = true;

        return $this;
    }

    public function addScriptLocation( $src, $i = -1 )
    {
        if (isset($this->Parser->existingScriptsAndLocations[$src])) {
            return $this;
        }

        if ($i > -1) {
            $this->Parser->scriptLocations[$i] = $src;
        } else {
            $this->Parser->scriptLocations[] = $src;
        }

        $this->Parser->existingScriptsAndLocations[$src] = true;

        return $this;
    }

    public function addScript( $script, $i = -1 )
    {
        if (isset($this->Parser->existingScriptsAndLocations[$script])) {
            return $this;
        }

        if ($i > -1) {
            $this->Parser->scripts[$i] = $script;
        } else {
            $this->Parser->scripts[] = $script;
        }

        $this->Parser->existingScriptsAndLocations[$script] = true;

        return $this;
    }

    public function renderCss()
    {
        $css = '';
        foreach ($this->Parser->cssLocations as $location) {
            $css .= "<link rel='stylesheel' type='text/css' href='" . $location . "' />";
        }
        return $css;
    }

    public function renderScript()
    {
        $scriptLocations = '';

        foreach ($this->Parser->scriptLocations as $location) {
            $scriptLocations .= "<script type='text/javascript' src='" . $location . "'></script>";
        }

        $scripts = "";
        foreach ($this->Parser->scripts as $script) {
            $scripts .=  $script;
        }


        return $scriptLocations . "<script type='text/javascript'>" . $scripts . "</script>";

    }
}