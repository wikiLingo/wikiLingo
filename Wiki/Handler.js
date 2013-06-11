var WikiHandler = {
	parseDepth: 0,
	pluginIndexes: [],
	pluginStackCount: 0,
	lineNo: 0,
	skipBr: false,
	isFirstBr: false,
	tableStack: [],
	npStack: false,
	ppStack: false,
	lineStack: false,
	nonBreakingTagDepth: 0,
	blockLoc: {},
	blockLast: '',
	pluginEntries: {},
	plugin: function(plugin) {
		this.pluginEntries[plugin.key] = plugin;
		return plugin.key;
	},
	restorePluginEntities: function (output) {
		var iterations = 0,
			limit = 100;

		while (this.pluginEntries.length && iterations <= limit) {
			iterations++;
			for (key in this.pluginEntries) {
				var entity = this.pluginEntries[key];
				if (output.match(key)) {
					output.replace(key, entity);
				}
			}
		}

		return output;
	},
	blocks: {
		"header": ['!'],

		"stackList": ['*','#','+',';'],

		"r2l": ['{r2l}'],
		"l2r": ['{l2r}']
	},
	block: function (content)
	{
		this.lineNo++;
		this.skipBr = false;

		var content = $.trim(content, "\n\r");

		for( fn in this.blocks) {
			var block = this.blocks[fn];
			for(startsWith in block) {
				if (this.beginsWith(content, block[startsWith])) {
					return this[fn](content);
				}
			}
		}

		return content;
	},
	newLine: function() {
		return '<br />';
	},
    np: function(content) {
        return content;
    },
	bold: function (content) {
		return "<strong>" + content + "</strong>";
	},
	box: function (content) {
		return "<div style='border: solid 1px black;'>" + content + "</div>";
	},
	center: function (content) {
		return "<center>" + content + "</center>";
	},
	color: function (content) {
		var text = content.split(':');
		var color = text[0];
		var html = text[1];
		return "<span style='color: " + color + ";'>" + html + "</span>";
	},
	italics: function (content) {
		return "<i>" + content + "</i>";
	},
	header: function (content) {
		var hNum = 0;

		while (content[0] == '!') {
			content = content.substring(1);
			hNum++;
		}

		hNum = Math.min(7, hNum);

		return "<h" + hNum + ">" + content + "</h" + hNum + ">";
	},
	htmlTag: function(content) {
		var parts = content.split(/[ >]/),
		name = $.trim(parts[0]).toLocaleLowerCase();

		switch (name) {
			//start block level
			case 'h1':
			case 'h2':
			case 'h3':
			case 'h4':
			case 'h5':
			case 'h6':
			case 'pre':
			case 'ul':
			case 'dl':
			case 'div':
			case 'table':
			case 'p':
				this.skipBr = true;
			case 'script':
				this.nonBreakingTagDepth++;
				this.lineNp++;
				break;

			//end block level
			case '/h1':
			case '/h2':
			case '/h3':
			case '/h4':
			case '/h5':
			case '/h6':
			case '/pre':
			case '/ul':
			case '/dl':
			case '/div':
			case '/table':
			case '/p':
				this.skipBr = true;
			case '/script':
				this.nonBreakingTagDepth--;
				this.nonBreakingTagDepth = max(this.nonBreakingTagDepth, 0);
				this.lineNo++;
				break;

			//skip next block level
			case 'hr':
			case 'br':
				this.skipBr = true;
				break;
		}

		return content;
	},
	unlink: function (content) {
		if (this.beginsWith(content, "@np")) {
			content = content.substring(0, content.length - 3);
		}

		if (content[content.length - 1] != "]" && this.beginsWith(content, "[[")) {
			content = content.substring(1);
		} else if (!this.endsWith(content, "]]")) {
			content = content.substring(1);
		}

		return content;
	},
    stackList: function(content) {
	    this.skipBr = true;
        return content + '<br/>\n';
    },
	hr: function () {
		return "<hr />";
	},
	link: function (type, content) {
		var link = this.split(':', content);
		var href = content;
		
		if (this.match(/\|/, content)) {
			href = link[0];
			content = link[1];
		}
		return "<a href='" + href + "'>" + content + "</a>";
	},
	line: function(ch) {
		this.lineNo++;
		var skipBr = this.skipBr;
		this.skipBr = false; //skipBr must always must be false when done processing line

		//The first \n was inserted just before parse
		if (this.isFirstBr == false) {
			this.isFirstBr = true;
			return '';
		}

		ch = (ch ? ch : '');

		var result = ch;

		if (skipBr == false && !this.tableStack.length && this.nonBreakingTagDepth == 0) {
			result = "<br />" + ch;
		}

		return result;
	},
	smile: function (smile) { //this needs more tlc too
		return "<img src='img/smiles/icon_" + smile + ".gif' alt='" + smile + "' />";
	},
	strike: function (content) {
		return "<span style='text-decoration: line-through;'>" + content + "</span>";
	},
	tableParser: function (content) {
		var tableContents = '';
		var rows = this.split('\n', content);
		for(var i = 0; i < this.size(rows); i++) {
			row = '';
			
			cells = this.split('|',  rows[i]);
			for(var j = 0; j < this.size(cells); j++) {
				row += this.table_td(cells[j]);
			}
			tableContents += this.table_tr(row);
		}
		return '<table class="wikitable">' + tableContents + '</table>';
	},
	table_tr: function (content) {
		return "<tr>" + content + "</tr>";
	},
	table_td: function (content) {
		return "<td>" + content + "</td>";
	},
	titlebar: function (content) {
		return "<div class='titlebar'>" + content + "</div>";
	},
	underscore: function (content) {
		return "<u>" + content + "</u>";
	},
	wikilink: function (content) {
		var wikilink = this.split('|', content);
		var href = content;
		
		if (this.match('/\|/', content)) {
			href = wikilink[0];
			content = wikilink[1];
		}
		return "<a href='" + href + "'>" + content + "</a>";
	},
	html: function (content) { //this needs some ajax tlc
		return content;
	},
	isContent: function(skipTypes)
	{
		//These types will be found in $this.  If any of these states are active, we should NOT parse wiki syntax
		var types = {
			'npStack' : true,
			'ppStack' : true,
			'linkStack' : true
		};

		if (skipTypes) {
			for(skipType in skipTypes) {
				if (types[skipTypes[skipType]]) {
					types[skipTypes[skipType]] = null;
				}
			}
		}

		//first off, if in plugin
		if (this.pluginStackCount > 0) {
			return true;
		}

		//second, if we are not in a plugin, check if we are in content, ie, non-parse-able wiki syntax
		for(type in types) {
			var value = types[type];
			if (this[type] == value)	{
				return true;
			}
		}

		//lastly, if we are not in content, return null, which allows cases to continue lexing
		return null;
	},
	substring: function(val, left, right) {
		return val.substring(left, val.length + right);
	},
	match: function(pattern, subject) {
		return subject.match(pattern);
	},
	replace: function(search, replace, subject) {
		return subject.replace(search, replace);
	},
	split: function (delimiter, string) {
		return string.split(delimiter);
	},
	join: function () {
		var result = '';
		for(var i = 0; i < arguments.length; i++) {
			if (arguments[i]) result += arguments[i];
		}
		return result;
	},
	size: function(array) {
		if (!array) array = [];
		return array.length;
	},
	pop: function(array) {
		if (!array) array = [];
		array.pop();
		return array;
	},
	push: function (array, val) {
		if (!array) array = [];
		array.push(val);
		return array;
	},
	shift: function(array) {
		if (!array) array = [];
		array.shift();
		return array;
	},
	stackPlugin: function (yytext, pluginStack) {
		var pluginName = this.match(/^\{([A-Z]+)/, yytext);
		var pluginArgs =  this.match(/[(].*?[)]/, yytext);
		
		return this.push(pluginStack, {
			name: pluginName[1],
			args: pluginArgs,
			body: '',
			key: this.pluginKey(pluginName[1]),
			syntax: yytext,
			closing: '{' + pluginName[1] + '}'
		});
	},
	inlinePlugin: function (yytext) {
		var pluginName = this.match(/^\{([a-z]+)/, yytext);
		var pluginArgs = this.match(/[ ].*?[}]|[/}]/, yytext);
		
		return {
			name: pluginName[1],
			args: pluginArgs,
			body: '',
			key: this.pluginKey(pluginName[1]),
			syntax: yytext,
			closing: ''
		};
	},
	pluginKey: function(name) {
		return '$plugin:' + name + '_' + this.incrementPluginIndex(name) + '$';
	},
	incrementPluginIndex: function (name){
		name = name.toLowerCase();

		if (!this.pluginIndexes[name]) this.pluginIndexes[name] = 0;

		this.pluginIndexes[name]++;

		return this.pluginIndexes[name];
	},
	beginsWith: function (haystack, needle) {
		var result;
		result = haystack.substring(0,needle.length);
		return (result == needle ? true : false);
	},
	endsWith: function (haystack, needle) {
		var result;
		result = haystack.substring(haystack.length - needle.length, haystack.length);
		return (result == needle ? true : false);
	},
	isPlugin: function() {
		if (!this.yy.pluginStack) this.yy.pluginStack = [];
		return (this.yy.pluginStack.length > 0);
	},
	preParse: function (val) {
		if (this.parseDepth == 0) {
			this.pluginEntries = [];
			this.pluginIndexes = [];
		}

		this.line = 0;
		this.isFirstBr = false;
		this.skipBr = false;
		this.tableStack = [];
		this.nonBreakingTagDepth = 0;
		this.npStack = false;
		this.ppStack = false;
		this.linkStack = false;

		return '\n'  + val + '\n'; //here we will strip things like np and plugins, and parse them at the end and process
	},
	postParse: function (val) {
		val = this.restorePluginEntities(val);
		return val; //here we will restore things like np, and plugins and parse them if needed
	},
	Parse: function(val, errors) {
		try {
			if (this.inUse) {
				var wiki = new Wiki.Parser();
				wiki.extend.parser(WikiHandler);
				wiki.inUser = false;
				var result = wiki.parse(val);
				wiki = null;
			}

			this.inUse = true;
			val = this.preParse(val);
			this.parseDepth++;
			val = this.parse(val);
			this.parseDepth--;
			val = this.postParse(val);
			this.inUse = false;
			return val;
		} catch (e) {
			if (errors) {
				console.log(e);
			}
		}
	},
	parseError: function() {
		return "";
	}
};

Wiki.extend.parser(WikiHandler);