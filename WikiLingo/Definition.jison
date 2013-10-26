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

%s BOF np pp tc pluginStart plugin inlinePlugin line preBlock block preBlockEnd bold box center code color italic unlink link strike table titleBar underscore wikiLink

%%

//no parse
<np><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<np>"~/np~" {
    /*php
        if ($this->npStack != true) return 'CONTENT';
        $this->popState();
        $this->npStack = false;
    */

    return 'NO_PARSE_END';
}
"~np~" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('np');
        $this->npStack = true;
    */

    return 'NO_PARSE_START';
}


//Pre-Formatted Text
<pp><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<pp>"~/pp~" {
    /*php
        if ($this->ppStack != true) return 'CONTENT';
        $this->popState();
        $this->ppStack = false;
    */

    return 'PREFORMATTED_TEXT_END';
}
"~pp~" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('pp');
        $this->ppStack = true;
    */

    return 'PREFORMATTED_TEXT_START';
}
//Comment
<tc><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<tc>"~/tc~" {
    /*php
        if ($this->tcStack != true) return 'CONTENT';
        $this->popState();
        $this->tcStack = false;
    */

    return 'COMMENT_END';
}
"~tc~" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('tc');
        $this->tcStack = true;
    */

    return 'COMMENT_START';
}



//Wiki Variables
[%][%]{VARIABLE_NAME}[%][%] {
    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'DOUBLE_DYNAMIC_VAR';
}
[%]{VARIABLE_NAME}[%] {
    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'SINGLE_DYNAMIC_VAR';
}

//Argument Variables
"{{"{VARIABLE_NAME}([|]{VARIABLE_NAME})?"}}" {
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
    /*php
        $this->begin('pluginStart');
        $this->stackPlugin($yytext);
        return 'PLUGIN_START';
    */
}
<plugin><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<plugin>"{"{PLUGIN_ID}"}" {
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
    /*php
        //returns block end
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */


    return 'BLOCK_END';
}
<block><<EOF>> {
    /*php
        $this->popState();
        return 'EOF';
    */
}

{LINE_END}(?={BLOCK_START}) {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('preBlock');
    */

    return 'PRE_BLOCK_START';
}
<BOF>(?={BLOCK_START}) {
    /*php
        $this->popState();
        if ($this->isContent()) return 'CONTENT';
        $this->begin('preBlock');
    */

    return 'PRE_BLOCK_START';
}
{LINE_END} {
    /*php
        if ($this->isContent() || !empty($this->tableStack)) return 'CONTENT';
    */

    return 'LINE_END';
}



//Horizontal bar
"---" {
    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'HORIZONTAL_BAR';
}


//Forced line end
"%%%" {
    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'FORCED_LINE_END';
}


//Bold
<bold><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<bold>[_][_] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'BOLD_END';
}
[_][_] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('bold');
    */

    return 'BOLD_START';
}


//Box
<box><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<box>[\^] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'BOX_END';
}
[\^] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('box');
    */

    return 'BOX_START';
}


//Center
<center><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<center>[:][:] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */


    return 'CENTER_END';
}
[:][:] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('center');
    */

    return 'CENTER_START';
}


//Code
<code><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<code>"+-" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'CODE_END';
}
"-+" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('code');
    */

    return 'CODE_START';
}


//Color text
<color><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<color>[\~][\~] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'COLOR_END';
}
[\~][\~] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('color');
    */

    return 'COLOR_START';
}


//Italics
<italic><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<italic>[']['] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'ITALIC_END';
}
[']['] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('italic');
    */

    return 'ITALIC_START';
}



//Unlink
<unlink><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<unlink>("@np"|"]]"|"]") {
    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->popState();
    */

    return 'UNLINK_END';
}
"[[" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('unlink');
    */

    return 'UNLINK_START';
}


//Link
<link><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<link>"]" {
    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->linkStack = false;
        $this->popState();
    */

    return 'LINK_END';
}
"["(?![ ]) {
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
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<strike>[-][-] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'STRIKE_END';
}
[-][-](?![ ]|<<EOF>>) {
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
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<table>[|][|] {
   /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
        array_pop($this->tableStack);
    */

    return 'TABLE_END';
}
[|][|] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('table');
        $this->tableStack[] = true;
    */

    return 'TABLE_START';
}


//Title bar
<titleBar><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<titleBar>[=][-] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'TITLE_BAR_END';
}
[-][=] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('titleBar');
    */

    return 'TITLE_BAR_START';
}


//Underscore
<underscore><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<underscore>[=][=][=] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'UNDERSCORE_END';
}
[=][=][=] {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('underscore');
    */

    return 'UNDERSCORE_START';
}


//Wikilink
<wikiLink><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<wikiLink>"))"|"((" {
    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->linkStack = false;
        $this->popState();
    */

    return 'WIKI_LINK_END';
}
"((" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
        $yytext = array('type' => 'wiki', 'syntax' => $yytext);
    */

    return 'WIKI_LINK_START';
}
"))" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
        $yytext = array('type' => 'np', 'syntax' => $yytext);
    */

    return 'WIKI_LINK_START';
}
"("{WIKI_LINK_TYPE}"(" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
        $yytext = array('syntax' => $yytext, 'type' => substr($yytext, 1, -1));
    */

    return 'WIKI_LINK_START';
}
(?:[ \n\t\r\,\;]|^){CAPITOL_WORD}(?=$|[ \n\t\r\,\;\.]) {
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
 : contents
 	{
 	    return $1;
 	}
 | contents EOF
	{
    	/*php
		    return $1;
        */
	}
 | EOF
    {
        /*php
            return $1;
        */
    }
 ;

contents
 : content
 | contents content
	{
		/*php
			$1->addContent($2);
        */
	}
 ;

content
    : CONTENT
	{
	    /*php
	        $1->setType('Content', $$this);
	    */
	}
    | COMMENT_START
    | COMMENT_START COMMENT_END
    | COMMENT_START contents COMMENT_END
	{
        /*php
			$$type =& $1;
			$$typeChild =& $2;
			$$typeChild->setParent($$type);
            $$type->setType('Comment', $$this);
        */
    }
    | NO_PARSE_START
    | NO_PARSE_START NO_PARSE_END
    | NO_PARSE_START contents NO_PARSE_END
    {
        /*php
            $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('NoParse', $$this);
        */
    }
    | PREFORMATTED_TEXT_START
    | PREFORMATTED_TEXT_START PREFORMATTED_TEXT_END
    | PREFORMATTED_TEXT_START contents PREFORMATTED_TEXT_END
    {
        /*php
            $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('PreFormattedText', $$this);
        */
    }
    | DOUBLE_DYNAMIC_VAR
    {
         /*php
            $$type =& $1;
            $$type->setOption('Double', true);
            $$type->setType('DynamicVariable', $$this);
        */
    }
    | SINGLE_DYNAMIC_VAR
     {
        /*php
            $1->setType('DynamicVariable', $$this);
        */
     }
    | ARGUMENT_VAR
    {
        /*php
            $1->setType('ArgumentVariable', $$this);
        */
    }
    | HTML_TAG
    {
        /*php
            $1->setType('Tag', $$this);
        */
    }
    | HORIZONTAL_BAR
	{
		/*php
		    $1->setType('Row', $$this);
        */
	}
    | BOLD_START
    | BOLD_START BOLD_END
    | BOLD_START contents BOLD_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Bold', $$this);
        */
	}
    | BOX_START
    | BOX_START BOX_END
    | BOX_START contents BOX_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Box', $$this);
        */
	}
    | CENTER_START
    | CENTER_START CENTER_END
    | CENTER_START contents CENTER_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Center', $$this);
        */
	}
    | CODE_START
    | CODE_START CODE_END
    | CODE_START contents CODE_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Code', $$this);
        */
	}
    | COLOR_START
    | COLOR_START COLOR_END
    | COLOR_START contents COLOR_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Color', $$this);
        */
	}
    | ITALIC_START
    | ITALIC_START ITALIC_END
    | ITALIC_START contents ITALIC_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Italic', $$this);
        */
	}
    | UNLINK_START
    | UNLINK_START UNLINK_END
    | UNLINK_START contents EOF
    | UNLINK_START contents UNLINK_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Unlink', $$this);
        */
	}
    | LINK_START
    | LINK_START LINK_END
    | LINK_START contents LINK_END
	{
		/*php
		    //type already set

		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Link', $$this);
        */
	}
    | STRIKE_START
    | STRIKE_START STRIKE_END
    | STRIKE_START contents STRIKE_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Strike', $$this);
        */
	}
    | DOUBLE_DASH
    {
        /*php
            $1->setType('DoubleDash', $$this);
        */
    }
    | TABLE_START
    | TABLE_START TABLE_END
    | TABLE_START contents TABLE_END
	{
		/*php
		    $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Table', $$this);
        */
	}
    | TITLE_BAR_START
    | TITLE_BAR_START TITLE_BAR_END
    | TITLE_BAR_START contents TITLE_BAR_END
	{
		/*php
			$$type =& $1;
			$$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('TitleBar', $$this);
        */
	}
    | UNDERSCORE_START
    | UNDERSCORE_START UNDERSCORE_END
    | UNDERSCORE_START contents UNDERSCORE_END
	{
		/*php
		    $$type =& $1;
		    $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Underscore', $$this);
        */
	}
    | WIKI_LINK_START
    | WIKI_LINK_START WIKI_LINK_END
    | WIKI_LINK_START contents WIKI_LINK_END
	{
		/*php
			//Type already set
			$$type =& $1;
			$$typeChild =& $2;
			$$typeChild->setParent($$type);
			$$type->setType('WikiLink', $$this);
        */
	}
    | WIKI_LINK
    {
        /*php
            $$type =& $1;
            $$type->addArgument($1);
            $$type->setType('WordLink', $$this);

        */
    }
    | INLINE_PLUGIN_START
    | INLINE_PLUGIN_START INLINE_PLUGIN_PARAMETERS
 	{
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
 	    /*php
 		    $$type =& $1;
 		    $$type->addArgument($2);

 		    $$typeChild = $3;
 		    $$typeChild->setParent($$type);
 		    $$type->setType('Plugin', $$this);
        */
 	}
    | PLUGIN_START PLUGIN_PARAMETERS PLUGIN_END
  	{
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
        /*php
            $1->setType('Line', $$this);
        */
    }
    | FORCED_LINE_END
    {
        /*php
            $1->setType('ForcedLine', $$this);
        */
    }
    | CHAR
    {
        /*php
            $1->setType('Char', $$this);
        */
    }
    | PRE_BLOCK_START BLOCK_START BLOCK_END
    {
        /*php
	        $1->setOption('Empty', 'true');
	        $1->setType('Block', $$this);
	    */
	}
    | PRE_BLOCK_START BLOCK_START contents BLOCK_END
	{
        /*php
			$$type = $1;
			$$type->addArgument($2);
			$$type->addArgument($3);

			$$typeChild =& $3;
			$$typeChild->setParent($$type);
			$$type->setType('Block', $$this);
		*/
    }
    | PRE_BLOCK_START BLOCK_START contents EOF
    {
        /*php
            $$type = $1;
            $$type->addArgument($2);
            $$type->addArgument($3);

            $$typeChild =& $3;
            $$typeChild->setParent($$type);
            $$type->setType('Block', $$this);
        */
    }
    | PRE_BLOCK_START BLOCK_START
    | PRE_BLOCK_START
    ;