<?php
require_once("index.php");


$original = "
{TABS()}{TAB(title=`Misc.`)}
||item1|item2
item3|item4||

''Test''
!!!Test
~tc~Comments ''Parsed?''~/tc~%%%

~~blue:hello world~~
<a href='http://google.com'>This is a link to Google</a>
<script>alert('test');</script>
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

!+Header
";
$scripts = new WikiLingo\Utilities\Scripts();

$scripts
	->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")

	->addScriptLocation("ckeditor/ckeditor.js")
	->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
	->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
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
			'p[*];' +
			'blockquote[*];' +
			'em[*];' +
			'img[*];' +
			'embed[*];' +
			'div[*];' +
			'span[*];' +
			'strong[*];' +
			'br[*];' +
			'a[*];' +
			'table[*];' +
			'tr[*];' +
			'th[*];' +
			'td[*];' +
			'caption[*];' +
			'del[*];' +
			'ins[*];' +
			'code[*];';"
	);
$wikiLingo = new WikiLingo\Parser();
$wikiLingoWYSIWYG = new WikiLingoWYSIWYG\Parser();
$wYSIWYGWikiLingo = new WYSIWYGWikiLingo\Parser();

$wikiLingo->bind('WikiLingo\Expression\Tag', 'Allowed', function(&$expression, &$out = null) {
    //$expression->allowed = true;
});

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
	<colgroup>
		<col style="width: 20%;"/>
		<col style="width: 30%;"/>
		<col style="width: 30%;"/>
		<col style="width: 20%;"/>
	</colgroup>
	<tbody>
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
			<td>
				<div>
					<pre><?php echo htmlspecialchars($original);?></pre>
				</div>
			</td>
			<td><?php echo $outputWikiLingo;?></td>
			<td><div contenteditable="true" id="wysiwyg"><?php echo $outputWikiLingoWYSIWYG;?></div></td>
			<td>
				<div>
					<pre><? echo htmlspecialchars($outputWYSIWYGWikiLingo); ?></pre>
				</div>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>