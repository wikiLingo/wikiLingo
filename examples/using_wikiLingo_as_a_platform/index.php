<?php
	require_once "../../autoload.php";

	use Types\Type;
	use WikiLingo\Event;
	use WikiLingo\Expression;

	//Use wikiLingo Scripts utility to add scripts this page
	$scripts = (new WikiLingo\Utilities\Scripts())
		->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
		//->addScriptLocation("ckeditor/ckeditor.js")
		->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
		->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
		->addScriptLocation('scripts/wikiLingo.js')
		->addScriptLocation('scripts/wikiLingo.plugin.js')
		->addCssLocation('styles/wikiLingo.css');

	//create the wikiLingo and wikiLingoWYSIWYG parsers, and give them the optional scripts manager
	$wikiLingo = new WikiLingo\Parser($scripts);
	$wikiLingoWYSIWYG = new WikiLingoWYSIWYG\Parser($scripts);


	//bind to a few of the wikiLingoWYSIWYG events, making interaction with the end user easier
	Type::Events($wikiLingoWYSIWYG->events)


		//if a tag isn't allowed, like <script>, give some visual feedback
		->bind(new Event\Expression\Tag\Render(function(&$element, &$expression) {
			if (!$expression->allowed) {
				Type::Element($element)->attributes['style'] = 'background-color: red;';
			}
		}))


		//create an easy interface for certain plugins
		->bind(new Event\Expression\Plugin\PostRender(function(&$rendered, Expression\Plugin &$plugin) use (&$wikiLingoWYSIWYG) {
			if ($plugin->type != 'tab'
				&& $plugin->type != 'accordion'
				&& $plugin->type != 'illegal'
			) {
				$button = Type::Helper($wikiLingoWYSIWYG->helper('a'));
				$button->classes[] = 'wl-plugin-button';
				$button->staticChildren[] = "<div></div>";

				$button
					->setAttribute('href', '#' . $plugin->id())
					->setAttribute('onclick', "new wikiLingo.createPluginDialog(this);return false;")
					->setAttribute('onmouseover', "wikiLingo.highlightPlugin(this);return false;")
					->setAttribute('onmouseout', "wikiLingo.highlightPlugin(this, true);return false;")
					->setAttribute('contenteditable', "false");

				$rendered = $button->render() . $rendered;
			}
		}));

	$page = file_get_contents("page.wl");
	$out = $wikiLingo->parse($page);
	$outEditable = $wikiLingoWYSIWYG->parse($page);

	//render script and css
	$css = $scripts->renderCss();
	$script = $scripts->renderScript();

?><!DOCTYPE html>
<html>
<head>
	<title>Using wikiLingo as a platform</title>
	<?php echo $css . $script; ?>
	<style>
		.top-menu
		{
			position: absolute;
			width: inherit;
		}

		.hidden
		{
			position: absolute;
			left: -7000px;
			top: -7000px;
		}
	</style>
	<script>
		$(function() {
			var $pluginButton = $('a.wl-plugin-button').hide(),
                $edit = $('#edit').click(function() {
                    $pluginButton.toggle();
                    $edit.toggle();
                    $save.toggle();
                    $editable.attr('contenteditable', 'true');
                }),
                $save = $('#save').click(function() {
                    $pluginButton.toggle();
                    $edit.toggle();
                    $save.toggle();
                    $editable.removeAttr('contenteditable');
                }).hide(),
                $editable = $('#editable');
		});
	</script>
</head>
<body>
<button id="save">save</button>
<button id="edit">edit</button>
<div id="editable"><?php echo $outEditable?></div>
</body>
</html>