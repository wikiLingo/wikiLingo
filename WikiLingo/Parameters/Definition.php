<?php
/* Jison base parser */



class WikiLingo_Parameters_Definition extends Jison_Base
{
	function __construct()
    {
        //Setup Parser
        
			$symbol0 = new Jison_ParserSymbol("accept", 0);
			$symbol1 = new Jison_ParserSymbol("end", 1);
			$symbol2 = new Jison_ParserSymbol("error", 2);
			$symbol3 = new Jison_ParserSymbol("arguments", 3);
			$symbol4 = new Jison_ParserSymbol("EOF", 4);
			$symbol5 = new Jison_ParserSymbol("parameters", 5);
			$symbol6 = new Jison_ParserSymbol("parameter", 6);
			$symbol7 = new Jison_ParserSymbol("PARAMETER_NAME", 7);
			$symbol8 = new Jison_ParserSymbol("PARAMETER_VALUE", 8);
			$this->symbols[0] = $symbol0;
			$this->symbols["accept"] = $symbol0;
			$this->symbols[1] = $symbol1;
			$this->symbols["end"] = $symbol1;
			$this->symbols[2] = $symbol2;
			$this->symbols["error"] = $symbol2;
			$this->symbols[3] = $symbol3;
			$this->symbols["arguments"] = $symbol3;
			$this->symbols[4] = $symbol4;
			$this->symbols["EOF"] = $symbol4;
			$this->symbols[5] = $symbol5;
			$this->symbols["parameters"] = $symbol5;
			$this->symbols[6] = $symbol6;
			$this->symbols["parameter"] = $symbol6;
			$this->symbols[7] = $symbol7;
			$this->symbols["PARAMETER_NAME"] = $symbol7;
			$this->symbols[8] = $symbol8;
			$this->symbols["PARAMETER_VALUE"] = $symbol8;

			$this->terminals = array(
					2=>&$symbol2,
					4=>&$symbol4,
					7=>&$symbol7,
					8=>&$symbol8
				);

			$table0 = new Jison_ParserState(0);
			$table1 = new Jison_ParserState(1);
			$table2 = new Jison_ParserState(2);
			$table3 = new Jison_ParserState(3);
			$table4 = new Jison_ParserState(4);
			$table5 = new Jison_ParserState(5);
			$table6 = new Jison_ParserState(6);
			$table7 = new Jison_ParserState(7);
			$table8 = new Jison_ParserState(8);

			$tableDefinition0 = array(
				
					3=>new Jison_ParserAction($this->none, $table1),
					4=>new Jison_ParserAction($this->shift, $table2),
					5=>new Jison_ParserAction($this->none, $table3),
					6=>new Jison_ParserAction($this->none, $table4),
					7=>new Jison_ParserAction($this->shift, $table5)
				);

			$tableDefinition1 = array(
				
					1=>new Jison_ParserAction($this->accept)
				);

			$tableDefinition2 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table1)
				);

			$tableDefinition3 = array(
				
					4=>new Jison_ParserAction($this->shift, $table6),
					6=>new Jison_ParserAction($this->none, $table7),
					7=>new Jison_ParserAction($this->shift, $table5)
				);

			$tableDefinition4 = array(
				
					4=>new Jison_ParserAction($this->reduce, $table3),
					7=>new Jison_ParserAction($this->reduce, $table3)
				);

			$tableDefinition5 = array(
				
					4=>new Jison_ParserAction($this->reduce, $table5),
					7=>new Jison_ParserAction($this->reduce, $table5),
					8=>new Jison_ParserAction($this->shift, $table8)
				);

			$tableDefinition6 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table2)
				);

			$tableDefinition7 = array(
				
					4=>new Jison_ParserAction($this->reduce, $table4),
					7=>new Jison_ParserAction($this->reduce, $table4)
				);

			$tableDefinition8 = array(
				
					4=>new Jison_ParserAction($this->reduce, $table6),
					7=>new Jison_ParserAction($this->reduce, $table6)
				);

			$table0->setActions($tableDefinition0);
			$table1->setActions($tableDefinition1);
			$table2->setActions($tableDefinition2);
			$table3->setActions($tableDefinition3);
			$table4->setActions($tableDefinition4);
			$table5->setActions($tableDefinition5);
			$table6->setActions($tableDefinition6);
			$table7->setActions($tableDefinition7);
			$table8->setActions($tableDefinition8);

			$this->table = array(
				
					0=>$table0,
					1=>$table1,
					2=>$table2,
					3=>$table3,
					4=>$table4,
					5=>$table5,
					6=>$table6,
					7=>$table7,
					8=>$table8
				);

			$this->defaultActions = array(
				
					2=>new Jison_ParserAction($this->reduce, $table1),
					6=>new Jison_ParserAction($this->reduce, $table2)
				);

			$this->productions = array(
				
					0=>new Jison_ParserProduction($symbol0),
					1=>new Jison_ParserProduction($symbol3,1),
					2=>new Jison_ParserProduction($symbol3,2),
					3=>new Jison_ParserProduction($symbol5,1),
					4=>new Jison_ParserProduction($symbol5,2),
					5=>new Jison_ParserProduction($symbol6,1),
					6=>new Jison_ParserProduction($symbol6,2)
				);




        //Setup Lexer
        
			$this->rules = array(
				
					0=>"/^(?:('))/",
					1=>"/^(?:(\"))/",
					2=>"/^(?:(.|\n)*(?=(')))/",
					3=>"/^(?:(.|\n)*(?=(\")))/",
					4=>"/^(?:('))/",
					5=>"/^(?:(\"))/",
					6=>"/^(?:parameterName(?=(([=]|[=][>]))))/",
					7=>"/^(?:(([=]|[=][>]))$)/"
				);

			$this->conditions = array(
				
					"singleQuoteParameter"=>new Jison_LexerConditions(array( 0,2,4,5,6,7), true),
					"doubleQuoteParameter"=>new Jison_LexerConditions(array( 1,3,4,5,6,7), true),
					"INITIAL"=>new Jison_LexerConditions(array( 4,5,6,7), true)
				);


    }

    function parserPerformAction(&$thisS, &$yy, $yystate, &$s, $o)
	{
		
/* this == yyval */


switch (yystate) {
case 1:
        
            return array();
        
    
break;
case 2:
        
            return WikiLingo_Parameters::get();
        
    
break;
case 6:
        
            WikiLingo_Parameters::add($s[$o-1]->text, $s[$o]->text);
        
    
break;
}

	}

	function LexerPerformAction($avoidingNameCollisions, $YY_START = null)
	{
		

;
switch($avoidingNameCollisions) {
case 0:
    
        $this->popState();
    

break;
case 1:
    
        $this->popState();
    

break;
case 2:
    return 'VALUE';

break;
case 3:
    return 8;

break;
case 4:
    
        $this->begin('singleQuoteParameter');
    

break;
case 5:
    
        $this->begin('doubleQuoteParameter');
    

break;
case 6:
    
        return 7;
    

break;
case 7:return 4;
break;
}

	}
}
