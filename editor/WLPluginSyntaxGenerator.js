var WLPluginSyntaxGenerator = (function(document, window, $) {
    var head = $('head'),
        construct = function(name, body) {
            this.name = name;
            this.body = body;
            this.parameters = [];
        };

    construct.prototype =
    {
        addParameter: function(parameterName, parameterValue) {
            this.parameters.push(parameterName + '=`' + parameterValue + '`');
        },
        generate: function() {
            var name = this.name;

            //if we have a body, we want a plugin with one
            if (this.body) {
                /*
                * This is an example of a plugin with a body, which we are generating here
                *
                * {PLUGIN(parameter1=`parameter1 value` parameter2=`parameter2 value`)}
                * This is the plugin body
                * {PLUGIN}
                *
                */

                name = name.toUpperCase();
                return '{' + name + '(' + this.parameters.join(' ') + ')}'
                    + (this.body == 'true' ? '' : this.body)
                    + '{' + name + '}';

            }


            //if there is no body, just use an inline plugin
            else {
                /*
                 * This is an example of an inline plugin, which has no body, which we are generating here
                 *
                 * {plugin parameter1=`parameter1 value` parameter2=`parameter2 value`}
                 *
                 */

                name = name.toLowerCase();
                return '{' + name + ' ' + this.parameters.join(' ') + '}';
            }
        }
    };

    return construct;
})(document, window, jQuery);