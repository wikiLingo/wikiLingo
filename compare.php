<?php
require_once("vendor/autoload.php");

use WikiLingo\Event;
use WikiLingo\Expression;

    $original = "
{OUTLINE()}
* item 1
** item 1.1
* item 2
{OUTLINE}
";
    $scripts = (new WikiLingo\Utilities\Scripts())
        ->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
        ->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
        ->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js");


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