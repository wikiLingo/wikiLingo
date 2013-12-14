<?php

//setup auto load
require_once("autoload.php");



//create scripts collector utility
$scripts = (new WikiLingo\Utilities\Scripts())

    //add some css
    ->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
	->addCssLocation("editor/Medium.js/medium.css")
	->addCssLocation("editor/bubble.css")
    ->addCssLocation("editor/IcoMoon/sprites/sprites.css")

    //add some javascript
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
    ->addScriptLocation("editor/rangy/uncompressed/rangy-core.js")
    ->addScriptLocation("editor/rangy/uncompressed/rangy-cssclassapplier.js")
    ->addScriptLocation("editor/Medium.js/medium.js")
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
<div id="editable" contenteditable="true" style="width: 70%; margin-left: auto; margin-right: auto; border: none;"><?php echo $page;?></div>
</body>
<script>
    <?php //Create the WikiLingo object used above in the event "WikiLingo\Event\Expression\Plugin\PostRender"?>
    var WLPlugin = function(el) {
		    if (el.getAttribute('data-draggable') == 'true') {
			    var me = this, $el = $(el),
				    Assistant = function(plugin) {
					    var cl = el.getAttribute('id') + 'button',
					    //representation = this.representation = $('<div class="helper representation" data-helper="1" contenteditable="false"></div>'),
						    button = this.button = document.createElement('img'),
						    $button = $(button);

					    button.setAttribute('src', 'editor/img/arrow-move.png');
					    button.setAttribute('contenteditable', 'false');
					    button.el = el;
					    button.$el = $el;
					    button.className = cl + ' helper drag';

					    $button
						    .on('dragstart', function() {
							    $el.detach();
                                $button.fadeTo(0, 0);
						    })
						    .on('mouseover', function(e) {
							    $el.addClass('draggable');
							    e.stopPropagation();
						    })
						    .on('mouseout', function() {
							    $el.removeClass('draggable');
						    });

					    button.ondragend = document.body.ondragend = function(e) {
						    setTimeout(function() {
							    $el.removeClass('draggable');
							    $button
                                    .detach()
                                    .fadeTo(0, 1);

							    $('img.' + cl).filter(':visible')
								    .first()
								    .after(el)
								    .remove();

						    }, 1);
					    };

					    this.show = function() {
						    for (var i = 0; i < WLPlugin.assistants.length; i++) {
							    WLPlugin.assistants[i].hide();
						    }
						    var pos = $el.position();
						    $button
							    .insertBefore($el)
							    .css('left', (pos.left + 10) + 'px')
							    .css('top', pos.top + 'px');
					    };

					    this.hide = function() {
                            if (!el.unhidable) {
                                $button.detach();
                            }
                        };

					    WLPlugin.assistants.push(this);
				    };

                me.assistant = el.wLPluginAssistant = new Assistant(el, this);
			    el.wLPlugin = this;
                el.onmouseover = function(e) {
                    me.assistant.show();
                    e.stopPropagation();
                };

		    }
	    };
    WLPlugin.assistants = [];
</script>
<?php
    //echo script from the scripts collector to page
    echo $scripts->renderScript();
?>
<script>
	window.expressionSyntaxes = <?php echo $expressionSyntaxesJson; ?>;
</script>
</html>