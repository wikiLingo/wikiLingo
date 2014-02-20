/* Jison generated parser */
var Definition = (function(){
var parser = {trace: function trace() { },
yy: {},
symbols_: {"error":2,"wiki":3,"content":4,"EOF":5,"CONTENT":6,"LINE_END":7,"element":8,"HTML_TAG_OPEN":9,"HTML_TAG_CLOSE":10,"HTML_TAG_INLINE":11,"BROKEN":12,"$accept":0,"$end":1},
terminals_: {2:"error",5:"EOF",6:"CONTENT",7:"LINE_END",9:"HTML_TAG_OPEN",10:"HTML_TAG_CLOSE",11:"HTML_TAG_INLINE",12:"BROKEN"},
productions_: [0,[3,1],[3,2],[3,1],[4,1],[4,2],[4,1],[4,2],[4,1],[4,2],[8,2],[8,1],[8,3],[8,1],[8,2],[8,1],[8,3]],
performAction: function anonymous(yytext,yyleng,yylineno,yy,yystate,$$,_$) {

var $0 = $$.length - 1;
switch (yystate) {
case 1:
        return $$[$0];
    
break;
case 2:
        return $$[$0-1];
    
break;
case 3:
        return "";
    
break;
case 4:
        /*php
            $$[$0]->setType('Content', $this);
        */
    
break;
case 5:
        /*php
            $$[$0]->setType('Content', $this);
            $$[$0-1]->addContent($$[$0]);
        */
    
break;
case 6:
        /*php
            $$[$0]->setType('Line', $this);
        */
    
break;
case 7:
        /*php
            $$[$0]->setType('Line', $this);
            $$[$0-1]->addContent($$[$0]);
        */
    
break;
case 9:
        /*php
            $$[$0-1]->addContent($$[$0]);
        */
    
break;
case 10:
        /*php
            $type =& $$[$0-1];
            $type->setType('Element', $this);
            $type->expression->setClosing($$[$0]);
        */
    
break;
case 11:
        /*php
            $$[$0]->setType('InlineElement', $this);
        */
    
break;
case 12:
        /*php
            $type =& $$[$0-2];
            $typeChild =& $$[$0-1];
            $typeChild->setParent($type);
            $type->setType('Element', $this);
            $type->expression->setClosing($$[$0]);
        */
    
break;
case 13:
        /*php
            $type =& $$[$0];
            $type->setType('BrokenElement', $this);
        */
    
break;
case 14:
        /*php
            $type =& $$[$0-1];
            $typeChild =& $$[$0];
            $type->addContent($typeChild);
            $type->setType('Element', $this);
        */
    
break;
case 15:
        /*php
            $type =& $$[$0];
            $type->setType('BrokenElement', $this);
        */
    
break;
case 16:
        /*php
            $type =& $$[$0-2];
            $typeChild =& $$[$0-1];
            $typeChild->setParent($type);
            $type->setType('BrokenElement', $this);
        */
    
break;
}
},
table: [{3:1,4:2,5:[1,3],6:[1,4],7:[1,5],8:6,9:[1,7],10:[1,9],11:[1,8]},{1:[3]},{1:[2,1],5:[1,10],6:[1,11],7:[1,12],8:13,9:[1,7],10:[1,9],11:[1,8]},{1:[2,3]},{1:[2,4],5:[2,4],6:[2,4],7:[2,4],9:[2,4],10:[2,4],11:[2,4],12:[2,4]},{1:[2,6],5:[2,6],6:[2,6],7:[2,6],9:[2,6],10:[2,6],11:[2,6],12:[2,6]},{1:[2,8],5:[2,8],6:[2,8],7:[2,8],9:[2,8],10:[2,8],11:[2,8],12:[2,8]},{1:[2,13],4:15,5:[2,13],6:[1,4],7:[1,5],8:6,9:[1,7],10:[1,14],11:[1,8],12:[2,13]},{1:[2,11],5:[2,11],6:[2,11],7:[2,11],9:[2,11],10:[2,11],11:[2,11],12:[2,11]},{1:[2,15],5:[2,15],6:[2,15],7:[2,15],9:[2,15],10:[2,15],11:[2,15]},{1:[2,2]},{1:[2,5],5:[2,5],6:[2,5],7:[2,5],9:[2,5],10:[2,5],11:[2,5],12:[2,5]},{1:[2,7],5:[2,7],6:[2,7],7:[2,7],9:[2,7],10:[2,7],11:[2,7],12:[2,7]},{1:[2,9],5:[2,9],6:[2,9],7:[2,9],9:[2,9],10:[2,9],11:[2,9],12:[2,9]},{1:[2,10],5:[2,10],6:[2,10],7:[2,10],9:[2,10],10:[2,10],11:[2,10],12:[2,10]},{1:[2,14],5:[2,14],6:[1,11],7:[1,12],8:13,9:[1,7],10:[1,16],11:[1,8],12:[1,17]},{1:[2,12],5:[2,12],6:[2,12],7:[2,12],9:[2,12],10:[2,12],11:[2,12],12:[2,12]},{1:[2,16],5:[2,16],6:[2,16],7:[2,16],9:[2,16],10:[2,16],11:[2,16],12:[2,16]}],
defaultActions: {3:[2,3],10:[2,2]},
parseError: function parseError(str, hash) {
    throw new Error(str);
},
parse: function parse(input) {
    var self = this, stack = [0], vstack = [null], lstack = [], table = this.table, yytext = "", yylineno = 0, yyleng = 0, recovering = 0, TERROR = 2, EOF = 1;
    this.lexer.setInput(input);
    this.lexer.yy = this.yy;
    this.yy.lexer = this.lexer;
    this.yy.parser = this;
    if (typeof this.lexer.yylloc == "undefined")
        this.lexer.yylloc = {};
    var yyloc = this.lexer.yylloc;
    lstack.push(yyloc);
    var ranges = this.lexer.options && this.lexer.options.ranges;
    if (typeof this.yy.parseError === "function")
        this.parseError = this.yy.parseError;
    function popStack(n) {
        stack.length = stack.length - 2 * n;
        vstack.length = vstack.length - n;
        lstack.length = lstack.length - n;
    }
    function lex() {
        var token;
        token = self.lexer.lex() || 1;
        if (typeof token !== "number") {
            token = self.symbols_[token] || token;
        }
        return token;
    }
    var symbol, preErrorSymbol, state, action, a, r, yyval = {}, p, len, newState, expected;
    while (true) {
        state = stack[stack.length - 1];
        if (this.defaultActions[state]) {
            action = this.defaultActions[state];
        } else {
            if (symbol === null || typeof symbol == "undefined") {
                symbol = lex();
            }
            action = table[state] && table[state][symbol];
        }
        if (typeof action === "undefined" || !action.length || !action[0]) {
            var errStr = "";
            if (!recovering) {
                expected = [];
                for (p in table[state])
                    if (this.terminals_[p] && p > 2) {
                        expected.push("'" + this.terminals_[p] + "'");
                    }
                if (this.lexer.showPosition) {
                    errStr = "Parse error on line " + (yylineno + 1) + ":\n" + this.lexer.showPosition() + "\nExpecting " + expected.join(", ") + ", got '" + (this.terminals_[symbol] || symbol) + "'";
                } else {
                    errStr = "Parse error on line " + (yylineno + 1) + ": Unexpected " + (symbol == 1?"end of input":"'" + (this.terminals_[symbol] || symbol) + "'");
                }
                this.parseError(errStr, {text: this.lexer.match, token: this.terminals_[symbol] || symbol, line: this.lexer.yylineno, loc: yyloc, expected: expected});
            }
        }
        if (action[0] instanceof Array && action.length > 1) {
            throw new Error("Parse Error: multiple actions possible at state: " + state + ", token: " + symbol);
        }
        switch (action[0]) {
        case 1:
            stack.push(symbol);
            vstack.push(this.lexer.yytext);
            lstack.push(this.lexer.yylloc);
            stack.push(action[1]);
            symbol = null;
            if (!preErrorSymbol) {
                yyleng = this.lexer.yyleng;
                yytext = this.lexer.yytext;
                yylineno = this.lexer.yylineno;
                yyloc = this.lexer.yylloc;
                if (recovering > 0)
                    recovering--;
            } else {
                symbol = preErrorSymbol;
                preErrorSymbol = null;
            }
            break;
        case 2:
            len = this.productions_[action[1]][1];
            yyval.$ = vstack[vstack.length - len];
            yyval._$ = {first_line: lstack[lstack.length - (len || 1)].first_line, last_line: lstack[lstack.length - 1].last_line, first_column: lstack[lstack.length - (len || 1)].first_column, last_column: lstack[lstack.length - 1].last_column};
            if (ranges) {
                yyval._$.range = [lstack[lstack.length - (len || 1)].range[0], lstack[lstack.length - 1].range[1]];
            }
            r = this.performAction.call(yyval, yytext, yyleng, yylineno, this.yy, action[1], vstack, lstack);
            if (typeof r !== "undefined") {
                return r;
            }
            if (len) {
                stack = stack.slice(0, -1 * len * 2);
                vstack = vstack.slice(0, -1 * len);
                lstack = lstack.slice(0, -1 * len);
            }
            stack.push(this.productions_[action[1]][0]);
            vstack.push(yyval.$);
            lstack.push(yyval._$);
            newState = table[stack[stack.length - 2]][stack[stack.length - 1]];
            stack.push(newState);
            break;
        case 3:
            return true;
        }
    }
    return true;
}
};
/* Jison generated lexer */
var lexer = (function(){
var lexer = ({EOF:1,
parseError:function parseError(str, hash) {
        if (this.yy.parser) {
            this.yy.parser.parseError(str, hash);
        } else {
            throw new Error(str);
        }
    },
setInput:function (input) {
        this._input = input;
        this._more = this._less = this.done = false;
        this.yylineno = this.yyleng = 0;
        this.yytext = this.matched = this.match = '';
        this.conditionStack = ['INITIAL'];
        this.yylloc = {first_line:1,first_column:0,last_line:1,last_column:0};
        if (this.options.ranges) this.yylloc.range = [0,0];
        this.offset = 0;
        return this;
    },
input:function () {
        var ch = this._input[0];
        this.yytext += ch;
        this.yyleng++;
        this.offset++;
        this.match += ch;
        this.matched += ch;
        var lines = ch.match(/(?:\r\n?|\n).*/g);
        if (lines) {
            this.yylineno++;
            this.yylloc.last_line++;
        } else {
            this.yylloc.last_column++;
        }
        if (this.options.ranges) this.yylloc.range[1]++;

        this._input = this._input.slice(1);
        return ch;
    },
unput:function (ch) {
        var len = ch.length;
        var lines = ch.split(/(?:\r\n?|\n)/g);

        this._input = ch + this._input;
        this.yytext = this.yytext.substr(0, this.yytext.length-len-1);
        //this.yyleng -= len;
        this.offset -= len;
        var oldLines = this.match.split(/(?:\r\n?|\n)/g);
        this.match = this.match.substr(0, this.match.length-1);
        this.matched = this.matched.substr(0, this.matched.length-1);

        if (lines.length-1) this.yylineno -= lines.length-1;
        var r = this.yylloc.range;
	var oldLinesLength = (oldLines[oldLines.length - lines.length] ? oldLines[oldLines.length - lines.length].length : 0);

        this.yylloc = {first_line: this.yylloc.first_line,
          last_line: this.yylineno+1,
          first_column: this.yylloc.first_column,
          last_column: lines ?
              (lines.length === oldLines.length ? this.yylloc.first_column : 0) + oldLinesLength - lines[0].length:
              this.yylloc.first_column - len
          };

        if (this.options.ranges) {
            this.yylloc.range = [r[0], r[0] + this.yyleng - len];
        }
        return this;
    },
more:function () {
        this._more = true;
        return this;
    },
less:function (n) {
        this.unput(this.match.slice(n));
    },
pastInput:function () {
        var past = this.matched.substr(0, this.matched.length - this.match.length);
        return (past.length > 20 ? '...':'') + past.substr(-20).replace(/\n/g, "");
    },
upcomingInput:function () {
        var next = this.match;
        if (next.length < 20) {
            next += this._input.substr(0, 20-next.length);
        }
        return (next.substr(0,20)+(next.length > 20 ? '...':'')).replace(/\n/g, "");
    },
showPosition:function () {
        var pre = this.pastInput();
        var c = new Array(pre.length + 1).join("-");
        return pre + this.upcomingInput() + "\n" + c+"^";
    },
next:function () {
        if (this.done) {
            return this.EOF;
        }
        if (!this._input) this.done = true;

        var token,
            match,
            tempMatch,
            index,
            col,
            lines;
        if (!this._more) {
            this.yytext = '';
            this.match = '';
        }
        var rules = this._currentRules();
        for (var i=0;i < rules.length; i++) {
            tempMatch = this._input.match(this.rules[rules[i]]);
            if (tempMatch && (!match || tempMatch[0].length > match[0].length)) {
                match = tempMatch;
                index = i;
                if (!this.options.flex) break;
            }
        }
        if (match) {
            lines = match[0].match(/(?:\r\n?|\n).*/g);
            if (lines) this.yylineno += lines.length;
            this.yylloc = {first_line: this.yylloc.last_line,
                           last_line: this.yylineno+1,
                           first_column: this.yylloc.last_column,
                           last_column: lines ? lines[lines.length-1].length-lines[lines.length-1].match(/\r?\n?/)[0].length : this.yylloc.last_column + match[0].length};
            this.yytext += match[0];
            this.match += match[0];
            this.matches = match;
            this.yyleng = this.yytext.length;
            if (this.options.ranges) {
                this.yylloc.range = [this.offset, this.offset += this.yyleng];
            }
            this._more = false;
            this._input = this._input.slice(match[0].length);
            this.matched += match[0];
            token = this.performAction.call(this, this.yy, this, rules[index],this.conditionStack[this.conditionStack.length-1]);
            if (this.done && this._input) this.done = false;
            if (token) return token;
            else return;
        }
        if (this._input === "") {
            return this.EOF;
        } else {
            return this.parseError('Lexical error on line '+(this.yylineno+1)+'. Unrecognized text.\n'+this.showPosition(),
                    {text: "", token: null, line: this.yylineno});
        }
    },
lex:function lex() {
        var r = this.next();
        if (typeof r !== 'undefined') {
            return r;
        } else {
            return this.lex();
        }
    },
begin:function begin(condition) {
        this.conditionStack.push(condition);
    },
popState:function popState() {
        return this.conditionStack.pop();
    },
_currentRules:function _currentRules() {
        return this.conditions[this.conditionStack[this.conditionStack.length-1]].rules;
    },
topState:function () {
        return this.conditionStack[this.conditionStack.length-2];
    },
pushState:function begin(condition) {
        this.begin(condition);
    }});
lexer.options = {};
lexer.performAction = function anonymous(yy,yy_,$avoiding_name_collisions,YY_START) {

var YYSTATE=YY_START
switch($avoiding_name_collisions) {
case 0:
    /*php
        //A tag that doesn't need to track state
        if (WikiLingo\Utilities\Html::isHtmlTag($yy_.yytext)) {
           return "HTML_TAG_INLINE";
        }

        //A non-valid html tag, return "<" put the rest back into the parser
        if (isset($yy_.yytext{0})) {
           $tag = $yy_.yytext;
           $yy_.yytext = $yy_.yytext{0};
           $this->unput(substr($tag, 1));
        }
        return 6;
    */

break;
case 1:
    /*php
        //A tag that was left open, and needs to close
        $this->popState();
    */

break;
case 2:
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

break;
case 3:
    /*php
        //A tag that is open and we just found the close for it
        $element = $this->unStackHtmlElement($this->yy->text);
        if (isset($element)) {
           $this->popState();
           return "HTML_TAG_CLOSE";
        }
        return "CONTENT";
    */

break;
case 4:
    /*php
        $isHtmlTag = WikiLingo\Utilities\Html::isHtmlTag($yy_.yytext, true);
        //An tag open
        if ($isHtmlTag === true) {
           $this->stackHtmlElement(clone($this->yy));
           $this->begin('htmlElement');
           return "HTML_TAG_OPEN";
        } else if ($isHtmlTag === false) {
            return "HTML_TAG_INLINE";
        }

        //A non-valid html tag, return the first character in the stack and put the rest back into the parser
        if (isset($yy_.yytext{0})) {
           $tag = $yy_.yytext;
           $yy_.yytext = $yy_.yytext{0};
           $this->unput(substr($tag, 1));
        }

        return 6;
    */

break;
case 5:
    /*php
        //A tag that was not opened, needs to be ignored
        return 6;
    */

break;
case 6:return 6;
break;
case 7:return 6;
break;
case 8:
    /*php
        if ($this->htmlElementsStackCount == 0 || $this->isStaticTag == true) {
           return 7;
        }
        return 'CONTENT';
    */

break;
case 9:return 6;
break;
case 10:return 5;
break;
}
};
lexer.rules = [/^(?:(<(.|\n)[^>]*?\/>))/,/^(?:(?=$))/,/^(?:(?=(<\/(.|\n)[^>]*?>)))/,/^(?:(<\/(.|\n)[^>]*?>))/,/^(?:(<(.|\n)[^>]*?>))/,/^(?:(<\/(.|\n)[^>]*?>))/,/^(?:([A-Za-z0-9 .,?;]+))/,/^(?:([ ])+)/,/^(?:((\n\r|\r\n|[\n\r])))/,/^(?:(.))/,/^(?:$)/];
lexer.conditions = {"htmlElement":{"rules":[0,1,2,4,5,6,7,8,9,10],"inclusive":true},"htmlElementClosing":{"rules":[0,3,4,5,6,7,8,9,10],"inclusive":true},"INITIAL":{"rules":[0,4,5,6,7,8,9,10],"inclusive":true}};
return lexer;})()
parser.lexer = lexer;
function Parser () { this.yy = {}; }Parser.prototype = parser;parser.Parser = Parser;
return new Parser;
})();
if (typeof require !== 'undefined' && typeof exports !== 'undefined') {
exports.parser = Definition;
exports.Parser = Definition.Parser;
exports.parse = function () { return Definition.parse.apply(Definition, arguments); }
exports.main = function commonjsMain(args) {
    if (!args[1])
        throw new Error('Usage: '+args[0]+' FILE');
    var source, cwd;
    if (typeof process !== 'undefined') {
        source = require('fs').readFileSync(require('path').resolve(args[1]), "utf8");
    } else {
        source = require("file").path(require("file").cwd()).join(args[1]).read({charset: "utf-8"});
    }
    return exports.parser.parse(source);
}
if (typeof module !== 'undefined' && require.main === module) {
  exports.main(typeof process !== 'undefined' ? process.argv.slice(1) : require("system").args);
}
}