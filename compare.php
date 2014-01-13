<?php
require_once("autoload.php");

use WikiLingo\Event;
use WikiLingo\Expression;

    $original = "{TABS()}{TAB(title=`Misc.`)}
||item1|item2
item3|item4||
 # <> &
''Test'' %argument%
!!!Test
~tc~Comments ''Parsed?''~/tc~
~~blue:hello world~~
<a href='http://google.com'>This is a link to Google</a>
<script>alert('test');</script>
~np~This ''Is a test'' ~/np~
{TAB}{TAB(title=`Unordered List`)}
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
{ILLEGAL()}
    {HTML()}
        <script>alert('t');</script>
    {HTML}
{ILLEGAL}

{ACCORDIONS()}
	{ACCORDION(title=`Thumb Wars`)}{flash movie=`https://youtube.googleapis.com/v/lJ06RKGcPBI`}{ACCORDION}
	{ACCORDION(title=`ThumbTanic`)}{flash movie=`http://www.youtube.com/v/Rgdd8kMeaj0`}{ACCORDION}
	{ACCORDION(title=`BatThumb`)}{flash movie=`https://www.youtube.com/v/HUlbfmKtKcw`}{ACCORDION}
{ACCORDIONS}

";
    $scripts = new WikiLingo\Utilities\Scripts();

    $scripts
        ->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
        ->addCssLocation("mercury2/distro/mercury.bundle.css")
        ->addCssLocation("mercury2/distro/mercury_regions.bundle.css")

        ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
        ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
        ->addScriptLocation("mercury2/dependencies/liguidmetal-1.2.1.js")
        ->addScriptLocation("mercury2/distro/mercury.js")
        ->addScriptLocation("mercury2/distro/locales/nl.js")
        ->addScriptLocation("mercury2/regions/html.js");


    $wikiLingo = new WikiLingo\Parser($scripts);
    $wikiLingoWYSIWYG = new WikiLingoWYSIWYG\Parser($scripts);
    $wYSIWYGWikiLingo = new WYSIWYGWikiLingo\Parser();
/*
    Type::Events($wikiLingo->events)
        ->bind(new Event\Expression\Tag\Allowed(function(&$expression) {
            if (!$expression->allowed) {

            }
        }))

        ->bind(new Event\Parsed\RenderPermission(function(Parsed &$parsed) {
            if (
                $parsed->type == "Plugin"
                && $parsed->expression->type == "illegal"
            ) {
                $parsed->expressionPermissible = false;
            }
        }))
        ->bind(new Event\Parsed\RenderBlocked(function(Parsed &$parsed, &$return) {
            $return = '';
        }))

        ->bind(new Event\Expression\Variable\Lookup(function($key, &$element) {
            $key;
        }))



        ->bind(new Event\Expression\Plugin\PreRender(function(Expression\Plugin &$plugin) {
            $test = '';
        }));

    Type::Events($wikiLingoWYSIWYG->events)
        ->bind(new Event\Expression\Tag\Render(function(&$element, &$expression) {
            if (!$expression->allowed) {
                Type::Element($element)->attributes['style'] = 'background-color: red;';
            }
        }));
*/
    $outputWikiLingo = $wikiLingo->parse($original);
    $outputWikiLingoWYSIWYG = $wikiLingoWYSIWYG->parse($original);
    $outputWYSIWYGWikiLingo = $wYSIWYGWikiLingo->parse($outputWikiLingoWYSIWYG);
    $css = $scripts->renderCss();
    $script = $scripts->renderScript();
?><!DOCTYPE html>
<html>
<head>
	<style>
		table.demo {
			width: 100%;
		}
		table.demo, table.demo td {
			border: 1px solid pink;
			vertical-align: top;
		}
	</style>
    <?php echo $css; ?>
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
			<th>WYSIWYG (HTML ContentEditable) <input type="button" value="Edit" onclick="
			    $('#wysiwyg').attr('contenteditable', true);
			    Mercury.init();
			    return false;" /></th>
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
					<pre><code><?php echo htmlspecialchars($original);?></code></pre>
				</div>
			</td>
			<td class="output"><?php echo $outputWikiLingo;?></td>
			<td><div id="wysiwyg" class="output" data-mercury="html"  data-region-options='{"name": "editable", "allowDirection": true}'><?php echo $outputWikiLingoWYSIWYG;?></div></td>
			<td>
				<div>
					<pre><code><? echo htmlspecialchars($outputWYSIWYGWikiLingo); ?></code></pre>
				</div>
			</td>
		</tr>
	</tbody>
</table>
<?php echo $script; ?>
</body>
</html>