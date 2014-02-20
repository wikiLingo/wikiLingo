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

%s htmlElement htmlElementClosing

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


<htmlElement>(?=<<EOF>>) {
    /*php
        //A tag that was left open, and needs to close
        $this->popState();
    */
}
<htmlElement>(?={HTML_TAG_CLOSE}) {
    /*php
        //A look ahead for closing tag
        $match = $this->input->match($this->closingTagRegex);
        if (!empty($match)) {
            if (!$this->unStackHtmlElement($match[0], true)) {
                $this->killStackedHtmlElement();
                $this->popState();
                return "BROKEN";
            }

            $this->popState();
            $this->begin("htmlElementClosing");
        }
    */
}
<htmlElementClosing>{HTML_TAG_CLOSE} {
    /*php
        //A tag that is open and we just found the close for it
        $element = $this->unStackHtmlElement($this->yy->text);
        if (isset($element)) {
           $this->popState();
           return "HTML_TAG_CLOSE";
        }
        return "CONTENT";
    */
}
{HTML_TAG_OPEN} {
    /*php
        $isHtmlTag = WikiLingo\Utilities\Html::isHtmlTag($yytext, true);
        //An tag open
        if ($isHtmlTag === true) {
           $this->stackHtmlElement(clone($this->yy));
           $this->begin('htmlElement');
           return "HTML_TAG_OPEN";
        } else if ($isHtmlTag === false) {
            return "HTML_TAG_INLINE";
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
([ ])+                                      return 'CONTENT';
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
    : content {
        return $1;
    }
    | content EOF {
        return $1;
    }
    | EOF {
        return "";
    }
    ;

content
    : CONTENT {
        /*php
            $1->setType('Content', $$this);
        */
    }
    | content CONTENT {
        /*php
            $2->setType('Content', $$this);
            $1->addContent($2);
        */
    }
    | LINE_END {
        /*php
            $1->setType('Line', $$this);
        */
    }
    | content LINE_END {
        /*php
            $2->setType('Line', $$this);
            $1->addContent($2);
        */
    }
    | element
    | content element {
        /*php
            $1->addContent($2);
        */
    }
	;

element
    : HTML_TAG_OPEN HTML_TAG_CLOSE {
        /*php
            $$type =& $1;
            $$type->setType('Element', $$this);
            $$type->expression->setClosing($2);
        */
    }
    | HTML_TAG_INLINE {
        /*php
            $1->setType('InlineElement', $$this);
        */
    }
    | HTML_TAG_OPEN content HTML_TAG_CLOSE {
        /*php
            $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('Element', $$this);
            $$type->expression->setClosing($3);
        */
    }

    | HTML_TAG_OPEN {
        /*php
            $$type =& $1;
            $$type->setType('BrokenElement', $$this);
        */
    }
    | HTML_TAG_OPEN content {
        /*php
            $$type =& $1;
            $$typeChild =& $2;
            $$type->addContent($$typeChild);
            $$type->setType('Element', $$this);
        */
    }
    | HTML_TAG_CLOSE {
        /*php
            $$type =& $1;
            $$type->setType('BrokenElement', $$this);
        */
    }
    | HTML_TAG_OPEN content BROKEN {
        /*php
            $$type =& $1;
            $$typeChild =& $2;
            $$typeChild->setParent($$type);
            $$type->setType('BrokenElement', $$this);
        */
    }
    ;