<?php

//setup auto load
require_once("autoload.php");



//create scripts collector utility
$scripts = (new WikiLingo\Utilities\Scripts())

    //add some css
    ->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
	->addCssLocation("editor/Medium.js/medium.css")


    //add some javascript
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
    ->addScriptLocation("editor/rangy/uncompressed/rangy-core.js")
    ->addScriptLocation("editor/rangy/uncompressed/rangy-cssclassapplier.js")
    ->addScriptLocation("editor/Medium.js/medium.js");



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
$page = $parser->parse(file_get_contents('examples/using_wikiLingo_as_a_platform/page.wl'));



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
    <script src="editor/bubble.js"></script>
    <link rel=stylesheet href="editor/bubble.css"/>
    <link rel=stylesheet href="editor/IcoMoon/sprites/sprites.css"/>
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
    <h1>wikiLingo</h1>
</div><?php //create an editable area and echo page to it ?>
<div id="editable" contenteditable="true" style="width: 70%; margin-left: auto; margin-right: auto;"><?php echo $page;?></div>
</body>
<script>
    <?php //Create the WikiLingo object used above in the event "WikiLingo\Event\Expression\Plugin\PostRender"?>
    var
	    WLPlugin = function(el) {
		    var me = this, $el = $(el);
		    el.wLPlugin = this;

	        $el
		        .on('mousedown', function() {
		            return false;
		        })
		        .on('mouseenter', function() {
			        me.assistant = el.wLPluginAssistant = new WLPluginAssistant(el, this);
		        });
	    },
	    WLPluginAssistant = function(el, plugin) {
		    var $el = $(el),
			    cl = el.getAttribute('id') + 'button',
			    others = $('img.' + cl).remove(),
			    //representation = this.representation = $('<div class="helper representation" data-helper="1" contenteditable="false"></div>'),
		        button = this.button = $('<img data-helper="1" class="helper drag" src="editor/IcoMoon/PNG/location.png" />')
			        .addClass(cl)
			        .insertBefore(el);

		    button[0].el = el;
		    button[0].$el = $el;

		    button
			    .on('mousedown', function() {
				    $el.detach();
			    })
			    .on('dragend', function() {
			        button = $('img.' + cl).filter(':visible');

			        $el.insertAfter(button);
			        button.hide();
			    });
	    };
</script>
<?php
    //echo script from the scripts collector to page
    echo $scripts->renderScript();
?>
<script>
    var expressionSyntaxes = <?php echo $expressionSyntaxesJson; ?>,

        //bubble is the contenteditable toolbar, it is very simple and instantiated here
	    bubble = new WikiLingoBubble(expressionSyntaxes),

        //medium makes contenteditable behave
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