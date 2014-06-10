<?php
/* Jison generated parser */
namespace WikiLingo\Utilities\Parameters;
use Exception;




class Definition extends Base
{
    public $symbols = array();
    public $terminals = array();
    public $productions = array();
    public $table = array();
    public $defaultActions = array();
    public $version = '0.3.12';
    public $debug = false;
    public $none = 0;
    public $shift = 1;
    public $reduce = 2;
    public $accept = 3;

    function trace()
    {

    }

    function __construct()
    {
        //Setup Parser
        
			$symbol0 = new ParserSymbol("accept", 0);
			$symbol1 = new ParserSymbol("end", 1);
			$symbol2 = new ParserSymbol("error", 2);
			$symbol3 = new ParserSymbol("arguments", 3);
			$symbol4 = new ParserSymbol("EOF", 4);
			$symbol5 = new ParserSymbol("parameters", 5);
			$symbol6 = new ParserSymbol("parameter", 6);
			$symbol7 = new ParserSymbol("PARAMETER_NAME", 7);
			$symbol8 = new ParserSymbol("PARAMETER_VALUE", 8);
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

			$table0 = new ParserState(0);
			$table1 = new ParserState(1);
			$table2 = new ParserState(2);
			$table3 = new ParserState(3);
			$table4 = new ParserState(4);
			$table5 = new ParserState(5);
			$table6 = new ParserState(6);
			$table7 = new ParserState(7);
			$table8 = new ParserState(8);

			$tableDefinition0 = array(
				
					3=>new ParserAction($this->none, $table1),
					4=>new ParserAction($this->shift, $table2),
					5=>new ParserAction($this->none, $table3),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5)
				);

			$tableDefinition1 = array(
				
					1=>new ParserAction($this->accept)
				);

			$tableDefinition2 = array(
				
					1=>new ParserAction($this->reduce, $table1)
				);

			$tableDefinition3 = array(
				
					4=>new ParserAction($this->shift, $table6),
					6=>new ParserAction($this->none, $table7),
					7=>new ParserAction($this->shift, $table5)
				);

			$tableDefinition4 = array(
				
					4=>new ParserAction($this->reduce, $table3),
					7=>new ParserAction($this->reduce, $table3)
				);

			$tableDefinition5 = array(
				
					4=>new ParserAction($this->reduce, $table5),
					7=>new ParserAction($this->reduce, $table5),
					8=>new ParserAction($this->shift, $table8)
				);

			$tableDefinition6 = array(
				
					1=>new ParserAction($this->reduce, $table2)
				);

			$tableDefinition7 = array(
				
					4=>new ParserAction($this->reduce, $table4),
					7=>new ParserAction($this->reduce, $table4)
				);

			$tableDefinition8 = array(
				
					4=>new ParserAction($this->reduce, $table6),
					7=>new ParserAction($this->reduce, $table6)
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
				
					2=>new ParserAction($this->reduce, $table1),
					6=>new ParserAction($this->reduce, $table2)
				);

			$this->productions = array(
				
					0=>new ParserProduction($symbol0),
					1=>new ParserProduction($symbol3,1),
					2=>new ParserProduction($symbol3,2),
					3=>new ParserProduction($symbol5,1),
					4=>new ParserProduction($symbol5,2),
					5=>new ParserProduction($symbol6,1),
					6=>new ParserProduction($symbol6,2)
				);




        //Setup Lexer
        
			$this->rules = array(
				
					0=>"/\G(?:([']))/",
					1=>"/\G(?:([\"]))/",
					2=>"/\G(?:([`]))/",
					3=>"/\G(?:((.|[\n\r\s])*?)(?=(['])))/",
					4=>"/\G(?:((.|[\n\r\s])*?)(?=([\"])))/",
					5=>"/\G(?:((.|[\n\r\s])*?)(?=([`])))/",
					6=>"/\G(?:([a-zA-Z0-9_-]+))/",
					7=>"/\G(?:([']))/",
					8=>"/\G(?:([\"]))/",
					9=>"/\G(?:([`]))/",
					10=>"/\G(?:([a-zA-Z0-9_-]+))/",
					11=>"/\G(?:([=]))/",
					12=>"/\G(?:\s+)/",
					13=>"/\G(?:\s+)/",
					14=>"/\G(?:$)/",
					15=>"/\G(?:.)/",
					16=>"/\G(?:([//]))/"
				);

			$this->conditions = array(
				
					"singleQuoteParameter"=>new LexerConditions(array( 0,3,10,11,13,14,15,16), true),
					"doubleQuoteParameter"=>new LexerConditions(array( 1,4,10,11,13,14,15,16), true),
					"angleQuoteParameter"=>new LexerConditions(array( 2,5,10,11,13,14,15,16), true),
					"equals"=>new LexerConditions(array( 6,7,8,9,10,11,12,13,14,15,16), true),
					"INITIAL"=>new LexerConditions(array( 10,11,13,14,15,16), true)
				);


    }

    function parserPerformAction(&$thisS, &$yy, $yystate, &$s, $o)
    {
        
/* this == yyval */


switch ($yystate) {
case 1:
        
            return array();
        
    
break;
case 2:
        
            return $this->get();
        
    
break;
case 6:
        
            $this->add($s[$o-1]->text, $s[$o]->text);
        
    
break;
}

    }

    function parserLex()
    {
        $token = $this->lexerLex(); // $end = 1

        if (isset($token)) {
            return $token;
        }

        return $this->symbols["end"];
    }

    function parseError($str = "", ParserError $hash = null)
    {
        throw new Exception($str);
    }

    function lexerError($str = "", LexerError $hash = null)
    {
        throw new Exception($str);
    }

    function parse($input)
    {
        if (empty($this->table)) {
            throw new Exception("Empty Table");
        }
        $this->eof = new ParserSymbol("Eof", 1);
        $firstAction = new ParserAction(0, $this->table[0]);
        $firstCachedAction = new ParserCachedAction($firstAction);
        $stack = array($firstCachedAction);
        $stackCount = 1;
        $vstack = array(null);
        $vstackCount = 1;
        $yy = null;
        $_yy = null;
        $recovering = 0;
        $symbol = null;
        $action = null;
        $errStr = "";
        $preErrorSymbol = null;
        $state = null;

        $this->setInput($input);

        while (true) {
            // retrieve state number from top of stack
            $state = $stack[$stackCount - 1]->action->state;
            // use default actions if available
            if ($state != null && isset($this->defaultActions[$state->index])) {
                $action = $this->defaultActions[$state->index];
            } else {
                if (empty($symbol) == true) {
                    $symbol = $this->parserLex();
                }
                // read action for current state and first input
                if (isset($state) && isset($state->actions[$symbol->index])) {
                    //$action = $this->table[$state][$symbol];
                    $action = $state->actions[$symbol->index];
                } else {
                    $action = null;
                }
            }

            if ($action == null) {
                if ($recovering == 0) {
                    // Report error
                    $expected = array();
                    foreach($this->table[$state->index]->actions as $p => $item) {
                        if (!empty($this->terminals[$p]) && $p > 2) {
                            $expected[] = $this->terminals[$p]->name;
                        }
                    }

                    $errStr = "Parse error on line " . ($this->yy->lineNo + 1) . ":\n" . $this->showPosition() . "\nExpecting " . implode(", ", $expected) . ", got '" . (isset($this->terminals[$symbol->index]) ? $this->terminals[$symbol->index]->name : 'NOTHING') . "'";

                    $this->parseError($errStr, new ParserError($this->match, $state, $symbol, $this->yy->lineNo, $this->yy->loc, $expected));
                }
            }

            if ($state === null || $action === null) {
                break;
            }

            switch ($action->action) {
                case 1:
                    // shift
                    //$this->shiftCount++;
                    $stack[] = new ParserCachedAction($action, $symbol);
                    $stackCount++;

                    $vstack[] = clone($this->yy);
                    $vstackCount++;

                    $symbol = "";
                    if ($preErrorSymbol == null) { // normal execution/no error
                        $yy = clone($this->yy);
                        if ($recovering > 0) $recovering--;
                    } else { // error just occurred, resume old look ahead f/ before error
                        $symbol = $preErrorSymbol;
                        $preErrorSymbol = null;
                    }
                    break;

                case 2:
                    // reduce
                    $len = $this->productions[$action->state->index]->len;
                    // perform semantic action
                    $_yy = $vstack[$vstackCount - $len];// default to $S = $1
                    // default location, uses first token for firsts, last for lasts

                    if (isset($this->ranges)) {
                        //TODO: add ranges
                    }

                    $r = $this->parserPerformAction($_yy->text, $yy, $action->state->index, $vstack, $vstackCount - 1);

                    if (isset($r)) {
                        return $r;
                    }

                    // pop off stack
                    while ($len > 0) {
                        $len--;

                        array_pop($stack);
                        $stackCount--;

                        array_pop($vstack);
                        $vstackCount--;
                    }

                    if (is_null($_yy))
                    {
                        $vstack[] = new ParserValue();
                    }
                    else
                    {
                        $vstack[] = $_yy;
                    }
                    $vstackCount++;

                    $nextSymbol = $this->productions[$action->state->index]->symbol;
                    // goto new state = table[STATE][NONTERMINAL]
                    $nextState = $stack[$stackCount - 1]->action->state;
                    $nextAction = $nextState->actions[$nextSymbol->index];

                    $stack[] = new ParserCachedAction($nextAction, $nextSymbol);
                    $stackCount++;

                    break;

                case 3:
                    // accept
                    return true;
            }

        }

        return true;
    }


    /* Jison generated lexer */
    public $eof;
    public $yy = null;
    public $match = "";
    public $conditionStack = array();
    public $conditionStackCount = 0;
    public $rules = array();
    public $conditions = array();
    public $done = false;
    public $less;
    public $more;
	public $input;
    public $offset;
    public $ranges;
    public $flex = false;

    function setInput($input)
    {
        $this->input = new InputReader($input);
        $this->more = $this->less = $this->done = false;
        $this->yy = new ParserValue();
        $this->conditionStack = array('INITIAL');
        $this->conditionStackCount = 1;

        if (isset($this->ranges)) {
            $loc = $this->yy->loc = new ParserLocation();
            $loc->Range(new ParserRange(0, 0));
        } else {
            $this->yy->loc = new ParserLocation();
        }
        $this->offset = 0;
    }

    function input()
    {
        $ch = $this->input->ch();
        $this->yy->text .= $ch;
        $this->yy->leng++;
        $this->offset++;
        $this->match .= $ch;
        $lines = preg_match("/(?:\r\n?|\n).*/", $ch);
        if (count($lines) > 0) {
            $this->yy->lineNo++;
            $this->yy->lastLine++;
        } else {
            $this->yy->loc->lastColumn++;
        }
        if (isset($this->ranges)) {
            $this->yy->loc->range->y++;
        }

        return $ch;
    }

    function unput($ch)
    {
        $len = strlen($ch);
        $lines = explode("/(?:\r\n?|\n)/", $ch);
        $linesCount = count($lines);

        $this->input->unCh($len);
        $this->yy->text = substr($this->yy->text, 0, $len - 1);
        //$this->yylen -= $len;
        $this->offset -= $len;
        $oldLines = explode("/(?:\r\n?|\n)/", $this->match);
        $oldLinesCount = count($oldLines);
        $this->match = substr($this->match, 0, strlen($this->match) - 1);

        if (($linesCount - 1) > 0) $this->yy->lineNo -= $linesCount - 1;
        $r = $this->yy->loc->range;
        $oldLinesLength = (isset($oldLines[$oldLinesCount - $linesCount]) ? strlen($oldLines[$oldLinesCount - $linesCount]) : 0);

        $this->yy->loc = new ParserLocation(
            $this->yy->loc->firstLine,
            $this->yy->lineNo,
            $this->yy->loc->firstColumn,
            $this->yy->loc->firstLine,
            (empty($lines) ?
                ($linesCount == $oldLinesCount ? $this->yy->loc->firstColumn : 0) + $oldLinesLength :
                $this->yy->loc->firstColumn - $len)
        );

        if (isset($this->ranges)) {
            $this->yy->loc->range = array($r[0], $r[0] + $this->yy->leng - $len);
        }
    }

    function more()
    {
        $this->more = true;
    }

    function pastInput()
    {
	    $matched = $this->input->toString();
        $past = substr($matched, 0, strlen($matched) - strlen($this->match));
        return (strlen($past) > 20 ? '...' : '') . preg_replace("/\n/", "", substr($past, -20));
    }

    function upcomingInput()
    {
        if (!$this->done) {
            $next = $this->match;
            if (strlen($next) < 20) {
                $next .= substr($this->input->toString(), 0, 20 - strlen($next));
            }
            return preg_replace("/\n/", "", substr($next, 0, 20) . (strlen($next) > 20 ? '...' : ''));
        } else {
            return "";
        }
    }

    function showPosition()
    {
        $pre = $this->pastInput();

        $c = '';
        for($i = 0, $preLength = strlen($pre); $i < $preLength; $i++) {
            $c .= '-';
        }

        return $pre . $this->upcomingInput() . "\n" . $c . "^";
    }

    function next()
    {
        if ($this->done == true) {
            return $this->eof;
        }

        if ($this->input->done) {
            $this->done = true;
        }

        if ($this->more == false) {
            $this->yy->text = '';
            $this->match = '';
        }

        $rules = $this->currentRules();
        for ($i = 0, $j = count($rules); $i < $j; $i++) {
	        $tempMatch = $this->input->match($this->rules[$rules[$i]]);
            if ($tempMatch && (empty($match) || count($tempMatch[0]) > count($match[0]))) {
                $match = $tempMatch;
                $index = $i;
                if (isset($this->flex) && $this->flex == false) {
                    break;
                }
            }
        }
        if ( $match ) {
            $matchCount = strlen($match[0]);
            $lineCount = preg_match("/(?:\r\n?|\n).*/", $match[0], $lines);
            $line = ($lines ? $lines[$lineCount - 1] : false);
            $this->yy->lineNo += $lineCount;

            $this->yy->loc = new ParserLocation(
                $this->yy->loc->lastLine,
                $this->yy->lineNo + 1,
                $this->yy->loc->lastColumn,
                ($line ?
                    count($line) - preg_match("/\r?\n?/", $line, $na) :
                    $this->yy->loc->lastColumn + $matchCount
                )
            );


            $this->yy->text .= $match[0];
            $this->match .= $match[0];
            $this->matches = $match;

            $this->yy->leng = strlen($this->yy->text);
            if (isset($this->ranges)) {
                $this->yy->loc->range = new ParserRange($this->offset, $this->offset += $this->yy->leng);
            }
            $this->more = false;
	        $this->input->addMatch($match[0]);
            $ruleIndex = $rules[$index];
            $nextCondition = $this->conditionStack[$this->conditionStackCount - 1];

            $token = $this->lexerPerformAction($ruleIndex, $nextCondition);

            if ($this->done == true && !$this->input->done) {
                $this->done = false;
            }

            if (empty($token) == false) {
                return $this->symbols[
                    $token
                ];
            } else {
                return null;
            }
        }

        if ($this->input->done) {
            return $this->eof;
        } else {
            $this->lexerError("Lexical error on line " . ($this->yy->lineNo + 1) . ". Unrecognized text.\n" . $this->showPosition(), new LexerError("", -1, $this->yy->lineNo));
            return null;
        }
    }

    function lexerLex()
    {
        $r = $this->next();

        while (is_null($r) && !$this->done) {
            $r = $this->next();
        }

        return $r;
    }

    function begin($condition)
    {
        $this->conditionStackCount++;
        $this->conditionStack[] = $condition;
    }

    function popState()
    {
        $this->conditionStackCount--;
        return array_pop($this->conditionStack);
    }

    function currentRules()
    {
        $peek = $this->conditionStack[$this->conditionStackCount - 1];
        return $this->conditions[$peek]->rules;
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
    
        $this->popState();
    

break;
case 3:
    return 8;

break;
case 4:
    return 8;

break;
case 5:
    return 8;

break;
case 6:
	
		$this->popState();
		return 8;
	

break;
case 7:
    
        $this->popState();
        $this->begin('singleQuoteParameter');
    

break;
case 8:
    
        $this->popState();
        $this->begin('doubleQuoteParameter');
    

break;
case 9:
    
        $this->popState();
        $this->begin('angleQuoteParameter');
    

break;
case 10:
    return 7;

break;
case 11:
	
		$this->begin('equals');
	

break;
case 12:/**/
break;
case 13:/**/
break;
case 14:return 4;
break;
case 15:/**/
break;
case 16:/**/
break;
}

    }
}

class ParserLocation
{
    public $firstLine = 1;
    public $lastLine = 0;
    public $firstColumn = 1;
    public $lastColumn = 0;
    public $range;

    public function __construct($firstLine = 1, $lastLine = 0, $firstColumn = 1, $lastColumn = 0)
    {
        $this->firstLine = $firstLine;
        $this->lastLine = $lastLine;
        $this->firstColumn = $firstColumn;
        $this->lastColumn = $lastColumn;
    }

    public function Range($range)
    {
        $this->range = $range;
    }

    public function __clone()
    {
        if (isset($this->range)) {
            $this->range = clone $this->range;
        }
    }
}

class ParserValue
{
    public $leng = 0;
    public $loc;
    public $lineNo = 0;
    public $text;

    function __clone() {
        if (isset($this->loc)) {
            $this->loc = clone $this->loc;
        }
    }
}

class LexerConditions
{
    public $rules;
    public $inclusive;

    function __construct($rules, $inclusive)
    {
        $this->rules = $rules;
        $this->inclusive = $inclusive;
    }
}

class ParserProduction
{
    public $len = 0;
    public $symbol;

    public function __construct($symbol, $len = 0)
    {
        $this->symbol = $symbol;
        $this->len = $len;
    }
}

class ParserCachedAction
{
    public $action;
    public $symbol;

    function __construct($action, $symbol = null)
    {
        $this->action = $action;
        $this->symbol = $symbol;
    }
}

class ParserAction
{
    public $action;
    public $state;
    public $symbol;

    function __construct($action, &$state = null, &$symbol = null)
    {
        $this->action = $action;
        $this->state = $state;
        $this->symbol = $symbol;
    }
}

class ParserSymbol
{
    public $name;
    public $index = -1;
    public $symbols = array();
    public $symbolsByName = array();

    function __construct($name, $index)
    {
        $this->name = $name;
        $this->index = $index;
    }

    public function addAction($a)
    {
        $this->symbols[$a->index] = $this->symbolsByName[$a->name] = $a;
    }
}

class ParserError
{
    public $text;
    public $state;
    public $symbol;
    public $lineNo;
    public $loc;
    public $expected;

    function __construct($text, $state, $symbol, $lineNo, $loc, $expected)
    {
        $this->text = $text;
        $this->state = $state;
        $this->symbol = $symbol;
        $this->lineNo = $lineNo;
        $this->loc = $loc;
        $this->expected = $expected;
    }
}

class LexerError
{
    public $text;
    public $token;
    public $lineNo;

    public function __construct($text, $token, $lineNo)
    {
        $this->text = $text;
        $this->token = $token;
        $this->lineNo = $lineNo;
    }
}

class ParserState
{
    public $index;
    public $actions = array();

    function __construct($index)
    {
        $this->index = $index;
    }

    public function setActions(&$actions)
    {
        $this->actions = $actions;
    }
}

class ParserRange
{
    public $x;
    public $y;

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

class InputReader
{
	public $done = false;
	public $input;
	public $length;
	public $matches = array();
	public $position = 0;

	public function __construct($input)
	{
		$this->input = $input;
		$this->length = strlen($input);
	}

	public function addMatch($match) {
		$this->matches[] = $match;
		$this->position += strlen($match);
		$this->done = ($this->position >= $this->length);
	}

    public function ch()
	{
		$ch = $this->input{$this->position};
		$this->addMatch($ch);
		return $ch;
	}

	public function unCh($chLength)
	{
		$this->position -= $chLength;
		$this->position = max(0, $this->position);
		$this->done = ($this->position >= $this->length);
	}

	public function substring($start, $end) {
		$start = ($start != 0 ? $this->position + $start : $this->position);
		$end = ($end != 0 ? $start + $end : $this->length);
		return substr($this->input, $start, $end);
	}

	public function match($rule) {
		if (preg_match($rule, $this->input, $match, null, $this->position)) {
			return $match;
		}
		return null;
	}

    public function toString()
	{
        return implode('', $this->matches);
    }
}