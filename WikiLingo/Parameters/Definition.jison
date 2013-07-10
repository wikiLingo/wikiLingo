
//phpOption parserClass:WikiLingo_Parameters_Definition
//phpOption fileName:Definition.php
//phpOption usingZend:true


//Lexical Grammar
%lex

//Named Regex Patterns
singleQuote                     "'"
doubleQuote                     '"'
angleQuote                      [`]
parameterName                   [a-zA-Z0-9_-]+
equals                          ([=]|[=][>])
%s singleQuoteParameter doubleQuoteParameter angleQuoteParameter


//Start Lexical Tokens
%%

<singleQuoteParameter>{singleQuote}
%{
    /*php
        $this->popState();
    */
%}
<doubleQuoteParameter>{doubleQuote}
%{
    /*php
        $this->popState();
    */
%}
<angleQuoteParameter>{angleQuote}
%{
    /*php
        $this->popState();
    */
%}

<singleQuoteParameter>.*?(?={singleQuote})
%{
    return 'PARAMETER_VALUE';
%}
<doubleQuoteParameter>.*?(?={doubleQuote})
%{
    return 'PARAMETER_VALUE';
%}
<angleQuoteParameter>.*?(?={angleQuote})
%{
    return 'PARAMETER_VALUE';
%}

{singleQuote}
%{
    /*php
        $this->begin('singleQuoteParameter');
    */
%}
{doubleQuote}
%{
    /*php
        $this->begin('doubleQuoteParameter');
    */
%}
{angleQuote}
%{
    /*php
        $this->begin('angleQuoteParameter');
    */
%}
{parameterName}(?={equals})
%{
    /*php
        return 'PARAMETER_NAME';
    */
%}
{equals}                                    {/*skip equals*/}
\s                                          {/*skip whitespace*/}
<<EOF>>										return 'EOF';
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