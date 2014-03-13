var WLPastLinkSyntaxGenerator = (function() {
    var Construct = function(element, attributes) {
        this._element = element;
        this._attributes = attributes;
    };
    Construct.prototype = {
        element: function() {
            return this._element;
        },
        attributes: function() {
            var past = this.prompt("Please enter you clipboard data");
            if(past){
                this._attributes['data-past'] = past;
            }
            return this._attributes;
        },
        prompt: function(title, variable, callback) {
            return prompt(title, variable);
        }
    };
    return Construct;
})();