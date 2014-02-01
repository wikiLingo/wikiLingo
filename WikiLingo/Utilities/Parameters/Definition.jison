//option namespace:WikiLingo\Utilities\Parameters
//option class:Definition
//option fileName:Definition.php
//option extends:Base

//Lexical Grammar
%lex

//Named Regex Patterns
singleQuote                     [']
doubleQuote                     ["]
angleQuote                      [`]
simpleString                    [a-zA-Z0-9_-]+
parameterValue                  (.|[\n\r\s])*?
equals                          [=]

%s singleQuoteParameter doubleQuoteParameter angleQuoteParameter equals

//Start Lexical Tokens
%%

<singleQuoteParameter>{singleQuote} {
    /*php
        $this->popState();
    */
}
<doubleQuoteParameter>{doubleQuote} {
    /*php
        $this->popState();
    */
}
<angleQuoteParameter>{angleQuote} {
    /*php
        $this->popState();
    */
}

<singleQuoteParameter>{parameterValue}(?={singleQuote}) {
    return 'PARAMETER_VALUE';
}
<doubleQuoteParameter>{parameterValue}(?={doubleQuote}) {
    return 'PARAMETER_VALUE';
}
<angleQuoteParameter>{parameterValue}(?={angleQuote}) {
    return 'PARAMETER_VALUE';
}
<equals>{simpleString} {
	/*php
		$this->popState();
		return 'PARAMETER_VALUE';
	*/
}


<equals>{singleQuote} {
    /*php
        $this->popState();
        $this->begin('singleQuoteParameter');
    */
}
<equals>{doubleQuote} {
    /*php
        $this->popState();
        $this->begin('doubleQuoteParameter');
    */
}
<equals>{angleQuote} {
    /*php
        $this->popState();
        $this->begin('angleQuoteParameter');
    */
}

{simpleString} {
    return 'PARAMETER_NAME';
}
{equals} {
	/*php
		$this->begin('equals');
	*/
}
<equals>\s+                                 {/*skip whitespace*/}
\s+                                         {/*skip whitespace*/}
<<EOF>>										return 'EOF';
.                                           {/*skip whitespace*/}
/lex


//Parser Grammar
%%

arguments
    : EOF {
        /*php
            return array();
        */
    }
    | parameters EOF {
        /*php
            return $this->get();
        */
    }
    ;

parameters
    : parameter
    | parameters parameter
    ;

parameter
    : PARAMETER_NAME
    | PARAMETER_NAME PARAMETER_VALUE {
        /*php
            $this->add($1->text, $2->text);
        */
    }
    ;