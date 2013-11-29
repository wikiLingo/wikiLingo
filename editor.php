<?php
require_once("index.php");
$scripts = (new WikiLingo\Utilities\Scripts())
    ->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js");

$parser = new WikiLingoWYSIWYG\Parser($scripts);
$page = $parser->parse(file_get_contents('examples/using_wikiLingo_as_a_platform/page.wl'));
$expressionSyntaxes = new WikiLingoWYSIWYG\ExpressionSyntaxes();

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
<script>
    var expressionSyntaxes = <?php echo $expressionSyntaxesJson; ?>,
        bubble = new WikiLingoBubble(expressionSyntaxes);

    document.body.appendChild(bubble.container);

    document.onmouseup = function() {
        bubble.goToSelection();
    }

    document.getElementById('header').preventSelection();

    console.log(expressionSyntaxes);
</script>
<?php echo $scripts->renderScript(); ?>
</html>