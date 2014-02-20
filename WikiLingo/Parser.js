WikiLingo.Parser = (function(Parsed){
    var Construct = function(fn) {
        var pluginStack = this.pluginStack = [],
            linkStack = this.linkStack = false,
            parser = this.parser = new this.Parent(),
            yy = parser.yy,
            me = this;

        yy.pluginStack = [];

        yy.stackPlugin = function(plugin) {
            pluginStack.push(plugin.substring(1, plugin.length - 1));
        };

        yy.stackedPluginName = function() {
            return pluginStack[pluginStack.length - 1];
        };

        yy.pluginMatch = function(yytext) {
            return yytext.substring(1, yytext.length - 1) === yy.stackedPluginName();
        };

        yy.pluginStackPop = function() {
            return pluginStack.pop();
        };

        yy.isContent = function() {
            return linkStack;
        };

        yy.setType = function(type, yytext, stateEnd) {
            return new Parsed(type, yytext, stateEnd);
        };

        yy.tableStack = [];
    };

    Construct.prototype = {
        Parent: this,
        parse: function(input) {
            return this.parser.parse(input);
        }
    };

    return Construct;
}).call(WikiLingo.Definition, WikiLingo.Parsed);