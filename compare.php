<?php
require_once("index.php");

$original = "
{TABS()}
{tab title='test'}
{tab title='test2'}
{TABS}
";

$htmlParser = new WikiLingo\WikiLingo;
$output = $htmlParser->parse($original);
//$wikiLingoWYSIWYG = new WikiLingoWYSIWYG();
//$outputWYSIWYG = $wikiLingoWYSIWYG->parse($original);

$htmlParser
    ->addCssLocation("http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("ckeditor/ckeditor.js")
    ->addScriptLocation("WikiLingoWYSIWYG/styles.js")
    ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
    ->addScript("
        CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
        CKEDITOR.config.allowedContent =
            'h1[*];' +
            'h2[*];' +
            'h3[*];' +
            'h4[*];' +
            'h5[*];' +
            'h6[*];' +
            'ul[*];' +
            'ol[*];' +
            'li[*];' +
            'p blockquote em;' +
            'img[*];' +
            'embed[*];' +
            'div[*];' +
            'span[*];' +
            'strong[*];' +
            'br[*];' +
            'a[*];' +
            'table tr th td caption;' +
            'del ins';")
    ->addScript("
         $(function() {
             $( \"#tabs\" ).tabs();
                    });
                ")
    ->addScript("
        $(function() {
            $('#wysiwygToSource').click(function() {
                var data = CKEDITOR.instances.wysiwyg.getData();
                $('#dtsOutput').hide();
                $.post('dts.php', {data: data}, function(convert) {
                    $('#dtsOutput pre').html(convert);
                    $('#dtsOutput').show();
                });
            });
        });
    ");

$css = $htmlParser->renderCss();
$script = $htmlParser->renderScript();
?><!DOCTYPE html>
<html>
<head>
    <?php echo $css . $script; ?>
</head>
<body>
<h2>WikiLingo</h2>
<pre><?php echo $original;?></pre><br />

<h2>WikiLingo to Standard Html Output</h2>
<div contenteditable="false"><?php echo $output;?></div>

<h2>WikiLingo to WYSIWYG Html Output</h2>
<div contenteditable="true" id="wysiwyg">php echo $outputWYSIWYG;?></div>
<input type="button" value="To Source" id="wysiwygToSource"/>
<div id="dtsOutput" style="display: none;">
    <h2>WikiLingo to WYSIWYG Html Output and back to WikiLingo Source</h2>
    <pre></pre>
</div>

<div id="tabs">
    <ul>

        <li><a href="#tabs-1">First</a></li>
        <li><a href="#tabs-2">Second</a></li>

    </ul>

    <div id="tabs-1">
           <p>First</p>
    </div>
    <div id="tabs-2">
           <p>Second</p>
    </div>
</div>
</body>
</html>