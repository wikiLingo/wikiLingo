<?php
require_once("index.php");


$original = "
{TABS()}{TAB(title=`Misc.`)}
||item1|item2
item3|item4||

''Test''
!!!Test
~tc~Comments ~np~I'm testing a potential sub/non-parsed~/np~ very good ~/tc~%%%

~~blue:hello world~~

~np~This ''Is a test'' ~/np~
{TAB}{TAB(title=`Unorder List`)}
*1.1
*1.2
**2.1
**2.2
*****5.1
*****5.2
*****5.3
**2.3
*1.3
{TAB}{TAB(title=`Ordered List`)}
#__Test__
#__Test__
##__Test__
##__Test__
#####__Test__
#####__Test__
#####__Test__
##__Test__
#__Test__
{TAB}{TABS}
";
$scripts = new WikiLingo\Utilities\Scripts();

$scripts
	->addScriptLocation("ckeditor/ckeditor.js")
	//->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
	//->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
	//->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
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
			'p blockquote;' +
			'em[*];' +
			'img[*];' +
			'embed[*];' +
			'div[*];' +
			'span[*];' +
			'strong[*];' +
			'br[*];' +
			'a[*];' +
			'table tr th td caption;' +
			'del ins';  "
	);
$wikiLingo = new WikiLingo\Parser();
$wikiLingoWYSIWYG = new WikiLingoWYSIWYG\Parser();
$wYSIWYGWikiLingo = new WYSIWYGWikiLingo\Parser();



$outputWikiLingo = $wikiLingo->parse($original);
$outputWikiLingoWYSIWYG = $wikiLingoWYSIWYG->parse($original);
$outputWYSIWYGWikiLingo = $wYSIWYGWikiLingo->parse($outputWikiLingoWYSIWYG);

$css = $scripts->renderCss();
$script = $scripts->renderScript();
?><!DOCTYPE html>
<html>
<head>
<?php echo $css . $script; ?>
	<style>
		table.demo {
			width: 100%;
		}
		table.demo, table.demo td {
			border: 1px solid pink;
			vertical-align: top;
		}
	</style>
</head>
<body>
<table class="demo">
	<tr>
		<th colspan="4"><h1>wikiLingo</h1></th>
	</tr>
	<tr>
		<th>Source</th>
		<th>Parsed</th>
		<th>WYSIWYG (CKEditor 4, HTML ContentEditable)</th>
		<th>WYSIWYG to Source <?php
			if ($original == $outputWYSIWYGWikiLingo) {
				echo "<span style='color: green;'>SUCCESS</span>";
			} else {
				echo "<span style='color: red;'>FAILURE</span>";
			}
		?>
		</th>
	</tr>
	<tr>
		<td><pre><?php echo $original;?></pre></td>
		<td><?php echo $outputWikiLingo;?></td>
		<td><div contenteditable="true" id="wysiwyg"><?php echo $outputWikiLingoWYSIWYG;?></div></td>
		<td>
			<pre><? echo $outputWYSIWYGWikiLingo; ?></pre></td>
	</tr>
</table>
</body>
</html>