//phpOption parserClass:WikiLingo_Parameters_Definition
//phpOption fileName:Definition.php
//phpOption usingZend:true


//Lexical Grammar
%lex

//Named Regex Patterns
singleQuote                     "'"
doubleQuote                     '"'
parameterName                   [a-zA-Z0-9_]+
equals                          ([=]|[=][>])
%s singleQuoteParameter doubleQuoteParameter


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

<singleQuoteParameter>(.|\n)*(?={singleQuote})
%{
    return 'VALUE';
%}
<doubleQuoteParameter>(.|\n)*(?={doubleQuote})
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
parameterName(?={equals})
%{
    /*php
        return 'PARAMETER_NAME';
    */
%}
{equals}
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
            return WikiLingo_Parameters::get();
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
            WikiLingo_Parameters::add($1->text, $2->text);
        */
    }
    ;