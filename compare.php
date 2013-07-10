<?php

require_once ('index.php');

$original = "
!header
__test__
{DIV()}
{flash movie=`//www.youtube.com/v/xH2968yeG6s`}
{DIV}";


$wikiLingo = new WikiLingo();
$output = $wikiLingo->parse($original);
$wikiLingoWYSIWYG = new WikiLingoWYSIWYG();
$outputWYSIWYG = $wikiLingoWYSIWYG->parse($original);

$wikiLingo
    ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("ckeditor/ckeditor.js")
    ->addScriptLocation("WikiLingoWYSIWYG/styles.js")
    ->addScript("
        CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
        CKEDITOR.config.allowedContent =
            'h1 h2 h3 p blockquote em;' +
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

$css = $wikiLingo->renderCss();
$script = $wikiLingo->renderScript();
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
<div contenteditable="true" id="wysiwyg"><?php echo $outputWYSIWYG;?></div>
<input type="button" value="To Source" id="wysiwygToSource"/>
<div id="dtsOutput" style="display: none;">
    <h2>WikiLingo to WYSIWYG Html Output and back to WikiLingo Source</h2>
    <pre></pre>
</div>
</body>
</html>