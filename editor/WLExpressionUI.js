var WLExpressionUI = (function(document, $, rangy) {
	var
		base = (function(after) {
			var Construct = function(element, attributes, expression) {
				this._element = element;
				this._attributes = attributes;
				this.expression = expression;
			};
			Construct.prototype = {
				element: function() {
					return this._element;
				},
				attributes: function() {
					this._attributes['class'] = (this._attributes['class'] ? this._attributes['class'] + ' ': '') + 'wl-applied-expression';

					return this._attributes;
				},
				prompt: function(title, variable, callback) {
					return prompt(title, variable);
				},
				after: function() {
					if (after) {
						var elements = $('.wl-applied-expression').removeClass('wl-applied-expression');

						if (elements.length > 0) {
							after.call(this, elements);
						}
					}
				}
			};
			return Construct;
		});

		return {
			Code: base(function(el) {
				var value = this.prompt(this.expression.attribute.label);
				if (value){
					el.attr('data-mode', value);
				}
			}),


			Color: base(function(el) {
				var value = this.prompt(this.expression.attribute.label);
				if (value) {
					el.css('color', value);
				}
			}),


			Link: base(function(el) {
				var value = this.prompt(this.expression.attribute.label);
				if (value) {
					el
						.attr('href', value)
						.attr('data-href', value);
				}
			}),


			WikiLinkType: base(function(el) {
				var value = this.prompt(this.expression.attribute.label);
				if (value) {
					el
						.attr('href', '#')
						.attr('data-wiki-link-type', value);
				}
			}),


			PastLink: base(function(el) {
				var value = this.prompt(this.expression.attribute.label);
				if (value) {
					el.attr('data-past', value);
				}
			}),


			Plugin: (function() {
				var head = $('head'),
					Construct = function(name, expressionType, body) {
						this.name = name;
						this.body = body;
						this.expressionType = expressionType;
						this.parameters = [];

						var parameters = expressionType.parameters,
							k = (parameters ? parameters.length : 0);

						while (k-- > 0) {
							this.addParameter(parameters[k].name, parameters[k].value);
						}
					};

				Construct.prototype =
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
					},
					render: function (callback) {
						$.getJSON('reflect.php', {
							reflect: 'wikiLingoWYSIWYG',
							w: this.generate()
						}, function(r) {
							callback(r.output);

							if (r.css) {
								head.append(r.css);
							}

							if (r.script) {
								head.append(r.script);
							}
						});
					}
				};

				return Construct;
			})()
		};
})(document, jQuery, rangy);
