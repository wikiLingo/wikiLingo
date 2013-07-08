//phpOption parserClass:WikiLingoWYSIWYG_DTS_Definition
//phpOption fileName:Definition.php
//phpOption usingZend:true

//Lexical Grammar
%lex

LINE_END                        (\n\r|\r\n|[\n\r])
HTML_TAG_INLINE                 "<"(.|\n)[^>]*?"/>"
HTML_TAG_CLOSE                  "</"(.|\n)[^>]*?">"
HTML_TAG_OPEN                   "<"(.|\n)[^>]*?">"

%s htmlElement

%%
{HTML_TAG_INLINE} {
    /*php
        //A tag that doesn't need to track state
        if (WikiLingoWYSIWYG_DTS::isHtmlTag($yytext) == true) {
           return "HTML_TAG_INLINE";
        }

        //A non-valid html tag, return "<" put the rest back into the parser
        if (isset($yytext{0})) {
           $tag = $yytext;
           $yytext = $yytext{0};
           $this->unput(substr($tag, 1));
        }
        return 'CONTENT';
    */
}


<htmlElement><<EOF>> {
    /*php
        //A tag that was left open, and needs to close
        $name = end($this->htmlElementsStack);
        $element = end($this->htmlElementStack);
        return 'CONTENT';
    */
}
<htmlElement>{HTML_TAG_CLOSE} {
    /*php
        //A tag that is open and we just found the close for it
        $element = $this->unStackHtmlElement($yytext);
        if (isset($element)) {
           $yytext = $element;
           $this->popState();
           return "HTML_TAG_CLOSE";
        }
        return 'CONTENT';
    */
}
{HTML_TAG_OPEN} {
    /*php
        //An tag open
        if (WikiLingoWYSIWYG_DTS::isHtmlTag($yytext)) {
           $this->stackHtmlElement($yytext);
           $this->begin('htmlElement');
           return "HTML_TAG_OPEN";
        }

        //A non-valid html tag, return the first character in the stack and put the rest back into the parser
        if (isset($yytext{0})) {
           $tag = $yytext;
           $yytext = $yytext{0};
           $this->unput(substr($tag, 1));
        }

        return 'CONTENT';
    */
}
{HTML_TAG_CLOSE} {
    /*php
        //A tag that was not opened, needs to be ignored
        return 'CONTENT';
    */
}
([A-Za-z0-9 .,?;]+)                         return 'CONTENT';
([ ])                                       return 'CONTENT';
{LINE_END} {
    /*php
        if ($this->htmlElementsStackCount == 0 || $this->isStaticTag == true) {
           return 'LINE_END';
        }
        return 'CONTENT';
    */
}
(.)                                         return 'CONTENT';
<<EOF>>										return 'EOF';

/lex

//Parsing Grammar
%%

wiki
 : contents
 	{return $1;}
 | contents EOF
	{return $1;}
 | EOF
    {return "";}
 ;

contents
 : content
	{
		/*php
			$$ = $1->text;
		*/
	}
 | contents content
	{
		/*php
		    $1->text->addSibling($2);
		    $$ = $1->text;
		*/
	}
 ;

content
 : CONTENT
    {
        //php $$ = $this->content($1);
    }
 | LINE_END
    {
        //php $$ = $this->lineEnd($1);
    }
 | HTML_TAG_INLINE
	{
	    //php $$ = $this->inlineElement($1);
	}
 | HTML_TAG_OPEN contents HTML_TAG_CLOSE
	{
	    /*php
	        $1->text = $this->element($1, true);
	        $1->text->addChild($2);
	        $$ = $1->text;
	    */
	}
 | HTML_TAG_OPEN HTML_TAG_CLOSE
	{
	    //php $$ = $this->element($1, true);
	}
 ;