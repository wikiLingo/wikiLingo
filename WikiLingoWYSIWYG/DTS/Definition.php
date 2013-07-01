<?php
/* Jison base parser */



class WikiLingoWYSIWYG_DTS_Definition extends Jison_Base
{
	function __construct()
    {
        //Setup Parser
        
			$symbol0 = new Jison_ParserSymbol("accept", 0);
			$symbol1 = new Jison_ParserSymbol("end", 1);
			$symbol2 = new Jison_ParserSymbol("error", 2);
			$symbol3 = new Jison_ParserSymbol("wiki", 3);
			$symbol4 = new Jison_ParserSymbol("contents", 4);
			$symbol5 = new Jison_ParserSymbol("EOF", 5);
			$symbol6 = new Jison_ParserSymbol("content", 6);
			$symbol7 = new Jison_ParserSymbol("CONTENT", 7);
			$symbol8 = new Jison_ParserSymbol("LINE_END", 8);
			$symbol9 = new Jison_ParserSymbol("HTML_TAG_INLINE", 9);
			$symbol10 = new Jison_ParserSymbol("HTML_TAG_OPEN", 10);
			$symbol11 = new Jison_ParserSymbol("HTML_TAG_CLOSE", 11);
			$this->symbols[0] = $symbol0;
			$this->symbols["accept"] = $symbol0;
			$this->symbols[1] = $symbol1;
			$this->symbols["end"] = $symbol1;
			$this->symbols[2] = $symbol2;
			$this->symbols["error"] = $symbol2;
			$this->symbols[3] = $symbol3;
			$this->symbols["wiki"] = $symbol3;
			$this->symbols[4] = $symbol4;
			$this->symbols["contents"] = $symbol4;
			$this->symbols[5] = $symbol5;
			$this->symbols["EOF"] = $symbol5;
			$this->symbols[6] = $symbol6;
			$this->symbols["content"] = $symbol6;
			$this->symbols[7] = $symbol7;
			$this->symbols["CONTENT"] = $symbol7;
			$this->symbols[8] = $symbol8;
			$this->symbols["LINE_END"] = $symbol8;
			$this->symbols[9] = $symbol9;
			$this->symbols["HTML_TAG_INLINE"] = $symbol9;
			$this->symbols[10] = $symbol10;
			$this->symbols["HTML_TAG_OPEN"] = $symbol10;
			$this->symbols[11] = $symbol11;
			$this->symbols["HTML_TAG_CLOSE"] = $symbol11;

			$this->terminals = array(
					2=>&$symbol2,
					5=>&$symbol5,
					7=>&$symbol7,
					8=>&$symbol8,
					9=>&$symbol9,
					10=>&$symbol10,
					11=>&$symbol11
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
			$table9 = new Jison_ParserState(9);
			$table10 = new Jison_ParserState(10);
			$table11 = new Jison_ParserState(11);
			$table12 = new Jison_ParserState(12);
			$table13 = new Jison_ParserState(13);

			$tableDefinition0 = array(
				
					3=>new Jison_ParserAction($this->none, $table1),
					4=>new Jison_ParserAction($this->none, $table2),
					5=>new Jison_ParserAction($this->shift, $table3),
					6=>new Jison_ParserAction($this->none, $table4),
					7=>new Jison_ParserAction($this->shift, $table5),
					8=>new Jison_ParserAction($this->shift, $table6),
					9=>new Jison_ParserAction($this->shift, $table7),
					10=>new Jison_ParserAction($this->shift, $table8)
				);

			$tableDefinition1 = array(
				
					1=>new Jison_ParserAction($this->accept)
				);

			$tableDefinition2 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table1),
					5=>new Jison_ParserAction($this->shift, $table9),
					6=>new Jison_ParserAction($this->none, $table10),
					7=>new Jison_ParserAction($this->shift, $table5),
					8=>new Jison_ParserAction($this->shift, $table6),
					9=>new Jison_ParserAction($this->shift, $table7),
					10=>new Jison_ParserAction($this->shift, $table8)
				);

			$tableDefinition3 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table3)
				);

			$tableDefinition4 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table4),
					5=>new Jison_ParserAction($this->reduce, $table4),
					7=>new Jison_ParserAction($this->reduce, $table4),
					8=>new Jison_ParserAction($this->reduce, $table4),
					9=>new Jison_ParserAction($this->reduce, $table4),
					10=>new Jison_ParserAction($this->reduce, $table4),
					11=>new Jison_ParserAction($this->reduce, $table4)
				);

			$tableDefinition5 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table6),
					5=>new Jison_ParserAction($this->reduce, $table6),
					7=>new Jison_ParserAction($this->reduce, $table6),
					8=>new Jison_ParserAction($this->reduce, $table6),
					9=>new Jison_ParserAction($this->reduce, $table6),
					10=>new Jison_ParserAction($this->reduce, $table6),
					11=>new Jison_ParserAction($this->reduce, $table6)
				);

			$tableDefinition6 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table7),
					5=>new Jison_ParserAction($this->reduce, $table7),
					7=>new Jison_ParserAction($this->reduce, $table7),
					8=>new Jison_ParserAction($this->reduce, $table7),
					9=>new Jison_ParserAction($this->reduce, $table7),
					10=>new Jison_ParserAction($this->reduce, $table7),
					11=>new Jison_ParserAction($this->reduce, $table7)
				);

			$tableDefinition7 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table8),
					5=>new Jison_ParserAction($this->reduce, $table8),
					7=>new Jison_ParserAction($this->reduce, $table8),
					8=>new Jison_ParserAction($this->reduce, $table8),
					9=>new Jison_ParserAction($this->reduce, $table8),
					10=>new Jison_ParserAction($this->reduce, $table8),
					11=>new Jison_ParserAction($this->reduce, $table8)
				);

			$tableDefinition8 = array(
				
					4=>new Jison_ParserAction($this->none, $table11),
					6=>new Jison_ParserAction($this->none, $table4),
					7=>new Jison_ParserAction($this->shift, $table5),
					8=>new Jison_ParserAction($this->shift, $table6),
					9=>new Jison_ParserAction($this->shift, $table7),
					10=>new Jison_ParserAction($this->shift, $table8),
					11=>new Jison_ParserAction($this->shift, $table12)
				);

			$tableDefinition9 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table2)
				);

			$tableDefinition10 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table5),
					5=>new Jison_ParserAction($this->reduce, $table5),
					7=>new Jison_ParserAction($this->reduce, $table5),
					8=>new Jison_ParserAction($this->reduce, $table5),
					9=>new Jison_ParserAction($this->reduce, $table5),
					10=>new Jison_ParserAction($this->reduce, $table5),
					11=>new Jison_ParserAction($this->reduce, $table5)
				);

			$tableDefinition11 = array(
				
					6=>new Jison_ParserAction($this->none, $table10),
					7=>new Jison_ParserAction($this->shift, $table5),
					8=>new Jison_ParserAction($this->shift, $table6),
					9=>new Jison_ParserAction($this->shift, $table7),
					10=>new Jison_ParserAction($this->shift, $table8),
					11=>new Jison_ParserAction($this->shift, $table13)
				);

			$tableDefinition12 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table10),
					5=>new Jison_ParserAction($this->reduce, $table10),
					7=>new Jison_ParserAction($this->reduce, $table10),
					8=>new Jison_ParserAction($this->reduce, $table10),
					9=>new Jison_ParserAction($this->reduce, $table10),
					10=>new Jison_ParserAction($this->reduce, $table10),
					11=>new Jison_ParserAction($this->reduce, $table10)
				);

			$tableDefinition13 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table9),
					5=>new Jison_ParserAction($this->reduce, $table9),
					7=>new Jison_ParserAction($this->reduce, $table9),
					8=>new Jison_ParserAction($this->reduce, $table9),
					9=>new Jison_ParserAction($this->reduce, $table9),
					10=>new Jison_ParserAction($this->reduce, $table9),
					11=>new Jison_ParserAction($this->reduce, $table9)
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
			$table9->setActions($tableDefinition9);
			$table10->setActions($tableDefinition10);
			$table11->setActions($tableDefinition11);
			$table12->setActions($tableDefinition12);
			$table13->setActions($tableDefinition13);

			$this->table = array(
				
					0=>$table0,
					1=>$table1,
					2=>$table2,
					3=>$table3,
					4=>$table4,
					5=>$table5,
					6=>$table6,
					7=>$table7,
					8=>$table8,
					9=>$table9,
					10=>$table10,
					11=>$table11,
					12=>$table12,
					13=>$table13
				);

			$this->defaultActions = array(
				
					3=>new Jison_ParserAction($this->reduce, $table3),
					9=>new Jison_ParserAction($this->reduce, $table2)
				);

			$this->productions = array(
				
					0=>new Jison_ParserProduction($symbol0),
					1=>new Jison_ParserProduction($symbol3,1),
					2=>new Jison_ParserProduction($symbol3,2),
					3=>new Jison_ParserProduction($symbol3,1),
					4=>new Jison_ParserProduction($symbol4,1),
					5=>new Jison_ParserProduction($symbol4,2),
					6=>new Jison_ParserProduction($symbol6,1),
					7=>new Jison_ParserProduction($symbol6,1),
					8=>new Jison_ParserProduction($symbol6,1),
					9=>new Jison_ParserProduction($symbol6,3),
					10=>new Jison_ParserProduction($symbol6,2)
				);




        //Setup Lexer
        
			$this->rules = array(
				
					0=>"/^(?:(<(.|\n)[^>]*?\/>))/",
					1=>"/^(?:$)/",
					2=>"/^(?:(<\/(.|\n)[^>]*?>))/",
					3=>"/^(?:(<(.|\n)[^>]*?>))/",
					4=>"/^(?:(<\/(.|\n)[^>]*?>))/",
					5=>"/^(?:([A-Za-z0-9 .,?;]+))/",
					6=>"/^(?:([ ]))/",
					7=>"/^(?:((\n\r|\r\n|[\n\r])))/",
					8=>"/^(?:(.))/",
					9=>"/^(?:$)/"
				);

			$this->conditions = array(
				
					"htmlElement"=>new Jison_LexerConditions(array( 0,1,2,3,4,5,6,7,8,9), true),
					"INITIAL"=>new Jison_LexerConditions(array( 0,3,4,5,6,7,8,9), true)
				);



	    parent::__construct();
    }

    function parserPerformAction(&$thisS, &$yy, $yystate, &$s, $o)
	{
		


switch ($yystate) {
case 1:return $s[$o];
break;
case 2:return $s[$o-1];
break;
case 3:return "";
break;
case 4:
		
			$thisS = $s[$o]->text;
		
	
break;
case 5:
		 $thisS = $s[$o-1]->text->addSibling($s[$o]->text);
	
break;
case 6:
         $thisS = $this->content($s[$o]->text);
    
break;
case 7:
         $thisS = $this->lineEnd($s[$o]->text);
    
break;
case 8:
	     $thisS = $this->inlineElement($s[$o]->text);
	
break;
case 9:
	    
	        $s[$o-2]->text = $this->element($s[$o-2]->text, true);
	        $s[$o-2]->text->addChild($s[$o-1]->text);
	        $thisS = $s[$o-2]->text;
	    
	
break;
case 10:
	     $thisS = $this->element($s[$o-1]->text, true);
	
break;
}

	}

	function LexerPerformAction($avoidingNameCollisions, $YY_START = null)
	{
		


switch($avoidingNameCollisions) {
case 0:
		
		    //A tag that doesn't need to track state
            if (WikiLingoWYSIWYG_DTS::isHtmlTag($this->yy->text) == true) {
               return "HTML_TAG_INLINE";
            }

            //A non-valid html tag, return "<" put the rest back into the parser
            if (isset($this->yy->text{0})) {
               $tag = $this->yy->text;
               $this->yy->text = $this->yy->text{0};
               $this->unput(substr($tag, 1));
            }
            return 7;
        
	
break;
case 1:
		
		    //A tag that was left open, and needs to close
            $name = end($this->htmlElementsStack);
            $element = end($this->htmlElementStack);
            return 7;
		
	
break;
case 2:
	    
            //A tag that is open and we just found the close for it
            $element = $this->unStackHtmlElement($this->yy->text);
            if (isset($element)) {
               $this->yy->text = $element;
               $this->popState();
               return "HTML_TAG_CLOSE";
            }
            return 7;
    	
	
break;
case 3:
	    
            //An tag open
            if (WikiLingoWYSIWYG_DTS::isHtmlTag($this->yy->text)) {
               $this->stackHtmlElement($this->yy->text);
               $this->begin('htmlElement');
               return "HTML_TAG_OPEN";
            }

            //A non-valid html tag, return the first character in the stack and put the rest back into the parser
            if (isset($this->yy->text{0})) {
               $tag = $this->yy->text;
               $this->yy->text = $this->yy->text{0};
               $this->unput(substr($tag, 1));
            }

            return 7;
        
	
break;
case 4:
	    
		    //A tag that was not opened, needs to be ignored
    	    return 7;
    	
	
break;
case 5:return 7;
break;
case 6:return 7;
break;
case 7:
		
            if ($this->htmlElementsStackCount == 0 || $this->isStaticTag == true) {
               return 8;
            }
            return 'CONTENT';
		
	
break;
case 8:return 7;
break;
case 9:return 5;
break;
}

	}
}
