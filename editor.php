<?php

//setup auto load
require_once("autoload.php");



//create scripts collector utility
$scripts = (new WikiLingo\Utilities\Scripts())

    //add some css
    ->addCssLocation("//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css")

	->addCssLocation("bower_components/Medium.js/medium.css")

	->addCssLocation("editor/bubble.css")
    ->addCssLocation("editor/IcoMoon/sprites/sprites.css")

    //add some javascript
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js")
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js")

    ->addScriptLocation("bower_components/undo/undo.js")
    ->addScriptLocation("bower_components/rangy/uncompressed/rangy-core.js")
    ->addScriptLocation("bower_components/rangy/uncompressed/rangy-cssclassapplier.js")
    ->addScriptLocation("bower_components/Medium.js/medium.js")

    ->addScriptLocation("editor/WLPluginSyntaxGenerator.js")
	->addScriptLocation("editor/WLPluginEditor.js")
	->addScriptLocation("editor/WLPluginAssistant.js")
	->addScriptLocation("editor/bubble.js")
	->addScriptLocation("editor/editor.js");




//create a wikiLingo to WYSIWYG parser, and send scripts collector to it
$parser = new WikiLingoWYSIWYG\Parser($scripts);


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
		<td style="width: 70%; vertical-align: top;"><div id="editable" contenteditable="true" style="width: 70%; margin-left: auto; margin-right: auto; border: none;"><?php echo $page;?></div></td>
		<td style="width: 30%; vertical-align: top;">
			<textarea id="editableSource" style="width: 100%; height: 1000px;"><?php echo $source; ?></textarea>
		</td>
	</tr>
</table>
</body>
<script>
	window.expressionSyntaxes = <?php echo $expressionSyntaxesJson; ?>;
	window.wLPlugins = <?php echo json_encode($parser->plugins); ?>;
</script>
<?php
    //echo script from the scripts collector to page
    echo $scripts->renderScript();
?>
</html>