<?php
require_once("index.php");
use WikiLingoWYSIWYG\Event;

$scripts = (new WikiLingo\Utilities\Scripts())

    ->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
	->addCssLocation("editor/Medium.js/medium.css")

    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
    ->addScriptLocation("editor/rangy/uncompressed/rangy-core.js")
    ->addScriptLocation("editor/rangy/uncompressed/rangy-cssclassapplier.js")
    ->addScriptLocation("editor/Medium.js/medium.js");

$parser = new WikiLingoWYSIWYG\Parser($scripts);
$page = $parser->parse(file_get_contents('examples/using_wikiLingo_as_a_platform/page.wl'));
$expressionSyntaxes = new WikiLingoWYSIWYG\ExpressionSyntaxes($scripts);
$expressionSyntaxes->parser->events->bind(new Event\ExpressionSyntax\Registered(function(\WikiLingoWYSIWYG\ExpressionType &$expressionType) {
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

$expressionSyntaxes->registerExpressionTypes();

$expressionSyntaxesJson = json_encode($expressionSyntaxes->parsedExpressionSyntaxes);
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>wikiLingo editor</title>
    <script src="editor/bubble.js"></script>
    <link rel=stylesheet href="editor/bubble.css"/>
    <link rel=stylesheet href="editor/IcoMoon/sprites/sprites.css"/>
    <?php echo $scripts->renderCss(); ?>
    <style>
        font-family: 'Lora',serif;
    </style>
</head>
<body>
<div id="header" style="text-align: center;">
    <h1>wikiLingo</h1>
</div>
<div id="editable" contenteditable="true" style="width: 70%; margin-left: auto; margin-right: auto;"><?php echo $page;?></div>
</body>
<?php echo $scripts->renderScript(); ?>
<script>
    var expressionSyntaxes = <?php echo $expressionSyntaxesJson; ?>,
	    bubble = new WikiLingoBubble(expressionSyntaxes),
	    medium = bubble.medium = new Medium({
		    element: document.getElementById('editable'),
		    mode: 'rich',
		    placeholder: 'Your Article',
		    cssClasses: [],
		    attributes: {
			    remove: []
		    },
		    tags: {
			    paragraph: 'p',
			    outerLevel: ['pre','blockquote', 'figure', 'hr', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'strong', 'code', 'br', 'b'],
			    innerLevel: ['a', 'b', 'u', 'i', 'img', 'div', 'strong', 'li', 'span', 'code', 'br'] // Todo: Convert strong to b (IE)
		    },
		    modifiers: []
	    }),
	    color = function(element) {
		    var newColor = prompt('What color?', element.style['color']);
		    if (newColor) {
			    element.style['color'] = newColor
		    }
	    },
	    table = function(element) {
		    
	    };

    document.body.appendChild(bubble.container);

    document.onmouseup = function() {
        bubble.goToSelection();
    }

    document.getElementById('header').preventSelection();

    console.log(expressionSyntaxes);
</script>
</html>