<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class expandingoutline
 * @package WikiLingo\Plugin
 */
class expandingoutline extends Base
{
    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
	{
		global $headerlib;

		$tempParser = new JisonParser_Wiki_Handler();
		$tempParser->list = new WikiPlugin_expandingoutline_list($parser->list, $tempParser);
		$id = $plugin->id();

		$headerlib->add_jq_onready(
<<<JQ
		(function() {
			var base = $('#$id')
				.click(function(e) {
					if (e.shiftKey) {
						var lists = base.find('.tikiListTableChild');
						var imgs = base.find('.listImg');

						if (lists.first().is(':visible')) {
							lists.hide();
							switchImg(imgs);
						} else {
							lists.show();
							switchImg(imgs);
						}
					}
				});

			var labels = base.find('td.tikiListTableLabel');

			function switchImg(img) {
				var newImg = img.first().data('altimg');
				var oldImg = img.first().attr('src');

				img
					.attr('src', newImg)
					.data('altimg', oldImg);
			}

			labels
				.toggle(function(e) {
				    if (e.shiftKey) {
						labels.show();
						return;
				    }

					var child = base.find('.parentTrail' + $(this).data('trail'));

					if (child.stop().fadeIn().length) {
						switchImg($(this).find('img.listImg'));
					}
				}, function(e) {
					if (e.shiftKey) {
						labels.hide();
						return;
				    }

					var child = base.find('.parentTrail' + $(this).data('trail'));

					if (child.stop().fadeOut().length) {
						switchImg($(this).find('img.listImg'));
					}
				});
		})();
JQ
);


		$headerlib->add_css(
			".wikiplugin_expandingoutline table {
				width: 100%;
				border-collapse:collapse;
				border-width: 0px;
			}
			.wikiplugin_expandingoutline * {
				border-width: 0px;
				padding: 0px;
			}
			.wikiplugin_expandingoutline .tikiListTable td, #$id .tikiListTable {
				font-size: 14px;
				background-color: white;
				list-style-type: none;
			}
			.wikiplugin_expandingoutline .tikiListTableLabel
			{
				width: 1px;
				white-space: nowrap;
				cursor: pointer;
			}

			.wikiplugin_expandingoutline .tikiListTableChild {
				display: none;
			}

			.wikiplugin_expandingoutline .tier0 {
				background-color: rgb(255,37,6) ! important;
			}
			.wikiplugin_expandingoutline .tier1 {
				background-color: rgb(254,143,17) ! important;
			}
			.wikiplugin_expandingoutline .tier2 {
				background-color: rgb(249,245,41) ! important;
			}
			.wikiplugin_expandingoutline .tier3 {
				background-color: rgb(111,244,81) ! important;
			}
			.wikiplugin_expandingoutline .tier4 {
				background-color: rgb(83,252,243) ! important;
			}
			.wikiplugin_expandingoutline .tier5 {
				background-color: rgb(138,158,251) ! important;
			}
			.wikiplugin_expandingoutline .tier6 {
				background-color: rgb(206,127,250) ! important;
			}
			.wikiplugin_expandingoutline .tier7 {
				background-color: rgb(250,167,251) ! important;
			}
			.wikiplugin_expandingoutline .tier8 {
				background-color: rgb(255,214,188) ! important;
			}
			.wikiplugin_expandingoutline .tier9 {
				background-color: rgb(255,214,51) ! important;
			}"
		);

		$result = $tempParser->parse($data);
		unset($tempParser);

		return $result;
	}
}
