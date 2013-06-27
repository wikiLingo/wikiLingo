<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: Html.php 45134 2013-03-15 18:47:02Z changi67 $

class JisonParser_Html
{
	public $symbols_ = array();
	public $terminals_ = array();
	public $productions_ = array();
	public $table = array();
	public $defaultActions = array();
	public $version = '0.3.12';
	public $debug = false;

	function __construct()
	{
		//ini_set('error_reporting', E_ALL);
		//ini_set('display_errors', 1);

		$accept = 'accept';
		$end = 'end';

		//parser
		$this->symbols_ = 		json_decode('{"error":2,"wiki":3,"contents":4,"EOF":5,"content":6,"CONTENT":7,"LINE_END":8,"HTML_TAG_INLINE":9,"HTML_TAG_OPEN":10,"HTML_TAG_CLOSE":11,"$accept":0,"$end":1}', true);
		$this->terminals_ = 	json_decode('{"2":"error","5":"EOF","7":"CONTENT","8":"LINE_END","9":"HTML_TAG_INLINE","10":"HTML_TAG_OPEN","11":"HTML_TAG_CLOSE"}', true);
		$this->productions_ = 	json_decode('[0,[3,1],[3,2],[3,1],[4,1],[4,2],[6,1],[6,1],[6,1],[6,3],[6,2]]', true);
		$this->table = 			json_decode('[{"3":1,"4":2,"5":[1,3],"6":4,"7":[1,5],"8":[1,6],"9":[1,7],"10":[1,8]},{"1":[3]},{"1":[2,1],"5":[1,9],"6":10,"7":[1,5],"8":[1,6],"9":[1,7],"10":[1,8]},{"1":[2,3]},{"1":[2,4],"5":[2,4],"7":[2,4],"8":[2,4],"9":[2,4],"10":[2,4],"11":[2,4]},{"1":[2,6],"5":[2,6],"7":[2,6],"8":[2,6],"9":[2,6],"10":[2,6],"11":[2,6]},{"1":[2,7],"5":[2,7],"7":[2,7],"8":[2,7],"9":[2,7],"10":[2,7],"11":[2,7]},{"1":[2,8],"5":[2,8],"7":[2,8],"8":[2,8],"9":[2,8],"10":[2,8],"11":[2,8]},{"4":11,"6":4,"7":[1,5],"8":[1,6],"9":[1,7],"10":[1,8],"11":[1,12]},{"1":[2,2]},{"1":[2,5],"5":[2,5],"7":[2,5],"8":[2,5],"9":[2,5],"10":[2,5],"11":[2,5]},{"6":10,"7":[1,5],"8":[1,6],"9":[1,7],"10":[1,8],"11":[1,13]},{"1":[2,10],"5":[2,10],"7":[2,10],"8":[2,10],"9":[2,10],"10":[2,10],"11":[2,10]},{"1":[2,9],"5":[2,9],"7":[2,9],"8":[2,9],"9":[2,9],"10":[2,9],"11":[2,9]}]', true);
		$this->defaultActions = json_decode('{"3":[2,3],"9":[2,2]}', true);

		//lexer
		$this->rules = 			array("/^(?:(<(.|\\n)[^>]*?\\/>))/","/^(?:$)/","/^(?:(<\\/(.|\\n)[^>]*?>))/","/^(?:(<(.|\\n)[^>]*?>))/","/^(?:(<\\/(.|\\n)[^>]*?>))/","/^(?:([A-Za-z0-9 .,?;]+))/","/^(?:([ ]))/","/^(?:((\\n\\r|\\r\\n|[\\n\\r])))/","/^(?:(.))/","/^(?:$)/");
		$this->conditions = 	json_decode('{"htmlElement":{"rules":[0,1,2,3,4,5,6,7,8,9],"inclusive":true},"INITIAL":{"rules":[0,3,4,5,6,7,8,9],"inclusive":true}}', true);

		$this->options =		json_decode('{}', true);
	}

	function trace()
	{

	}

	function parser_performAction(&$thisS, $yytext, $yyleng, $yylineno, $yystate, $S, $_S, $O)
	{
		switch ($yystate) {
			case 1:
				return $S[$O];
				break;
			case 2:
				return $S[$O-1];
				break;
			case 3:
				return "";
				break;
			case 4:
				$thisS = $S[$O];
				break;
			case 5:
				$thisS = $S[$O-1] . $S[$O];
				break;
			case 6:
				$thisS = $this->content($S[$O]);
				break;
			case 7:
				$thisS = $this->lineEnd($S[$O]);
				break;
			case 8:
				$thisS = $this->toWiki($S[$O]);
				break;
			case 9:
				$thisS = $this->toWiki($S[$O], $S[$O-1]);
				break;
			case 10:
				$thisS = $this->toWiki($S[$O]);
				break;
		}

	}

	function parser_lex()
	{
		$token = $this->lexer_lex(); // $end = 1
		$token = (isset($token) ? $token : 1);

		// if token isn't its numeric value, convert
		if (isset($this->symbols_[$token]))
			return $this->symbols_[$token];

		return $token;
	}

	function parseError($str = "", $hash = array())
	{
		throw new Exception($str);
	}

	function parse($input)
	{
		$stack = array(0);
		$stackCount = 1;

		$vstack = array(null);
		$vstackCount = 1;
		// semantic value stack

		$lstack = array($this->yyloc);
		$lstackCount = 1;
		//location stack

		$shifts = 0;
		$reductions = 0;
		$recovering = 0;
		$TERROR = 2;

		$this->setInput($input);

		$yyval = (object)array();
		$yyloc = $this->yyloc;
		$lstack[] = $yyloc;

		while (true) {
			// retreive state number from top of stack
			$state = $stack[$stackCount - 1];
			// use default actions if available
			if (isset($this->defaultActions[$state])) {
				$action = $this->defaultActions[$state];
			} else {
				if (empty($symbol) == true) {
					$symbol = $this->parser_lex();
				}
				// read action for current state and first input
				if (isset($this->table[$state][$symbol])) {
					$action = $this->table[$state][$symbol];
				} else {
					$action = '';
				}
			}

			if (empty($action) == true) {
				if (!$recovering) {
					// Report error
					$expected = array();
					foreach ($this->table[$state] as $p => $item) {
						if (!empty($this->terminals_[$p]) && $p > 2) {
							$expected[] = $this->terminals_[$p];
						}
					}

					$errStr = "Parse error on line " . ($this->yylineno + 1) . ":\n" . $this->showPosition() . "\nExpecting " . implode(", ", $expected) . ", got '" . (isset($this->terminals_[$symbol]) ? $this->terminals_[$symbol] : 'NOTHING') . "'";

					$this->parseError(
						$errStr,
						array(
							"text"=> $this->match,
							"token"=> $symbol,
							"line"=> $this->yylineno,
							"loc"=> $yyloc,
							"expected"=> $expected
						)
					);
				}

				// just recovered from another error
				if ($recovering == 3) {
					if ($symbol == $this->EOF) {
						$this->parseError(isset($errStr) ? $errStr : 'Parsing halted.');
					}

					// discard current lookahead and grab another
					$yyleng = $this->yyleng;
					$yytext = $this->yytext;
					$yylineno = $this->yylineno;
					$yyloc = $this->yyloc;
					$symbol = $this->parser_lex();
				}

				// try to recover from error
				while (true) {
					// check for error recovery rule in this state
					if (isset($this->table[$state][$TERROR])) {
						break 2;
					}
					if ($state == 0) {
						$this->parseError(isset($errStr) ? $errStr : 'Parsing halted.');
					}

					array_slice($stack, 0, 2);
					$stackCount -= 2;

					array_slice($vstack, 0, 1);
					$vstackCount -= 1;

					$state = $stack[$stackCount - 1];
				}

				$preErrorSymbol = $symbol; // save the lookahead token
				$symbol = $TERROR; // insert generic error symbol as new lookahead
				$state = $stack[$stackCount - 1];
				if (isset($this->table[$state][$TERROR])) {
					$action = $this->table[$state][$TERROR];
				}
				$recovering = 3; // allow 3 real symbols to be shifted before reporting a new error
			}

			// this shouldn't happen, unless resolve defaults are off
			if (is_array($action[0])) {
				$this->parseError("Parse Error: multiple actions possible at state: " . $state . ", token: " . $symbol);
			}

			switch ($action[0]) {
				case 1:
					// shift
					//$this->shiftCount++;
					$stack[] = $symbol;
					$stackCount++;

					$vstack[] = $this->yytext;
					$vstackCount++;

					$lstack[] = $this->yyloc;
					$lstackCount++;

					$stack[] = $action[1]; // push state
					$stackCount++;

					$symbol = "";
					if (empty($preErrorSymbol)) { // normal execution/no error
						$yyleng = $this->yyleng;
						$yytext = $this->yytext;
						$yylineno = $this->yylineno;
						$yyloc = $this->yyloc;
						if ($recovering > 0) $recovering--;
					} else { // error just occurred, resume old lookahead f/ before error
						$symbol = $preErrorSymbol;
						$preErrorSymbol = "";
					}
					break;

				case 2:
					// reduce
					$len = $this->productions_[$action[1]][1];
					// perform semantic action
					$yyval->S = $vstack[$vstackCount - $len];// default to $S = $1
					// default location, uses first token for firsts, last for lasts
					$yyval->_S = array(
                        "first_line"=> 		$lstack[$lstackCount - (isset($len) ? $len : 1)]['first_line'],
                        "last_line"=> 		$lstack[$lstackCount - 1]['last_line'],
                        "first_column"=> 	$lstack[$lstackCount - (isset($len) ? $len : 1)]['first_column'],
                        "last_column"=> 	$lstack[$lstackCount - 1]['last_column']
                    );

					$r = $this->parser_performAction($yyval->S, $yytext, $yyleng, $yylineno, $action[1], $vstack, $lstack, $vstackCount - 1);

					if (isset($r)) {
						return $r;
					}

					// pop off stack
					if ($len > 0) {
						$stack = array_slice($stack, 0, -1 * $len * 2);
						$stackCount -= $len * 2;

						$vstack = array_slice($vstack, 0, -1 * $len);
						$vstackCount -= $len;

						$lstack = array_slice($lstack, 0, -1 * $len);
						$lstackCount -= $len;
					}

					$stack[] = $this->productions_[$action[1]][0]; // push nonterminal (reduce)
					$stackCount++;

					$vstack[] = $yyval->S;
					$vstackCount++;

					$lstack[] = $yyval->_S;
					$lstackCount++;

					// goto new state = table[STATE][NONTERMINAL]
					$newState = $this->table[$stack[$stackCount - 2]][$stack[$stackCount - 1]];

					$stack[] = $newState;
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
	public $EOF = 1;
	public $S = "";
	public $yy = "";
	public $yylineno = "";
	public $yyleng = "";
	public $yytext = "";
	public $match = "";
	public $matched = "";
	public $yyloc = array(
		"first_line"=> 1,
		"first_column"=> 0,
		"last_line"=> 1,
		"last_column"=> 0,
		"range"=> array()
	);
	public $conditionsStack = array();
	public $conditionStackCount = 0;
	public $rules = array();
	public $conditions = array();
	public $done = false;
	public $less;
	public $more;
	public $_input;
	public $options;
	public $offset;

	function setInput($input)
	{
		$this->_input = $input;
		$this->more = $this->less = $this->done = false;
		$this->yylineno = $this->yyleng = 0;
		$this->yytext = $this->matched = $this->match = '';
		$this->conditionStack = array('INITIAL');
		$this->yyloc["first_line"] = 1;
		$this->yyloc["first_column"] = 0;
		$this->yyloc["last_line"] = 1;
		$this->yyloc["last_column"] = 0;
		if (isset($this->options->ranges)) {
			$this->yyloc['range'] = array(0,0);
		}
		$this->offset = 0;
		return $this;
	}

	function input()
	{
		$ch = $this->_input[0];
		$this->yytext .= $ch;
		$this->yyleng++;
		$this->offset++;
		$this->match .= $ch;
		$this->matched .= $ch;
		$lines = preg_match("/(?:\r\n?|\n).*/", $ch);
		if (count($lines) > 0) {
			$this->yylineno++;
			$this->yyloc['last_line']++;
		} else {
			$this->yyloc['last_column']++;
		}
		if (isset($this->options->ranges)) $this->yyloc['range'][1]++;

		$this->_input = array_slice($this->_input, 1);
		return $ch;
	}

	function unput($ch)
	{
		$len = strlen($ch);
		$lines = explode("/(?:\r\n?|\n)/", $ch);
		$linesCount = count($lines);

		$this->_input = $ch . $this->_input;
		$this->yytext = substr($this->yytext, 0, $len - 1);
		//$this->yylen -= $len;
		$this->offset -= $len;
		$oldLines = explode("/(?:\r\n?|\n)/", $this->match);
		$oldLinesCount = count($oldLines);
		$this->match = substr($this->match, 0, strlen($this->match) - 1);
		$this->matched = substr($this->matched, 0, strlen($this->matched) - 1);

		if (($linesCount - 1) > 0) $this->yylineno -= $linesCount - 1;
		$r = $this->yyloc['range'];
		$oldLinesLength = (isset($oldLines[$oldLinesCount - $linesCount]) ? strlen($oldLines[$oldLinesCount - $linesCount]) : 0);

		$this->yyloc["first_line"] = $this->yyloc["first_line"];
		$this->yyloc["last_line"] = $this->yylineno + 1;
		$this->yyloc["first_column"] = $this->yyloc['first_column'];
		$this->yyloc["last_column"] = (empty($lines) ?
			($linesCount == $oldLinesCount ? $this->yyloc['first_column'] : 0) + $oldLinesLength :
			$this->yyloc['first_column'] - $len);

		if (isset($this->options->ranges)) {
			$this->yyloc['range'] = array($r[0], $r[0] + $this->yyleng - $len);
		}

		return $this;
	}

	function more()
	{
		$this->more = true;
		return $this;
	}

	function pastInput()
	{
		$past = substr($this->matched, 0, strlen($this->matched) - strlen($this->match));
		return (strlen($past) > 20 ? '...' : '') . preg_replace("/\n/", "", substr($past, -20));
	}

	function upcomingInput()
	{
		$next = $this->match;
		if (strlen($next) < 20) {
			$next .= substr($this->_input, 0, 20 - strlen($next));
		}
		return preg_replace("/\n/", "", substr($next, 0, 20) . (strlen($next) > 20 ? '...' : ''));
	}

	function showPosition()
	{
		$pre = $this->pastInput();

		$c = '';
		for ($i = 0, $preLength = strlen($pre); $i < $preLength; $i++) {
			$c .= '-';
		}

		return $pre . $this->upcomingInput() . "\n" . $c . "^";
	}

	function next()
	{
		if ($this->done == true) return $this->EOF;

		if (empty($this->_input)) $this->done = true;

		if ($this->more == false) {
			$this->yytext = '';
			$this->match = '';
		}

		$rules = $this->_currentRules();
		for ($i = 0, $j = count($rules); $i < $j; $i++) {
			preg_match($this->rules[$rules[$i]], $this->_input, $tempMatch);
            if ($tempMatch && (empty($match) || count($tempMatch[0]) > count($match[0]))) {
                $match = $tempMatch;
                $index = $i;
                if (isset($this->options->flex) && $this->options->flex == false) break;
            }
		}
		if ( $match ) {
			$matchCount = strlen($match[0]);
			$lineCount = preg_match("/\n.*/", $match[0], $lines);

			$this->yylineno += $lineCount;
			$this->yyloc["first_line"] = $this->yyloc['last_line'];
			$this->yyloc["last_line"] = $this->yylineno + 1;
			$this->yyloc["first_column"] = $this->yyloc['last_column'];
			$this->yyloc["last_column"] = $lines ? count($lines[$lineCount - 1]) - 1 : $this->yyloc['last_column'] + $matchCount;

			$this->yytext .= $match[0];
			$this->match .= $match[0];
			$this->matches = $match;
			$this->yyleng = strlen($this->yytext);
			if (isset($this->options->ranges)) {
				$this->yyloc['range'] = array($this->offset, $this->offset += $this->yyleng);
			}
			$this->more = false;
			$this->_input = substr($this->_input, $matchCount, strlen($this->_input));
			$this->matched .= $match[0];
			$token = $this->lexer_performAction($this->yy, $this, $rules[$index], $this->conditionStack[$this->conditionStackCount]);

			if ($this->done == true && empty($this->_input) == false) $this->done = false;

			if (empty($token) == false) {
				return $token;
			} else {
				return;
			}
		}

		if (empty($this->_input)) {
			return $this->EOF;
		} else {
			$this->parseError(
				"Lexical error on line " . ($this->yylineno + 1) . ". Unrecognized text.\n" . $this->showPosition(),
				array(
					"text"=> "",
					"token"=> null,
					"line"=> $this->yylineno
				)
			);
		}
	}

	function lexer_lex()
	{
		$r = $this->next();

		while (empty($r) && $this->done == false) {
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

	function _currentRules()
	{
		return $this->conditions[
			$this->conditionStack[
				$this->conditionStackCount
			]
		]['rules'];
	}

	function lexer_performAction(&$yy, $yy_, $avoiding_name_collisions, $YY_START = null)
	{
		$YYSTATE = $YY_START;



switch($avoiding_name_collisions) {
	case 0:
		//A tag that doesn't need to track state
		if (JisonParser_Html_Handler::isHtmlTag($yy_->yytext) == true) {
		  $yy_->yytext = $this->inlineTag($yy_->yytext);
		  return "HTML_TAG_INLINE";
		}

		//A non-valid html tag, return "<" put the rest back into the parser
		if (isset($yy_->yytext{0})) {
			$tag = $yy_->yytext;
			$yy_->yytext = $yy_->yytext{0};
			$this->unput(substr($tag, 1));
		}
		return 7;
		break;
	case 1:
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
		return 7;
		break;
	case 2:
		//A tag that is open and we just found the close for it
		$element = $this->unStackHtmlElement($yy_->yytext);
		if ($this->compareElementClosingToYytext($element, $yy_->yytext) && $this->htmlElementsStackCount == 0) {
			$yy_->yytext = $element;
			$this->popState();
			return "HTML_TAG_CLOSE";
		}
		return 7;
		break;
	case 3:
		//An tag open
		if (JisonParser_Html_Handler::isHtmlTag($yy_->yytext) == true) {
			if ($this->stackHtmlElement($yy_->yytext)) {
				if ($this->htmlElementsStackCount == 1) {
					$this->begin('htmlElement');
					return "HTML_TAG_OPEN";
				}
			}
			return 7;
		}

		//A non-valid html tag, return the first character in the stack and put the rest back into the parser
		if (isset($yy_->yytext{0})) {
			$tag = $yy_->yytext;
			$yy_->yytext = $yy_->yytext{0};
			$this->unput(substr($tag, 1));
		}
		return 'CONTENT';
		break;
	case 4:
		//A tag that was not opened, needs to be ignored
		return 7;
		break;
	case 5:
		return 7;
		break;
	case 6:
		return 7;
		break;
	case 7:
		if ($this->htmlElementsStackCount == 0 || $this->isStaticTag == true) {
			return 8;
		}
		return 'CONTENT';
		break;
	case 8:
		return 7;
		break;
	case 9:
		return 5;
		break;
}

	}
}
