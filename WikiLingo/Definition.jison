//option namespace:WikiLingo
//option class:Definition
//option fileName:Definition.php
//option extends:Base
//option parserValue:Parsed
//option use:WikiLingo\Utilities;

//Lexical Grammar
%lex

PLUGIN_ID   					[A-Z0-9_]+
INLINE_PLUGIN_ID				[a-z0-9_]+
VARIABLE_NAME                   ([0-9A-Za-z ]{3,})
SYNTAX_CHARS                    [\@{}\n_\^:\~'-|=\(\)\[\]*#+%<≤ ]
LINE_CONTENT                    (.?)
LINES_CONTENT                   (.|\n)+
LINE_END                        (\n)
BLOCK_START                     ([\!*#;]+)([-+])?
WIKI_LINK_TYPE                  (([a-z0-9-]+))
CAPITOL_WORD                    ([A-Z]{1,})([A-Za-z\-\x80-\xFF]{1,})
WHITE_SPACE                     ([ ])+
CONTENT                         ([A-Za-z0-9.,?;]+[ ]?|[&][ ])+

//Lexical states
%s BOF
%s pluginStart plugin inlinePlugin
%s line preBlock block bold center color italic link skip strike table titleBar underscore
%s pastLink wikiLink wikiLinkType wikiUnlink

//Create tokens from lexical analysis
%%

"≤REAL_EOF≥"    	                        {/*skip REAL_EOF*/};

//html comment
[<][!][-][-](.*?)[-][-][>] {
    return 'HTML_TAG';
}

//no parse
"~np~"(.|\n)+?"~/np~" {
	/*php
		$yytext = substr($yytext, 4, -5);
	*/
    return 'NO_PARSE';
}

//Pre-Formatted Text
"~pp~"(.|\n)*?"~/pp~" {
	/*php
        $yytext = substr($yytext, 4, -5);
    */
    return 'PREFORMATTED_TEXT';
}
//Comment
"~tc~"(.|\n)*?"~/tc~" {
	/*php
		$yytext = substr($yytext, 4, -5);
	*/
    return 'COMMENT';
}
//Code
"-+"(.|\n)*?"+-" {
	/*php
		$yytext = substr($yytext, 2, -2);
	*/
    return 'CODE';
}



//Variables
[%]{VARIABLE_NAME}[%] {
    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'VARIABLE';
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
        return 'BLOCK_END';
    */
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
        return 'PRE_BLOCK_START';
    */
}
<BOF>(?!{BLOCK_START}) {
    /*php
        $this->popState();
    */
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



//Inline Plugin
<inlinePlugin>(.+?"}")|("}") {
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

<pastLink><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<pastLink>[@][)] {
	/*php
		$this->popState();
	*/

	return 'PAST_LINK_END';
}

"@FLP(".+?")" {
	/*php
		if ($this->isContent()) return 'CONTENT';
		$this->begin('pastLink');
	*/

	return 'PAST_LINK_START';
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

//Double Dash
[ ][-][-][ ] {
     return 'DOUBLE_DASH';
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



//Color text
<color><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<color>"~~" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'COLOR_END';
}
"~~" {
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
<strike>"--" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'STRIKE_END';
}
"--" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('strike');
    */

    return 'STRIKE_START';
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


//WikiLink
<wikiLink><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<wikiLink>"))" {
    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->linkStack = false;
        $this->popState();
    */

    return 'WIKI_LINK_END';
}
//This prevents a wikiUnlink's end from becoming content
<wikiUnlink>"((" {
    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->linkStack = false;
        $this->popState();
    */

    return 'WIKI_UNLINK_END';
}
"((" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
    */

    return 'WIKI_LINK_START';
}



//WikiLinkType
<wikiLinkType><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<wikiLinkType>"))" {
    /*php
        if ($this->isContent(array('linkStack'))) return 'CONTENT';
        $this->linkStack = false;
        $this->popState();
    */

    return 'WIKI_LINK_TYPE_END';
}
"("{WIKI_LINK_TYPE}"(" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLinkType');
        $yytext = substr($yytext, 1, -1);
    */

    return 'WIKI_LINK_TYPE_START';
}

//WikiUnlink
<wikiUnlink><<EOF>> {
    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
"))" {
    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiUnlink');
    */

    return 'WIKI_UNLINK_START';
}


//WordLink
<skip>. {
	/*php
		$this->popState();
		return 'CONTENT';
	*/
}
{CAPITOL_WORD}(?=$|[ \n\t\r\,\;\.]) {
    /*php
        if ($this->isContent()) return 'CONTENT';

        $isLink = false;
        $this->events->triggerExpressionWordLinkExists($yytext, $isLink);

        if ($isLink) {
            return 'WORD_LINK';
        } else {
            $this->unput($yytext);
            $this->begin('skip');
        }
    */
}


//Misc.
"&"(?![ ]) {
    return 'CHAR';
}
//Look for "<" or ">" that ARE NOT the start and end of a tag
"<"(?![a-zA-Z\/])|">" {
	//special character
	/*php
		if ($this->isContent()) return 'CONTENT';
		return 'SPECIAL_CHAR';
	*/
}

//Look for "<" or ">" that ARE the start and end of a tag
[<](.|\n)*?[>] {
    /*php
        //html tag
        return 'HTML_TAG';
    */
}
"≤REAL_EOF≥"    	                        {/*skip REAL_EOF*/};
{CONTENT}                                   return 'CONTENT';
(?!{SYNTAX_CHARS})({LINE_CONTENT})?(?={SYNTAX_CHARS})
											return 'CONTENT';
{WHITE_SPACE} {
	/*php
		if ($this->isContent()) return 'CONTENT';
		return 'WHITE_SPACE';
	*/
}
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
    | COMMENT
	{
        /*php
			$1->setType('Comment', $$this);
        */
    }
    | NO_PARSE
    {
        /*php
            $1->setType('NoParse', $$this);
        */
    }
    | PREFORMATTED_TEXT
    {
        /*php
            $1->setType('PreFormattedText', $$this);
        */
    }
    | VARIABLE
    {
        /*php
            $1->setType('Variable', $$this);
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
    {
        /*php
            $1->setType('Content');
        */
    }
    | BOLD_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | BOLD_START BOLD_END
    | BOLD_START contents BOLD_END
	{
		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Bold', $$this);
        */
	}
    | CENTER_START
    | CENTER_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | CENTER_START CENTER_END
    | CENTER_START contents CENTER_END
	{
		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Center', $$this);
        */
	}
    | CODE
	{
		/*php
		    $1->setType('Code', $$this);
        */
	}
    | COLOR_START
    | COLOR_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | COLOR_START COLOR_END
    | COLOR_START contents COLOR_END
	{
		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Color', $$this);
        */
	}
    | ITALIC_START
    | ITALIC_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | ITALIC_START ITALIC_END
    | ITALIC_START contents ITALIC_END
	{
		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Italic', $$this);
        */
	}
    | LINK_START
    {
        /*php
            $1->setType('Content', $$this);
        */
    }
    | LINK_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | LINK_START LINK_END
    | LINK_START contents LINK_END
	{
		/*php
		    //type already set

		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Link', $$this);
        */
	}
    | STRIKE_START
    | STRIKE_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | STRIKE_START STRIKE_END
    | STRIKE_START contents STRIKE_END
	{
		/*php
		    $$type =& $1;
            $2->setParent($$type);
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
    | TABLE_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | TABLE_START TABLE_END
    | TABLE_START contents TABLE_END
	{
		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Table', $$this);
        */
	}
    | TITLE_BAR_START
    | TITLE_BAR_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | TITLE_BAR_START TITLE_BAR_END
    | TITLE_BAR_START contents TITLE_BAR_END
	{
		/*php
			$$type =& $1;
            $2->setParent($$type);
            $$type->setType('TitleBar', $$this);
        */
	}
    | UNDERSCORE_START
    | UNDERSCORE_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | UNDERSCORE_START UNDERSCORE_END
    | UNDERSCORE_START contents UNDERSCORE_END
	{
		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Underscore', $$this);
        */
	}
	| PAST_LINK_START
    | PAST_LINK_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | PAST_LINK_START PAST_LINK_END
    | PAST_LINK_START contents PAST_LINK_END
    {
        /*php
            //Type already set
            $$type =& $1;
            $2->setParent($$type);
            $$type->setType('PastLink', $$this);
        */
    }
    | WIKI_LINK_START
    | WIKI_LINK_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | WIKI_LINK_START WIKI_LINK_END
    | WIKI_LINK_START contents WIKI_LINK_END
	{
		/*php
			//Type already set
			$$type =& $1;
			$2->setParent($$type);
			$$type->setType('WikiLink', $$this);
        */
	}
	| WIKI_LINK_TYPE_START
    | WIKI_LINK_TYPE_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | WIKI_LINK_TYPE_START WIKI_LINK_TYPE_END
    | WIKI_LINK_TYPE_START contents WIKI_LINK_TYPE_END
    {
        /*php
            //Type already set
            $$type =& $1;
            $2->setParent($$type);
            $$type->setType('WikiLinkType', $$this);
        */
    }
    | WIKI_UNLINK_START
    | WIKI_UNLINK_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | WIKI_UNLINK_START WIKI_UNLINK_END
    | WIKI_UNLINK_START contents WIKI_UNLINK_END
    {
        /*php
            //Type already set
            $$type =& $1;
            $2->setParent($$type);
            $$type->setType('WikiUnlink', $$this);
        */
    }
    | WORD_LINK
    {
        /*php
            $$type =& $1;
            $$type->addArgument($1);
            $$type->setType('WordLink', $$this);

        */
    }
    | INLINE_PLUGIN_START
    | INLINE_PLUGIN_START contents
    {
        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
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
 		    $3->setParent($$type);
 		    $$type->stateEnd = $4;
 		    $$type->setType('Plugin', $$this);
        */
 	}
    | PLUGIN_START PLUGIN_PARAMETERS PLUGIN_END
  	{
  	    /*php
            $$type =& $1;
            $$type->addArgument($2);
            $$type->addArgument($3);
            $$type->stateEnd = $3;
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
    | SPECIAL_CHAR
    {
        /*php
            $1->setType('SpecialChar', $$this);
        */
    }
    | WHITE_SPACE
    {
        /*php
            $1->setType('WhiteSpace', $$this);
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
			$3->setParent($$type);
			$$type->setType('Block', $$this);
		*/
    }
    | PRE_BLOCK_START BLOCK_START contents
    {
        /*php
            $$type = $1;
            $$type->addArgument($2);
            $$type->addArgument($3);
            $3->setParent($$type);
            $$type->setType('Block', $$this);
        */
    }
    | PRE_BLOCK_START BLOCK_START
    | PRE_BLOCK_START
    ;