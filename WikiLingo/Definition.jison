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
VARIABLE_NAME                   ([0-9A-Za-z_-]{3,})
SYNTAX_CHARS                    [\@{}\n_\^:\~'-|=\(\)\[\]*#+%<≤ ]
LINE_CONTENT                    (.?)
LINES_CONTENT                   (.|\n)+
LINE_END                        (\n)
BLOCK_START                     [!*#;]+([-+](?=[-+]{2,})|[-+](?![-+]))?
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
"-~"(.|\n)+?"~-" {
    //js
        yytext = yytext.substring(2, yytext.length - 2);

	/*php
		$yytext = substr($yytext, 2, -2);
	*/

    return 'NO_PARSE';
}
//no parse (deprecated)
"~np~"(.|\n)+?"~/np~" {
    //js
        yytext = yytext.substring(4, yytext.length - 5);

	/*php
		$yytext = substr($yytext, 4, -5);
	*/

    return 'NO_PARSE';
}

//Pre-Formatted Text
"-/"(.|\n)*?"/-" {
    //js
        yytext = yytext.substring(2, yytext.length - 2);

	/*php
        $yytext = substr($yytext, 2, -2);
    */
    return 'PREFORMATTED_TEXT';
}
//Pre-Formatted Text (deprecated)
"~pp~"(.|\n)*?"~/pp~" {
    //js
        yytext = yytext.substring(4, yytext.length - 5);

	/*php
        $yytext = substr($yytext, 4, -5);
    */
    return 'PREFORMATTED_TEXT';
}

//Comment
"/*"(.|\n)*?"*/" {
    //js
        yytext = yytext.substring(2, yytext.length - 2);

	/*php
		$yytext = substr($yytext, 2, -2);
	*/
    return 'COMMENT';
}
//Comment (deprecated)
"~tc~"(.|\n)*?"~/tc~" {
    //js
        yytext = yytext.substring(4, yytext.length - 5);

	/*php
		$yytext = substr($yytext, 4, -5);
	*/
    return 'COMMENT';
}

//Code
"-+"(.|\n)*?"+-" {
    //js
        yytext = yytext.substring(2, yytext.length - 2);

	/*php
		$yytext = substr($yytext, 2, -2);
	*/
    return 'CODE';
}


//Variables
[%]{VARIABLE_NAME}[%] {
    //js
        if (yy.isContent()) return 'CONTENT';

    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'VARIABLE';
}



//Block handling
<block><<EOF>> {
    //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<preBlock>{BLOCK_START} {
    //js
        this.yy.lexer.popState();
        this.yy.lexer.begin('block');

	/*php
		$this->popState();
		$this->begin('block');
	*/

	return 'BLOCK_START';
}
<block>(?={LINE_END}) {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.popState();

    /*php
        //returns block end
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    */

    return 'BLOCK_END';
}
<block><<EOF>> {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */

    return 'EOF';
}

{LINE_END}(?={BLOCK_START}) {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('preBlock');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('preBlock');
    */

    return 'PRE_BLOCK_START';
}
<BOF>(?!{BLOCK_START}) {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */
}
<BOF>(?={BLOCK_START}) {
    //js
        this.yy.lexer.popState();
        this.yy.lexer.begin('preBlock');

    /*php
        $this->popState();
        $this->begin('preBlock');
    */

    return 'PRE_BLOCK_START';
}
{LINE_END} {
    //js
        if (yy.isContent() || yy.tableStack.length) return 'CONTENT';

    /*php
        if ($this->isContent() || !empty($this->tableStack)) return 'CONTENT';
    */

    return 'LINE_END';
}



//Inline Plugin
<inlinePlugin>(.+?"}")|("}") {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */

    return 'INLINE_PLUGIN_PARAMETERS';
}
"{"{INLINE_PLUGIN_ID} {
    //js
        this.yy.lexer.begin('inlinePlugin');

    /*php
        $this->begin('inlinePlugin');
    */

    return 'INLINE_PLUGIN_START';
}


//Plugins with possible body
<pluginStart>.*?")}" {
    //js
        this.yy.lexer.popState();
        this.yy.lexer.begin('plugin');

    /*php
        $this->popState();
        $this->begin('plugin');
    */

    return 'PLUGIN_PARAMETERS';
}

"{"{PLUGIN_ID}"(" {
    //js
        this.yy.lexer.begin('pluginStart');
        yy.stackPlugin(yytext);

    /*php
        $this->begin('pluginStart');
        $this->stackPlugin($yytext);
    */

    return 'PLUGIN_START';
}
<plugin><<EOF>> {
    //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<plugin>"{"{PLUGIN_ID}"}" {
    //js
        if (yy.pluginMatch(yytext)) {
            this.yy.lexer.popState();
            yy.pluginStackPop();
            return 'PLUGIN_END';
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

<pastLink><<EOF>> {
    //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<pastLink>[@][)] {
    //js
        this.yy.lexer.popState();

	/*php
		$this->popState();
	*/

	return 'PAST_LINK_END';
}

"@FLP(".+?")" {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('pastLink');

	/*php
		if ($this->isContent()) return 'CONTENT';
		$this->begin('pastLink');
	*/

	return 'PAST_LINK_START';
}



//Horizontal bar
"---" {
    //js
        if (yy.isContent()) return 'CONTENT';

    /*php
        if ($this->isContent()) return 'CONTENT';
    */

    return 'HORIZONTAL_BAR';
}


//Forced line end
"%%%" {
    //js
        if (yy.isContent()) return 'CONTENT';

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
    //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<bold>[_][_] {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */

    return 'BOLD_END';
}
[_][_] {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('bold');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('bold');
    */

    return 'BOLD_START';
}



//Center
<center><<EOF>> {
    //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<center>[:][:] {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */

    return 'CENTER_END';
}
[:][:] {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('center');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('center');
    */

    return 'CENTER_START';
}



//Color text
<color><<EOF>> {
    //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<color>"~~" {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */

    return 'COLOR_END';
}
"~~" {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('color');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('color');
    */

    return 'COLOR_START';
}


//Italics
<italic><<EOF>> {
    //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<italic>[']['] {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */

    return 'ITALIC_END';
}
[']['] {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('italic');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('italic');
    */

    return 'ITALIC_START';
}



//Link
<link><<EOF>> {
    //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<link>"]" {
    //js
        this.linkStack = false;
        this.yy.lexer.popState();

    /*php
        $this->linkStack = false;
        $this->popState();
    */

    return 'LINK_END';
}
"["(?![ ]) {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.linkStack = true;
        this.yy.lexer.begin('link');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('link');
    */

    return 'LINK_START';
}


//Strike
<strike><<EOF>> {
   //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<strike>"--" {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */

    return 'STRIKE_END';
}
"--" {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('strike');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('strike');
    */

    return 'STRIKE_START';
}



//Table
<table><<EOF>> {
   //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<table>[|][|] {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.popState();
        this.yy.tableStack.pop();

   /*php
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
        array_pop($this->tableStack);
    */

    return 'TABLE_END';
}
[|][|] {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('table');
        this.yy.tableStack.push(true);

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
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
<titleBar>[=][-] {
    //js
        this.yy.lexer.popState();

    /*php
        $this->popState();
    */

    return 'TITLE_BAR_END';
}
[-][=] {
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('titleBar');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('titleBar');
    */

    return 'TITLE_BAR_START';
}


//Underscore
<underscore><<EOF>> {
   //js
        this.yy.lexer.conditionStack = [];

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
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('underscore');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->begin('underscore');
    */

    return 'UNDERSCORE_START';
}


//WikiLink
<wikiLink><<EOF>> {
   //js
        this.yy.lexer.conditionStack = [];

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
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.lexer.begin('wikiLink');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
    */

    return 'WIKI_LINK_START';
}



//WikiLinkType
<wikiLinkType><<EOF>> {
   //js
        this.yy.lexer.conditionStack = [];

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
    //js
        if (yy.isContent()) return 'CONTENT';
        this.yy.linkStack = true;
        this.yy.lexer.begin('wikiLinkType');
        yytext = yytext.substring(1, yytext.length - 1);

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
   //js
        this.yy.lexer.conditionStack = [];

    /*php
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    */

    return 'EOF';
}
"))" {
    //js
        if (yy.isContent()) return 'CONTENT';
        this,yy.linkStack = true;
        this.yy.lexer.begin('wikiUnlink');

    /*php
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiUnlink');
    */

    return 'WIKI_UNLINK_START';
}


//WordLink
<skip>. {
    //js
        this.yy.lexer.popState();

	/*php
		$this->popState();
	*/

	return 'CONTENT';
}
{CAPITOL_WORD}(?=$|[ \n\t\r\,\;\.]) {
    //js
        return 'CONTENT';

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
	//js
	    if (yy.isContent()) return 'CONTENT';

	/*php
		if ($this->isContent()) return 'CONTENT';
	*/

	return 'SPECIAL_CHAR';
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
    //js
		if (yy.isContent()) return 'CONTENT';
		return 'WHITE_SPACE';

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
        return $1;
	}
 | EOF
    {
        return $1;
    }
 ;

contents
 : content
 | contents content
	{
	    //js
            $$.addContent($2);

		/*php
			$1->addContent($2);
        */
	}
 ;

content
    : CONTENT
	{
	    //js
            $$ = yy.setType('Content', $1);

	    /*php
	        $1->setType('Content', $$this);
	    */
	}
    | COMMENT
	{
	    //js
            $$ = yy.setType('Comment', $1);

        /*php
			$1->setType('Comment', $$this);
        */
    }
    | NO_PARSE
    {
        //js
            $$ = yy.setType('NoParse', $1);

        /*php
            $1->setType('NoParse', $$this);
        */
    }
    | PREFORMATTED_TEXT
    {
        //js
            $$ = yy.setType('PreFormattedText', $1);

        /*php
            $1->setType('PreFormattedText', $$this);
        */
    }
    | VARIABLE
    {
        //js
            $$ = yy.setType('Variable', $1);

        /*php
            $1->setType('Variable', $$this);
        */
    }
    | HTML_TAG
    {
        //js
            $$ = yy.setType('Tag', $1);

        /*php
            $1->setType('Tag', $$this);
        */
    }
    | HORIZONTAL_BAR
	{
        //js
            $$ = yy.setType('HorizontalBar', $1);

		/*php
		    $1->setType('HorizontalBar', $$this);
        */
	}
    | BOLD_START
    {
        //js
            $$ = yy.setType('Content', $1);

        /*php
            $1->setType('Content');
        */
    }
    | BOLD_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | BOLD_START BOLD_END
    | BOLD_START contents BOLD_END
	{
        //js
            $$ = yy.setType('Bold', $1)
                .addChild($2);

		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Bold', $$this);
        */
	}
    | CENTER_START
    | CENTER_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | CENTER_START CENTER_END
    | CENTER_START contents CENTER_END
	{
        //js
            $$ = yy.setType('Center', $1)
                .addChild($2);

		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Center', $$this);
        */
	}
    | CODE
	{
        //js
            $$ = yy.setType('Code', $1);

		/*php
		    $1->setType('Code', $$this);
        */
	}
    | COLOR_START
    | COLOR_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | COLOR_START COLOR_END
    | COLOR_START contents COLOR_END
	{
	    //js
            $$ = yy.setType('Color', $1)
                .addChild($2);

		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Color', $$this);
        */
	}
    | ITALIC_START
    | ITALIC_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | ITALIC_START ITALIC_END
    | ITALIC_START contents ITALIC_END
	{
	    //js
            $$ = yy.setType('Italic', $1)
                .addChild($2);

		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Italic', $$this);
        */
	}
    | LINK_START
    {
        //js
            $$ = yy.setType('Content', $1);

        /*php
            $1->setType('Content', $$this);
        */
    }
    | LINK_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | LINK_START LINK_END
    | LINK_START contents LINK_END
	{
	    //js
            $$ = yy.setType('Link', $1)
                .addChild($2);

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
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | STRIKE_START STRIKE_END
    | STRIKE_START contents STRIKE_END
	{
	    //js
	        $$ = yy.setType('Strike', $1)
	            .addChild($2);

		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Strike', $$this);
        */
	}
    | DOUBLE_DASH
    {
        //js
            $$ = yy.setType('DoubleDash', $1);

        /*php
            $1->setType('DoubleDash', $$this);
        */
    }
    | TABLE_START
    | TABLE_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | TABLE_START TABLE_END
    | TABLE_START contents TABLE_END
	{
	    //js
	        $$ = yy.setType('Table', $1)
	            .addChild($2);

		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Table', $$this);
        */
	}
    | TITLE_BAR_START
    | TITLE_BAR_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | TITLE_BAR_START TITLE_BAR_END
    | TITLE_BAR_START contents TITLE_BAR_END
	{
	    //js
	        $$ = yy.setType('TitleBar', $1)
	            .addChild($2);

		/*php
			$$type =& $1;
            $2->setParent($$type);
            $$type->setType('TitleBar', $$this);
        */
	}
    | UNDERSCORE_START
    | UNDERSCORE_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | UNDERSCORE_START UNDERSCORE_END
    | UNDERSCORE_START contents UNDERSCORE_END
	{
	    //js
	        $$ = yy.setType('Underscore', $1)
	            .addChild($2);

		/*php
		    $$type =& $1;
            $2->setParent($$type);
            $$type->setType('Underscore', $$this);
        */
	}
	| PAST_LINK_START
    | PAST_LINK_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | PAST_LINK_START PAST_LINK_END
    | PAST_LINK_START contents PAST_LINK_END
    {
	    //js
	        $$ = yy.setType('PastLink', $1)
	            .addChild($2);

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
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | WIKI_LINK_START WIKI_LINK_END
    | WIKI_LINK_START contents WIKI_LINK_END
	{
	    //js
	        $$ = yy.setType('WikiLink', $1)
	            .addChild($2);

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
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | WIKI_LINK_TYPE_START WIKI_LINK_TYPE_END
    | WIKI_LINK_TYPE_START contents WIKI_LINK_TYPE_END
    {
	    //js
	        $$ = yy.setType('WikiLinkType', $1)
	            .addChild($2);

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
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | WIKI_UNLINK_START WIKI_UNLINK_END
    | WIKI_UNLINK_START contents WIKI_UNLINK_END
    {
	    //js
	        $$ = yy.setType('WikiUnlink', $1)
	            .addChild($2);

        /*php
            //Type already set
            $$type =& $1;
            $2->setParent($$type);
            $$type->setType('WikiUnlink', $$this);
        */
    }
    | WORD_LINK
    {
	    //js
	        $$ = yy.setType('WordLink', $1)
                .addArgument($1);

        /*php
            $$type =& $1;
            $$type->addArgument($1);
            $$type->setType('WordLink', $$this);

        */
    }
    | INLINE_PLUGIN_START
    | INLINE_PLUGIN_START contents
    {
        //js
            $$ = yy.setType('Content', $1)
                .addContent($2);

        /*php
            $1->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | INLINE_PLUGIN_START INLINE_PLUGIN_PARAMETERS
 	{
	    //js
	        $$ = yy.setType('InlinePlugin', $1)
                .setOption('NoBody', true)
                .setOption('Inline', true)
                .addArgument($2);

 		/*php
 		    $$type =& $1;
            $$type->setOption('NoBody', true);
            $$type->setOption('Inline', true);
            $$type->addArgument($2);
            $$type->setType('InlinePlugin', $$this);
        */
 	}
 	| PLUGIN_START PLUGIN_PARAMETERS contents
    | PLUGIN_START PLUGIN_PARAMETERS contents PLUGIN_END
 	{
	    //js
	        $$ = yy.setType('Plugin', $1, $4)
                .addArgument($2)
	            .addChild($3);

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
	    //js
	        $$ = yy.setType('Plugin', $1, $3)
	            .addArgument($2)
	            .addArgument($3);

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
        //js
            $$ = yy.setType('Line', $1);

        /*php
            $1->setType('Line', $$this);
        */
    }
    | FORCED_LINE_END
    {
        //js
            $$ = yy.setType('ForcedLine', $1);

        /*php
            $1->setType('ForcedLine', $$this);
        */
    }
    | CHAR
    {
        //js
            $$ = yy.setType('Char', $1);

        /*php
            $1->setType('Char', $$this);
        */
    }
    | SPECIAL_CHAR
    {
        //js
            $$ = yy.setType('SpecialChar', $1);

        /*php
            $1->setType('SpecialChar', $$this);
        */
    }
    | WHITE_SPACE
    {
        //js
            $$ = yy.setType('WhiteSpace', $1);

        /*php
            $1->setType('WhiteSpace', $$this);
        */
    }
    | PRE_BLOCK_START BLOCK_START BLOCK_END
    {
        //js
            $$ = yy.setType('Block', $1)
                .setOption('Empty', 'true');

        /*php
	        $1->setOption('Empty', 'true');
	        $1->setType('Block', $$this);
	    */
	}
    | PRE_BLOCK_START BLOCK_START contents BLOCK_END
	{
	    //js
	        $$ = yy.setType('Block', $1)
                .addArgument($2)
                .addArgument($3)
                .addChild($3);

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
        //js
            $$ = yy.setType('Block', $1)
                .addArgument($2)
                .addArgument($3)
                .addChild($3);

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

%%

(function() {
    this.WikiLingo = (this.WikiLingo || {});
    var me = this.WikiLingo.Definition = Parser;
}).call((typeof window !== 'undefined' ? window : {}));