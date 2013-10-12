//option namespace:WikiLingo
//option class:Definition
//option fileName:Definition.php
//option extends:Base
//option parserValue:Parsed
//option use:WikiLingo\Utilities;

//Lexical Grammer
%lex

PLUGIN_ID   					[A-Z_]+
INLINE_PLUGIN_ID				[a-z_]+
VARIABLE_NAME                   ([0-9A-Za-z ]{3,})
SYNTAX_CHARS                    [{}\n_\^:\~'-|=\(\)\[\]*#+%<≤]
LINE_CONTENT                    (.?)
LINES_CONTENT                   (.|\n)+
LINE_END                        (\n)
BLOCK_START                     ([\!*#+;]+)
WIKI_LINK_TYPE                  (([a-z0-9-]+))
CAPITOL_WORD                    ([A-Z]{1,}[a-z_\-\x80-\xFF]{1,}){2,}

%s BOF np pp pluginStart plugin inlinePlugin line preBlock block preBlockEnd bold box center code color italic unlink link strike table titleBar underscore wikiLink

%%

//no parse
<np><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<np>"~/np~" {
    //js
        if (parser.npStack != true) return 'CONTENT';
        lexer.popState();
        parser.npStack = false;

    /*php
        if ($this->npStack != true) return 'CONTENT';
        $this->popState();
        $this->npStack = false;
    */

    return 'NO_PARSE_END';
}
"~np~" {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('np');
        parser.npStack = true;

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('np');
        $this->npStack = true;
    */

    return 'NO_PARSE_START';
}


//Pre-Formatted Text
<pp><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<pp>"~/pp~" {
    //js
        if (parser.ppStack != true) return 'CONTENT';
        lexer.popState();
        parser.ppStack = false;
        yytext = parser.preFormattedText(yytext);

    /*php
        if ($this->ppStack != true) return 'CONTENT';
        $this->popState();
        $this->ppStack = false;
        $yytext = $this->preFormattedText($yytext);
    */

    return 'PREFORMATTED_TEXT_END';
}
"~pp~" {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('pp');
        parser.ppStack = true;

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('pp');
        $this->ppStack = true;
    */

    return 'PREFORMATTED_TEXT_START';
}


//Comment
"~tc~"{LINES_CONTENT}"~/tc~" {
    return 'COMMENT';
}


//Wiki Variables
[%][%]{VARIABLE_NAME}[%][%] {
    //js
        if (parser.isContent()) return 'CONTENT';

    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'DOUBLE_DYNAMIC_VAR';
}
[%]{VARIABLE_NAME}[%] {
    //js
        if (parser.isContent()) return 'CONTENT';

    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'SINGLE_DYNAMIC_VAR';
}

//Argument Variables
"{{"{VARIABLE_NAME}([|]{VARIABLE_NAME})?"}}" {
    //js
        if (parser.isContent(['linkStack'])) return 'CONTENT';

    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
    */

    return 'ARGUMENT_VAR';
}

//?
"{rm}" {
    return 'CHAR';
}


//Directional
{LINE_END}("{r2l}"|"{l2r}") {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('preBlock');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('preBlock');
    */

    return 'BLOCK_START';
}

//Inline Plugin
<inlinePlugin>(.+?"}"|"}") {
    /*php
        $this->popState();
        return 'INLINE_PLUGIN_PARAMETERS';
    */
}
"{"{INLINE_PLUGIN_ID} {
    //js
        if (parser.isContent()) return 'CONTENT';
        yytext = parser.inlinePlugin(yytext);

    /*php
        $this->begin('inlinePlugin');
    */

    return 'INLINE_PLUGIN_START';
}


//Plugins with possible body
<pluginStart>.*?")}" {
    /*php
        $this->popState();
        $this->begin('plugin');
        return 'PLUGIN_PARAMETERS';
    */
}

"{"{PLUGIN_ID}"(" {
    //js
        if (parser.npStack || parser.ppStack) return 'CONTENT';

        lexer.begin('pluginStart');
        yy.pluginStack = parser.stackPlugin(yytext, yy.pluginStack);

        if (parser.size(yy.pluginStack) == 1) {
            return 'PLUGIN_START';
        }

        return 'CONTENT';

    /*php
        $this->begin('pluginStart');
        $this->stackPlugin($yytext);
        return 'PLUGIN_START';
    */
}
<plugin><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<plugin>"{"{PLUGIN_ID}"}" {
    //js
        var plugin = yy.pluginStack[yy.pluginStack.length - 1];
        if (('{' + plugin.name + '}') == yytext) {
            lexer.popState();
            if (yy.pluginStack) {
                if (
                    parser.size(yy.pluginStack) > 0 &&
                    parser.substring(yytext, 1, -1) == yy.pluginStack[parser.size(yy.pluginStack) - 1].name
                ) {
                    if (parser.size(yy.pluginStack) == 1) {
                        yytext = yy.pluginStack[parser.size(yy.pluginStack) - 1];
                        yy.pluginStack = parser.pop(yy.pluginStack);
                        return 'PLUGIN_END';
                    } else {
                        yy.pluginStack = parser.pop(yy.pluginStack);
                        return 'CONTENT';
                    }
                }
            }
        }

    /*php
        $name = end($this->pluginStack);
        if (substr($yytext, 1, -1) == $name && $this->pluginStackCount > 0) {
            $this->popState();
            $this->pluginStackCount--;
            array_pop($this->pluginStack);
            return 'PLUGIN_END';
        }
    */

    return 'CONTENT';
}


//Block handling
<block><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<preBlock>{BLOCK_START} {
	/*php
		$this->popState();
		$this->begin('block');
		return 'BLOCK_START';
	*/
}
<block>(?={LINE_END}) {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */


    return 'BLOCK_END';
}
{LINE_END}(?={BLOCK_START}) {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('preBlock');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('preBlock');
    */

    return 'PRE_BLOCK_START';
}
<BOF>(?={BLOCK_START}) {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('preBlock');

    /*php
        $this->popState();
        if ($this->isContent()) return 'CONTENT';
        $this->begin('preBlock');
    */

    return 'PRE_BLOCK_START';
}
{LINE_END} {
    //js
        if (parser.isContent() || parser.tableStack) return 'CONTENT';

    /*php
        if ($this->isContent() || !empty($this->tableStack)) return 'CONTENT';
    */

    return 'LINE_END';
}



//Horizontal bar
"---" {
    //js
        if (parser.isContent()) return 'CONTENT';

    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'HORIZONTAL_BAR';
}


//Forced line end
"%%%" {
    //js
        if (parser.isContent()) return 'CONTENT';

    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'FORCED_LINE_END';
}


//Bold
<bold><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<bold>[_][_] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'BOLD_END';
}
[_][_] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('bold');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('bold');
    */

    return 'BOLD_START';
}


//Box
<box><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<box>[\^] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'BOX_END';
}
[\^] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('box');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('box');
    */

    return 'BOX_START';
}


//Center
<center><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<center>[:][:] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */


    return 'CENTER_END';
}
[:][:] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('center');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('center');
    */

    return 'CENTER_START';
}


//Code
<code><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<code>"+-" {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'CODE_END';
}
"-+" {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('code');


    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('code');
    */

    return 'CODE_START';
}


//Color text
<color><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<color>[\~][\~] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'COLOR_END';
}
[\~][\~] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('color');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('color');
    */

    return 'COLOR_START';
}


//Italics
<italic><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<italic>[']['] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'ITALIC_END';
}
[']['] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('italic');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('italic');
    */

    return 'ITALIC_START';
}



//Unlink
<unlink><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<unlink>("@np"|"]]"|"]") {
    //js
        if (parser.isContent(['linkStack'])) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->popState();
    */

    return 'UNLINK_END';
}
"[[" {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('unlink');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('unlink');
    */

    return 'UNLINK_START';
}


//Link
<link><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<link>"]" {
    //js
        if (parser.isContent(['linkStack'])) return 'CONTENT';
        parser.linkStack = false;
        lexer.popState();

    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->linkStack = false;
        $this->popState();
    */

    return 'LINK_END';
}
"["(?![ ]) {
    //js
        if (parser.isContent()) return 'CONTENT';
        parser.linkStack = true;
        lexer.begin('link');
        yytext = 'external';

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('link');
        $yytext = 'external';
    */

    return 'LINK_START';
}


//Strike
<strike><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<strike>[-][-] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'STRIKE_END';
}
[-][-](?![ ]|<<EOF>>) {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('strike');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('strike');
    */

    return 'STRIKE_START';
}
[ ][-][-][ ] {
    return 'DOUBLE_DASH';
}


//Table
<table><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<table>[|][|] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();
        parser.tableStack.pop();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
        array_pop($this->tableStack);
    */

    return 'TABLE_END';
}
[|][|] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('table');
        parser.tableStack.push(true);

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('table');
        $this->tableStack[] = true;
    */

    return 'TABLE_START';
}


//Title bar
<titleBar><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<titleBar>[=][-] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'TITLE_BAR_END';
}
[-][=] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('titleBar');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('titleBar');
    */

    return 'TITLE_BAR_START';
}


//Underscore
<underscore><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<underscore>[=][=][=] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.popState();

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'UNDERSCORE_END';
}
[=][=][=] {
    //js
        if (parser.isContent()) return 'CONTENT';
        lexer.begin('underscore');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('underscore');
    */

    return 'UNDERSCORE_START';
}


//Wikilink
<wikiLink><<EOF>> {
    //js
        lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<wikiLink>"))"|"((" {
    //js
        if (parser.isContent(['linkStack'])) return 'CONTENT';
        parser.linkStack = false;
        lexer.popState();

    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->linkStack = false;
        $this->popState();
    */

    return 'WIKI_LINK_END';
}
"((" {
    //js
        if (parser.isContent()) return 'CONTENT';
        parser.linkStack = true;
        lexer.begin('wikiLink');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
        $yytext = array('type' => 'wiki', 'syntax' => $yytext);
    */

    return 'WIKI_LINK_START';
}
"))" {
    //js
        if (parser.isContent()) return 'CONTENT';
        parser.linkStack = true;
        lexer.begin('wikiLink');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
        $yytext = array('type' => 'np', 'syntax' => $yytext);
    */

    return 'WIKI_LINK_START';
}
"("{WIKI_LINK_TYPE}"(" {
    //js
        if (parser.isContent()) return 'CONTENT';
        parser.linkStack = true;
        lexer.begin('wikiLink');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
        $yytext = array('syntax' => $yytext, 'type' => substr($yytext, 1, -1));
    */

    return 'WIKI_LINK_START';
}
(?:[ \n\t\r\,\;]|^){CAPITOL_WORD}(?=$|[ \n\t\r\,\;\.]) {
    //js
        if (parser.isContent()) return 'CONTENT';

    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'WIKI_LINK';
}


//Misc.
"&" {
    return 'CHAR';
}
[<](.|\n)*?[>] {
    //js
        return 'HTML_TAG';

    /*php
        if (Utilities\Html::isTag($yytext)) {
            return 'HTML_TAG';
        }
        $tag = $yytext;
        $yytext = $yytext{0};
        $this->unput(substr($tag, 1));
        return 'CONTENT';
    */
}
"≤REAL_EOF≥"    	                        {/*skip REAL_EOF*/};
"≤REAL_LT≥"(.|\n)*?"≤REAL_GT≥"    	        return 'HTML_TAG';
("§"[a-z0-9]{32}"§")                        return 'CONTENT';
("≤"(.)+"≥")                                return 'CONTENT';
([A-Za-z0-9 .,?;]+)                         return 'CONTENT';
(?!{SYNTAX_CHARS})({LINE_CONTENT})?(?={SYNTAX_CHARS})
											return 'CONTENT';
([ ]+?)                                     return 'CONTENT';
("~bs~"|"~BS~")                             return 'CHAR';
("~hs~"|"~HS~")                             return 'CHAR';
("~amp~"|"~amp~")                           return 'CHAR';
("~ldq~"|"~LDQ~")                           return 'CHAR';
("~rdq~"|"~RDQ~")                           return 'CHAR';
("~lsq~"|"~LSQ~")                           return 'CHAR';
("~rsq~"|"~RSQ~")                           return 'CHAR';
("~c~"|"~C~")                               return 'CHAR';
"~--~"                                      return 'CHAR';
"=>"                                        return 'CHAR';
("~lt~"|"~LT~")                             return 'CHAR';
("~gt~"|"~GT~")                             return 'CHAR';
"{"([0-9]+)"}"                              return 'CHAR';
(.)                                         return 'CONTENT';
<<EOF>>										return 'EOF';
/lex

%%

wiki
 : lines
 	{
 	    return $1;
 	}
 | lines EOF
	{
	    //js
		    return $1;

		/*php
		    return $1;
        */
	}
 | EOF
    {
        //js
            return $1;

        /*php
            return $1;
        */
    }
 ;


lines
 : line
 | lines line
    {
        //js
            $$ = $1 + $2;

        /*php
            $1->addLine($2);
        */
    }
 ;

line
 : contents
 | PRE_BLOCK_START BLOCK_START BLOCK_END
    {
	    //js
	    $$ = parser.block($2);

	    /*php
	        $1->setOption('Empty', 'true');
	        $1->setType('Block', $$this);
        */
	}
 | PRE_BLOCK_START BLOCK_START contents BLOCK_END
    {
        //js
            $$ = parser.block($2 + $3);

        /*php
            $$type = $1;
            $$type->addArgument($2);
            $$type->addArgument($3);

            $$typeChild =& $3;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Block', $$this);
        */
    }
 | PRE_BLOCK_START BLOCK_START
 | PRE_BLOCK_START
 ;

contents
 : content
 | contents content
	{
		//js
		    $$ = $1 + $2;

		/*php
			$1->addContent($2);
        */
	}
 ;

content
 : CONTENT
	{
	    //js
	        $$ = $1;

	    /*php
	        $1->setType('Content', $$this);
	    */
	}
 | COMMENT
	{
        //js
            $$ = parser.comment($1);

        /*php
            $1->setType('Comment', $$this);
        */
    }
 | NO_PARSE_START
 | NO_PARSE_START NO_PARSE_END
 | NO_PARSE_START contents NO_PARSE_END
    {
        //js
            $$ = parser.noParse($2);

        /*php
            $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('NoParse', $$this);
        */
    }
 | PREFORMATTED_TEXT_START
 | PREFORMATTED_TEXT_START PREFORMATTED_TEXT_END
 | PREFORMATTED_TEXT_START contents PREFORMATTED_TEXT_END
    {
        //js
            $$ = parser.preFormattedText($2);

        /*php
            $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('PreFormattedText', $$this);
        */
    }
 | DOUBLE_DYNAMIC_VAR
    {
        //js
            $$ = parser.doubleDynamicVar($1);

        /*php
            $$type =& $1;
            $$type->setOption('Double', true);
            $$type->setType('DynamicVariable', $$this);
        */
    }
 | SINGLE_DYNAMIC_VAR
     {
        //js
            $$ = parser.singleDynamicVar($1);

        /*php
            $1->setType('DynamicVariable', $$this);
        */
     }
 | ARGUMENT_VAR
    {
        //js
            $$ = parser.argumentVar($1);

        /*php
            $1->setType('ArgumentVariable', $$this);
        */
    }
 | HTML_TAG
    {
        //js
            $$ = parser.htmlTag($1);

        /*php
            $1->setType('Tag', $$this);
        */
    }
 | HORIZONTAL_BAR
	{
		//js
		    $$ = parser.hr();

		/*php
		    $1->setType('Row', $$this);
        */
	}
 | BOLD_START
 | BOLD_START BOLD_END
 | BOLD_START contents BOLD_END
	{
		//js
		    $$ = parser.bold($2);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Bold', $$this);
        */
	}
 | BOX_START
 | BOX_START BOX_END
 | BOX_START contents BOX_END
	{
		//js
		    $$ = parser.box($2);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Box', $$this);
        */
	}
 | CENTER_START
 | CENTER_START CENTER_END
 | CENTER_START contents CENTER_END
	{
		//js
		    $$ = parser.center($2);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Center', $$this);
        */
	}
 | CODE_START
 | CODE_START CODE_END
 | CODE_START contents CODE_END
	{
		//js
		    $$ = parser.code($2);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Code', $$this);
        */
	}
 | COLOR_START
 | COLOR_START COLOR_END
 | COLOR_START contents COLOR_END
	{
		//js
		    $$ = parser.color($2);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Color', $$this);
        */
	}
 | ITALIC_START
 | ITALIC_START ITALIC_END
 | ITALIC_START contents ITALIC_END
	{
		//js
		    $$ = parser.italic($2);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Italic', $$this);
        */
	}
 | UNLINK_START
 | UNLINK_START UNLINK_END
 | UNLINK_START contents UNLINK_END
	{
		//js
		    $$ = parser.unlink($1 + $2 + $3);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Unlink', $$this);
        */
	}
 | LINK_START
 | LINK_START LINK_END
 | LINK_START contents LINK_END
	{
		//js
		    $$ = parser.link($1, $2);

		/*php
		    //type already set

		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
        */
	}
 | STRIKE_START
 | STRIKE_START STRIKE_END
 | STRIKE_START contents STRIKE_END
	{
		//js
		    $$ = parser.strike($2);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Strike', $$this);
        */
	}
 | DOUBLE_DASH
    {
        //js
            $$ = parser.doubleDash();

        /*php
            $1->setType('DoubleDash', $$this);
        */
    }
 | TABLE_START
 | TABLE_START TABLE_END
 | TABLE_START contents TABLE_END
	{
		//js
		    $$ = parser.tableParser($2);

		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Table', $$this);
        */
	}
 | TITLE_BAR_START
 | TITLE_BAR_START TITLE_BAR_END
 | TITLE_BAR_START contents TITLE_BAR_END
	{
		//js
		    $$ = parser.titleBar($2);

		/*php
			$$type =& $1;
			$$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('TitleBar', $$this);
        */
	}
 | UNDERSCORE_START
 | UNDERSCORE_START UNDERSCORE_END
 | UNDERSCORE_START contents UNDERSCORE_END
	{
		//js
		    $$ = parser.underscore($2);

		/*php
		    $$type =& $1;
		    $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Underscore', $$this);
        */
	}
 | WIKI_LINK_START
 | WIKI_LINK_START WIKI_LINK_END
 | WIKI_LINK_START contents WIKI_LINK_END
	{
		//js
		    $$ = parser.link($1['type'], $2);

		/*php
			//Type already set
			$$type =& $1;
			$$typeChild =& $2;
			$$typeChild->setParent($$type);
			$$type->addChild($$typeChild);
        */
	}
 | WIKI_LINK
    {
        //js
            $$ = parser.link('word', $1);

        /*php
            $$type =& $1;
            $$type->addArgument($1);
            $$type->setType('WordLink', $$this);

        */
    }
 | INLINE_PLUGIN_START
 | INLINE_PLUGIN_START INLINE_PLUGIN_PARAMETERS
 	{
 		//js
 		    $$ = parser.plugin($1, $2);

 		/*php
 		    $$type =& $1;
            $$type->setOption('NoBody', true);
            $$type->setOption('Inline', true);
            $$type->addArgument($2);
            $$type->setType('InlinePlugin', $$this);
        */
 	}
 | PLUGIN_START PLUGIN_PARAMETERS contents PLUGIN_END
 	{
 	    //js
 		    $$ = parser.plugin($1, $2, $3, $4);

 		/*php
 		    $$type =& $1;
 		    $$type->addArgument($2);

 		    $$typeChild = $3;
 		    $$typeChild->setParent($$type);
 		    $$type->addChild($$typeChild);
 		    $$type->setType('Plugin', $$this);
        */
 	}
 | PLUGIN_START PLUGIN_PARAMETERS PLUGIN_END
  	{
  		//js
  		    $2.body = '';
            $$ = parser.plugin($1);

        /*php
            $$type =& $1;
            $$type->addArgument($2);
            $$type->addArgument($3);
            $$type->setType('Plugin', $$this);
        */
     }
 | PLUGIN_START PLUGIN_PARAMETERS
 | PLUGIN_START
 | LINE_END
    {
        //js
            $$ = parser.line($1);

        /*php
            $1->setType('Line', $$this);
        */
    }
 | FORCED_LINE_END
    {
        //js
            $$ = parser.forcedLineEnd();

        /*php
            $1->setType('ForcedLine', $$this);
        */
    }
 | CHAR
    {
        //js
            $$ = parser.char($1);

        /*php
            $1->setType('Char', $$this);
        */
    }
 ;

%% /* parser extensions */

//js additional module code
    parser.extend = {
        parser: function(extension) {
            if (extension) {
                for (var attr in extension) {
                    parser[attr] = extension[attr];
                }
            }
        },
        lexer: function() {
            if (extension) {
                for (var attr in extension) {
                    parser[attr] = extension[attr];
                }
            }
        }
    };
//
