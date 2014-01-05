<?php

//setup auto load
require_once("autoload.php");



//create scripts collector utility
$scripts = (new WikiLingo\Utilities\Scripts())

    //add some css
    ->addCssLocation("//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css")
	->addCssLocation("editor/Medium.js/medium.css")
	->addCssLocation("editor/bubble.css")
    ->addCssLocation("editor/IcoMoon/sprites/sprites.css")

    //add some javascript
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js")
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js")
    ->addScriptLocation("editor/rangy/uncompressed/rangy-core.js")
    ->addScriptLocation("editor/rangy/uncompressed/rangy-cssclassapplier.js")
    ->addScriptLocation("editor/Medium.js/medium.js")
    ->addScriptLocation("editor/WLPluginSyntaxGenerator.js")
	->addScriptLocation("editor/WLPluginEditor.js")
	->addScriptLocation("editor/WLPluginAssistant.js")
	->addScriptLocation("editor/bubble.js")
	->addScriptLocation("editor/editor.js");




//create a wikiLingo to WYSIWYG parser, and send scripts collector to it
$parser = new WikiLingoWYSIWYG\Parser($scripts);



//bind to event "WikiLingo\Event\Expression\Plugin\PostRender" and add a script that manages how plugins behave
$parser->events->bind(new WikiLingo\Event\Expression\Plugin\PostRender(function(&$rendered, WikiLingo\Expression\Plugin &$plugin) use ($parser) {
    $id = $plugin->id();
    $parser->scripts->addScript(<<<JS
    (new WLPlugin(document.getElementById('$id')));
JS
    );
}));



//open a file and parse it
$source = file_get_contents('editor/page.wl');
$page = $parser->parse($source);



//create a new group of possible syntaxes possible in the WikiLingo to WYSIWYG parser
$expressionSyntaxes = new WikiLingoWYSIWYG\ExpressionSyntaxes($scripts);



//bind to event "WikiLingoWYSIWYG\Event\ExpressionSyntax\Registered",giving certain syntax extra attributes
$expressionSyntaxes->parser->events->bind(new WikiLingoWYSIWYG\Event\ExpressionSyntax\Registered(function(\WikiLingoWYSIWYG\ExpressionType &$expressionType) {
	switch ($expressionType->name) {
		case 'Plugin':
			$expressionType->extraAttributes['onmouseover'] = '';
			break;
		case 'Table':
			$expressionType->extraAttributes['data-bubble-event'] = 'table';
			break;
		case 'Color':
			$expressionType->extraAttributes['ondblclick'] = 'color(this);return false;';
			break;
	}
}));



//register expression types so that they can be turned into json and sent to browser
$expressionSyntaxes->registerExpressionTypes();



//json encode the parsed expression syntaxes
$expressionSyntaxesJson = json_encode($expressionSyntaxes->parsedExpressionSyntaxes);
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>wikiLingo editor (contenteditable only and a tiny bit of js and css)</title>
    <?php
        //render css from scripts collector and bring it to the page
        echo $scripts->renderCss();
    ?>
    <style>
        font-family: 'Lora',serif;
    </style>
</head>
<body>
<div id="header" style="text-align: center;">
    <h1>wikiLingo</h1><a href="editor/page.wl" style="position: fixed; top: 0px; right: 0px;">view source</a>
</div><?php //create an editable area and echo page to it ?>
<table style="width: 100%">
	<tr>
		<td style="width: 50%; vertical-align: top;"><div id="editable" contenteditable="true" style="width: 70%; margin-left: auto; margin-right: auto; border: none;"><?php echo $page;?></div></td>
		<td style="width: 50%; vertical-align: top;">
			<button id="updateSource" onclick="updateSource(); return false;">Update Source</button><br />
			<textarea id="editableSource" style="width: 100%; height: 1000px;"><?php echo $source; ?></textarea>
		</td>
	</tr>
</table>
</body>
<script>
    <?php //Create the WikiLingo object used above in the event "WikiLingo\Event\Expression\Plugin\PostRender"?>
    var
	    WLPlugin = function(el) {
	        if (el.getAttribute('data-draggable') == 'true') {
		        new WLPluginAssistant(el, this);
	        }
	    },
	    updateSource = function() {
		    var source = document.getElementById('editable').innerHTML;
		    $.ajax({
			    type: 'POST',
			    dataType: 'json',
			    url: 'reflect.php',
			    data: {wikiLingo:true, w: source},
			    success: function(result) {
				    document.getElementById('editableSource').value = result.output;
			    }
		    });
	    };

	window.expressionSyntaxes = <?php echo $expressionSyntaxesJson; ?>;
</script>
<?php
    //echo script from the scripts collector to page
    echo $scripts->renderScript();
?>
</html>