<?php

//setup auto load
require_once("vendor/autoload.php");



//create scripts collector utility
$scripts = (new WikiLingo\Utilities\Scripts())

    //add some css
    ->addCssLocation("~jquery/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.css")

	->addCssLocation("~mediumjs/mediumjs/medium.css")

	->addCssLocation("~/editor/bubble.css")
    ->addCssLocation("~/editor/IcoMoon/sprites/sprites.css")
    ->addCssLocation("~/editor/pastLink.css")

    //add some javascript
    ->addScriptLocation("~jquery/jquery/jquery-1.10.2.js")
    ->addScriptLocation("~jquery/jquery-ui/js/jquery-ui-1.10.4.js")

    ->addScriptLocation("~undojs/undojs/undo.js")
    ->addScriptLocation("~rangy/rangy/uncompressed/rangy-core.js")
    ->addScriptLocation("~rangy/rangy/uncompressed/rangy-cssclassapplier.js")
    ->addScriptLocation("~mediumjs/mediumjs/medium.js")

    //this doesn't work now with composer
    ->addCssLocation("~codemirror/codemirror/lib/codemirror.css")
    ->addScriptLocation("~codemirror/codemirror/lib/codemirror.js")
    ->addCssLocation("~wikilingo/codemirror/wikiLingo.css")
    ->addScriptLocation("~wikilingo/codemirror/wikiLingo.js")

    ->addScriptLocation("~/editor/WLExpressionUI.js")
	->addScriptLocation("~/editor/WLPluginEditor.js")
	->addScriptLocation("~/editor/WLPluginAssistant.js")
	->addScriptLocation("~/editor/bubble.js")
	->addScriptLocation("~/editor/editor.js")

    ->addScriptLocation("~/WikiLingo/Definition.js")
    ->addScriptLocation("~/WikiLingo/Parsed.js")
    ->addScriptLocation("~/WikiLingo/Parser.js")
/*->addScript(<<<JS
    var parser = new WikiLingo.Parser();
    console.log(parser.parse(document.getElementById('editableSource').value));
    CodeMirror.StringStream.prototype.eatM = CodeMirror.StringStream.prototype.eat;
    CodeMirror.StringStream.prototype.eat = function(match) {
        console.log(this);
        return this.eatM(match);
    };
JS
)*/
    ->addCss(<<<CSS
@font-face {
    font-family: "dayRoman";
    src: url(editor/font/dayRoman.woff);
}

body {
    background-image: url(editor/img/canvas.jpg);
    font-family: "dayRoman";
    color: white;
}

.canvas {
    background-color: rgba(255,255,255, 1);
    -moz-box-shadow:    0px 0px 3px 4px rgba(0, 0, 0, 0.5);
	-webkit-box-shadow: 0px 0px 3px 4px rgba(0, 0, 0, 0.5);
	box-shadow:         0px 0px 3px 4px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
    padding: 10px;
}

div.CodeMirror {
    height: inherit;
}

.canvas-header {
    text-align: center;
}
.canvas-header {
    text-shadow: 2px 2px #000000;
}

.canvas > div {
    color: rgba(0, 0, 0, 0.75);
    background-color: transparent;
}

.canvas a {
    text-decoration: none;
    color: rgba(0, 0, 0, 1);
}
CSS
);




//create a wikiLingo to WYSIWYG parser, and send scripts collector to it
$parser = new WikiLingoWYSIWYG\Parser($scripts);


//open a file and parse it
$source = file_get_contents('editor/page.wl');
$page = $parser->parse($source);


//create a new group of possible syntaxes possible in the WikiLingo to WYSIWYG parser
$expressionSyntaxes = new WikiLingoWYSIWYG\ExpressionSyntaxes($scripts);



//bind to event "WikiLingoWYSIWYG\Event\ExpressionSyntax\Registered",giving certain syntax extra attributes
$expressionSyntaxes->parser->events->bind(new WikiLingoWYSIWYG\Event\ExpressionSyntax\Registered(function(\WikiLingoWYSIWYG\ExpressionType $expressionType) {
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
</head>
<body>
<div id="header" style="text-align: center;">
    <h1><img src="editor/img/wLogo.png" style="width: 40px;"/> wikiLingo</h1>
</div><?php //create an editable area and echo page to it ?>
<table style="width: 75%; margin-left: auto; margin-right: auto;">
	<tr>
		<td style="width: 60%; vertical-align: top;">
            <h2 class="canvas-header">edit visually</h2>
            <div class="canvas">
                <div id="editable" contenteditable="true" style="border: none;"><?php echo $page;?></div>
            </div>
        </td>
        <td style="width: 3%; vertical-align: top; text-align: center;">
            <h2 class="canvas-header">
                or
            </h2>
            <span style="font-size: 30px; position:relative; top: 250px;">=</span>
        </td>
		<td style="width: 37%; vertical-align: top;">
            <h2 class="canvas-header">edit wiki markup</h2>
            <div class="canvas">
			    <textarea id="editableSource" style="width: 100%; height: 400px;"><?php echo $source; ?></textarea>
            </div>
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