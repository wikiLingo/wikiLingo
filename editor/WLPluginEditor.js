var WLPluginEditor = (function(document, window, $) {
	var construct = function(expressionType) {
			this.expressionType = expressionType;
			this.parameters = expressionType.parameters;
			this.inputs = {};
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
				var select = document.createElement('switch'),
					optionTrue = document.createElement('option'),
					optionFalse = document.createElement('option');


				optionTrue.innerText = 'Yes';
				optionTrue.setAttribute('value', 'true');

				optionFalse.innerText = 'No';
				optionTrue.setAttribute('value', 'false');

				select.appendChild(optionTrue);
				select.appendChild(optionFalse);

				return select;

			}
		},
		update: function() {
			var pluginAsString = '{' + this.expressionType.name.toLowerCase() + ' ',
				parametersAsStrings = [],
				i,
				input;

			for (i in this.inputs) {
				input = this.inputs[i];
				parametersAsStrings.push(i + '=`' + input.value + '`');
			}

			pluginAsString += parametersAsStrings.join(' ') + '}';

			$.ajax({
				dataType: 'json',
				url: 'reflect.php',
				data: {
					wysiwyg: true,
					w: pluginAsString
				},
				success: function(result) {
					var justInsertedAsString = '<span id="justInserted"></span>',
						justInserted;
					document.execCommand('insertHTML', false, justInsertedAsString);
					justInserted = document.getElementById('justInserted');

					document.insertAfter(justInserted, result.output);

					justInserted.parentNode.removeChild(justInserted);

					if (result.script) {
						head.append(result.script);
					}
					if (result.css) {
						head.append(result.css);
					}
				}
			});
		},
		ui: function(parametersOverride) {
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
					width: window.innerWidth * 0.5,
					buttons: {
						'CANCEL': function() {
							dialog.dialog('close');
						},
						'OK': function() {
							me.update();
							dialog.dialog('close');
						}
					}
				});
		}
	};

	return construct;
})(document, window, jQuery);