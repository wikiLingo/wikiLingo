var wikiLingo = (function ($) {
	return {
		anchorsPluginElement: function(anchor) {
			return $(anchor.attributes['href'].value);
		},
		createPluginDialog: function(anchor) {
			var	$pluginElement = wikiLingo.anchorsPluginElement(anchor),
				plugin = new wikiLingo.plugin($pluginElement);

			plugin.dialog();
		},
		highlightPlugin: function (anchor, remove) {
			remove = remove || null;
			var	$pluginElement = this.anchorsPluginElement(anchor);

			if (remove) {
				$pluginElement.removeClass('wl-plugin-highlighted');
			} else {
				$pluginElement.addClass('wl-plugin-highlighted');
			}
		},
		urldecode: function (url) {
			return decodeURIComponent(url.replace(/\+/g, ' '));
		},
		urlencode: function (url) {
			return encodeURIComponent(url);
		}
	};
})(jQuery);