wikiLingo.plugin = (function(wikiLingo, $, doc) {
	var constructor = function($pluginElement) {
		this.type = $pluginElement.attr('data-plugintype');
		this.parametersRaw = $pluginElement.attr('data-pluginparameters');
		this.parameters = $.parseJSON(
			wikiLingo.urldecode(
				this.parametersRaw
			)
		);
		this.style = $pluginElement[0].style;
	};

	constructor.prototype = {

		update: function() {
			$(this)
				.attr('data-plugintype', this.type)
				.attr('data-pluginparameters', wikiLingo.urlencode(JSON.stringify(this.parameters)));
		},

		dialog: function() {
			var me = this,
				$dialog = $('<div />').append(this.parameterUI()),
				buttons = [

					//ok button
					{
						text: this.l.ok,
						click: function() {
							me.update();
							$dialog.dialog( "close" );
						}
					},

					//cancel button
					{
						text: this.l.cancel,
						click: function() {
							$dialog.dialog( "close" );
						}
					}
				];

			//dialog
			$dialog.dialog({
				title: this.l.editPlugin,
				modal: true,
				buttons: buttons
			});
		},

		parameterUI: function() {
			var $table = $('<table />'),
				$tbody = $('<tbody />').appendTo($table);

			$('<tr><td>Type</td><td><input class="type" value="' + this.type + '"</td></tr>').appendTo($tbody);

			for (var label in this.parameters) {
				var $tr = $('<tr/>').appendTo($tbody),

					$attributeLabelTd = $('<td />').appendTo($tr),
					$attributeValueTd = $('<td />').appendTo($tr),

					$attributeLabelInput = $('<input class="label"/>')
						.val(label)
						.appendTo($attributeLabelTd),
					$attributeValueInput = $('<input class="value"/>')
						.val(this.parameters[label])
						.appendTo($attributeValueTd);
			}

			return $table;
		},
		types: [],
		l: {
			editPlugin: 'Edit Plugin',
			ok: 'OK',
			cancel: 'Cancel'
		}
	};
	return constructor;
})(wikiLingo, jQuery, document);