<?php
require_once("index.php");


$original = "
--Test __Bold__-- ===Test===
-=Title=-
''This is a test''
{TABS()}
{TAB(title='test1 title')}Test1{TAB}
{TAB(title='test2 title')}Test2{TAB}
{TABS}

{ACCORDIONS()}
{ACCORDION(title='test1 title')}Test1{ACCORDION}
{ACCORDION(title='test2 title')}Test2{ACCORDION}
{ACCORDIONS}

**List at 2
*List at 1
#List number 1
#List numner 2

{div}
<div>Test</div>
<script>console.log('If you see me in the console more than 1 time, something is wrong!');</script>
&lt;div&gt;Test&lt;/div&gt;
";
$scripts = new WikiLingo\Utilities\Scripts();
$wikiLingo = new WikiLingo\Parser();
$wikiLingoWYSIWYG = new WikiLingoWYSIWYG\Parser();
$wYSIWYGWikiLingo = new WYSIWYGWikiLingo\Parser();

$scripts
	->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
	->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
    ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
    ->addScriptLocation("ckeditor/ckeditor.js")
    ->addScriptLocation("WikiLingoWYSIWYG/styles.js")
    ->addScript(
        "CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
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
    ->addScript(
        "$(function() {
            $('#wysiwygToSource').click(function() {
                var data = CKEDITOR.instances.wysiwyg.getData();
                $('#dtsOutput').hide();
                $.post('dts.php', {data: data}, function(convert) {
                    $('#dtsOutput pre').html(convert);
                    $('#dtsOutput').show();
                });
            });
        });"
    );

$outputWikiLingo = $wikiLingo->parse($original);
$outputWikiLingoWYSIWYG = $wikiLingoWYSIWYG->parse($original);
$outputWYSIWYGWikiLingo = $wYSIWYGWikiLingo->parse($outputWikiLingoWYSIWYG);

$css = $scripts->renderCss();
$script = $scripts->renderScript();
?><!DOCTYPE html>
<html>
<head>
<?php echo $css . $script; ?>
</head>
<body>
<h2>WikiLingo</h2>
<pre><?php echo $original;?></pre><br />

<h2>WikiLingo to Standard Html Output</h2>
<div><?php echo $outputWikiLingo;?></div>

<h2>WikiLingo to WYSIWYG Html Output</h2>
<div contenteditable="true" id="wysiwyg"><?php echo $outputWikiLingoWYSIWYG;?></div>
<input type="button" value="To Source" id="wysiwygToSource"/>
<div id="dtsOutput">
    <h2>WikiLingo to WYSIWYG Html Output and back to WikiLingo Source</h2>
    <pre><? echo $outputWYSIWYGWikiLingo; ?></pre>
</div>
</body>
</html>