//phpOption parserClass:WikiLingoWYSIWYG_Definition
//phpOption fileName:Definition.php
//phpOption usingZend:true

//Lexical Grammer
%lex

LINE_END                        (\n\r|\r\n|[\n\r])
HTML_TAG_INLINE                 "<"(.|\n)[^>]*?"/>"
HTML_TAG_CLOSE                  "</"(.|\n)[^>]*?">"
HTML_TAG_OPEN                   "<"(.|\n)[^>]*?">"

%s htmlElement

%%
{HTML_TAG_INLINE}
	%{
		/*php
		    //A tag that doesn't need to track state
            if (JisonParser_Html_Handler::isHtmlTag($yytext) == true) {
               $yytext = $this->inlineTag($yytext);
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
	%}


<htmlElement><<EOF>>
	%{
		/*php
		    //A tag that was left open, and needs to close
            $name = end($this->htmlElementsStack);
            $keyStack = key($this->htmlElementStack);
            end($this->htmlElementStack[$keyStack]);
            $keyElement = key($this->htmlElementStack[$keyStack]);
            $tag = &$this->htmlElementStack[$keyStack][$keyElement];
            $tag['state'] = 'repaired';
            if (!empty($tag['name'])) {
               $this->unput('</' . $tag['name'] . '>');
            }
            return 'CONTENT';
		*/
	%}
<htmlElement>{HTML_TAG_CLOSE}
	%{
	    /*php
            //A tag that is open and we just found the close for it
            $element = $this->unStackHtmlElement($yytext);
            if ($this->compareElementClosingToYytext($element, $yytext) && $this->htmlElementsStackCount == 0) {
               $yytext = $element;
               $this->popState();
               return "HTML_TAG_CLOSE";
            }
            return 'CONTENT';
    	*/
	%}
{HTML_TAG_OPEN}
	%{
	    /*php
            //An tag open
            if (JisonParser_Html_Handler::isHtmlTag($yytext) == true) {
               if ($this->stackHtmlElement($yytext)) {
                   if ($this->htmlElementsStackCount == 1) {
                       $this->begin('htmlElement');
                       return "HTML_TAG_OPEN";
                   }
               }
               return 'CONTENT';
            }

            //A non-valid html tag, return the first character in the stack and put the rest back into the parser
            if (isset($yytext{0})) {
               $tag = $yytext;
               $yytext = $yytext{0};
               $this->unput(substr($tag, 1));
            }
            return 'CONTENT';
        */
	%}
{HTML_TAG_CLOSE}
	%{
	    /*php
		    //A tag that was not opened, needs to be ignored
    	    return 'CONTENT';
    	*/
	%}
([A-Za-z0-9 .,?;]+)                         return 'CONTENT';

([ ])                                       return 'CONTENT';
{LINE_END}
	%{
		/*php
            if ($this->htmlElementsStackCount == 0 || $this->isStaticTag == true) {
               return 'LINE_END';
            }
            return 'CONTENT';
		*/
	%}
(.)                                         return 'CONTENT';
<<EOF>>										return 'EOF';

/lex

//Parsing Grammer
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
	{$$ = $1;}
 | contents content
	{
		$$ = $1 + $2; //js

		//php $$ = $1 . $2;
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
	    //php $$ = $this->toWiki($1);
	}
 | HTML_TAG_OPEN contents HTML_TAG_CLOSE
	{
	    //php $$ = $this->toWiki($3, $2);
	}
 | HTML_TAG_OPEN HTML_TAG_CLOSE
	{
	    //php $$ = $this->toWiki($2);
	}
 ;