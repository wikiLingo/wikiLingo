//option namespace:WYSIWYGWikiLingo
//option class:Definition
//option fileName:Definition.php
//option extends:Base
//option parserValue:Parsed
//option use:WikiLingo;

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
        if (WikiLingo\Utilities\Html::isHtmlTag($yytext)) {
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
        $element = $this->unStackHtmlElement($this->yy);
        if (isset($element)) {
           $this->yy = $element;
           $this->popState();
           return "HTML_TAG_CLOSE";
        }
        return 'CONTENT';
    */
}
{HTML_TAG_OPEN} {
    /*php
        //An tag open
        if (WikiLingo\Utilities\Html::isHtmlTag($yytext)) {
           $this->stackHtmlElement(clone($this->yy));
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
 | LINE_END
    {
        /*php
            $1->setType('Line', $$this);
        */
    }
 | HTML_TAG_INLINE
	{
	    /*php
            $$type =& $1;
            $$type->setType('InlineElement', $$this);
        */
	}
 | HTML_TAG_OPEN
	{
	    /*php
            $$type =& $1;
            $$type->setType('BrokenElement', $$this);
        */
	}
 | HTML_TAG_CLOSE
	{
	    /*php
            $$type =& $1;
            $$type->setType('BrokenElement', $$this);
        */
	}
 | HTML_TAG_OPEN contents HTML_TAG_CLOSE
	{
	    /*php
            $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->addChild($$typeChild);
            $$type->setType('Element', $$this);
            $$type->expression->setClosing($3);
        */
	}
 | HTML_TAG_OPEN HTML_TAG_CLOSE
	{
	    /*php
            $$type =& $1;
            $$type->setType('Element', $$this);
            $$type->expression->setClosing($2);
        */
	}
 ;