<?php
require_once('autoload.php');

$scripts = (new WikiLingo\Utilities\Scripts())
	->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css")
	->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js")
	->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js")
	->addScriptLocation('bower_components/vkbeautify/index.js');

$parser = new WikiLingo\Parser($scripts);

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>wikiLingo mirror</title>
    <?php echo $scripts->renderCss(); ?>
    <style>
        table td {
            vertical-align: top;
        }
        #wLOutSource {
            word-wrap: break-word ! important;
        }
    </style>
</head>
<body>
<br />
<div style="text-align: center; font-size:30px;"><img src="img/w.svg" style="width: 5%; margin-left: -85px; margin-top: -28px; position: absolute;"/>ikiLingo mirror</div>
<table style="width: 100%;">
    <tr>
        <th style="width: 50%;">in</th>
        <th style="width: 50%;">out <button id="wLUpdate">Update</button> (wysiwyg output? <input type="checkbox" id="wLWYSIWYGOutput" />)</th>
    </tr>
    <tr>
        <td style="padding: 20px;"><textarea id="wL" style="width: 100%;"></textarea></td>
        <td style="padding: 20px;" id="wLOut"></td>
    </tr>
    <tr>
        <th colspan="2">out source</th>
    </tr>
    <tr>
        <td colspan="2">
            <pre id="wLOutSource"></pre>
        </td>
    </tr>
</table>
</body>
<?php echo $scripts->renderScript(); ?>
<script>
    $(function() {
        var wL = $('#wL').height(window.innerHeight * 0.8),
            wLOut = $('#wLOut'),
            wLOutSource = $('#wLOutSource'),
	        wLWYSIWYGOutput = $('#wLWYSIWYGOutput'),
            head = $('head');

        $('#wLUpdate').click(function() {

	        var data = {
		        w: wL.val()
	        };

	        if (wLWYSIWYGOutput.is(':checked')) {
		        data.wysiwyg = true;
	        }

            $.ajax({
	            type: 'POST',
                dataType: 'json',
                url: 'reflect.php',
                data: data,
                success: function(result) {
                    wLOut.html(result.output);
                    wLOutSource.text(vkbeautify.xml(result.output));

                    if (result.script) {
                        head.append(result.script);
                    }
                    if (result.css) {
                        head.append(result.css);
                    }
                }
            });
            return false;
        });
    });
</script>
</html>