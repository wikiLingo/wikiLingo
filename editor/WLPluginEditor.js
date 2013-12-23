var WLPluginEditor = (function(document, window, $, WLPluginSyntaxGenerator) {
	var head = $('head'),
        construct = function(expressionType, body) {
			this.expressionType = expressionType;
			this.parameters = expressionType.parameters;
			this.inputs = {};
            this.body = body;
		},
		assistants = [];

	construct.prototype = {
		inputTypes: {
			string: function(parameter) {
				var input = document.createElement('input');
				input.setAttribute('type', 'input');
				input.value = parameter.value;
				input.style.width = 'inherit';
				return input;
			},
			number: function(parameter) {
				return this.string(parameter);
			},
			boolean: function(parameter) {
				var select = document.createElement('select'),
					optionTrue = document.createElement('option'),
					optionFalse = document.createElement('option');


				optionTrue.innerHTML = 'Yes';
				optionTrue.setAttribute('value', 'true');

				optionFalse.innerHTML = 'No';
				optionFalse.setAttribute('value', 'false');

				select.appendChild(optionTrue);
				select.appendChild(optionFalse);

                select.value = parameter.value.toString();

				return select;

			}
		},
        getBodyMarkup: function(fn) {
            if (this.body) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: 'reflect.php',
                    data: {
                        wikiLingo: true,
                        w: this.body
                    },
                    success: function(result) {
                        fn(result.output);
                    },
                    error: function(result) {
                        console.log(result);
                    }
                });
            } else {
                fn();
            }
        },
		update: function(insert, body) {
            body = body || null;

			var gen = new WLPluginSyntaxGenerator(this.expressionType.name, body),
				i;

			for (i in this.inputs) {
                gen.addParameter(i, this.inputs[i].value);
			}

			$.ajax({
				dataType: 'json',
				url: 'reflect.php',
				data: {
					wysiwyg: true,
					w: gen.generate()
				},
				success: function(result) {
					/*var justInsertedAsString = '<span id="justInserted"></span>',
						justInserted;
					document.execCommand('insertHTML', false, justInsertedAsString);
					justInserted = document.getElementById('justInserted');

					document.insertAfter(justInserted, result.output);

					justInserted.parentNode.removeChild(justInserted);*/
                    insert(result.output);

					if (result.script) {
						head.append(result.script);
					}
					if (result.css) {
						head.append(result.css);
					}
				}
			});
		},
		ui: function(parametersOverride, insert) {
			var me = this,
				dialogTable = document.createElement('table'),
				tr,
				td,
				input,
				parameters = (parametersOverride || this.parameters),
				parameter,
				i,
				dialog;

			for (i in parameters) {
				parameter = parameters[i];

				//create row
				tr = document.createElement('tr');
				dialogTable.appendChild(tr);

				//create column for label
				td = document.createElement('td');
				td.innerHTML = parameter.label;
				tr.appendChild(td);

				//create column for input
				td = document.createElement('td');
				tr.appendChild(td);

				//create input
				input = this.inputTypes[parameter.type](parameter);
				this.inputs[i] = input;
				td.appendChild(input);
			}

			dialog = $(dialogTable)
				.dialog({
					title: this.expressionType.label + ' Parameters',
					modal: true,
                    draggable: false,
					buttons: {
						'CANCEL': function() {
							dialog.dialog('close');
						},
						'OK': function() {
                            me.getBodyMarkup(function(body) {
                                me.update(insert, body);
                            });
							dialog.dialog('close');
						}
					}
				});
		}
	};

	return construct;
})(document, window, jQuery, WLPluginSyntaxGenerator);