<?php
require_once('index.php');

$scripts = new WikiLingo\Utilities\Scripts();
$scripts->addCssLocation("//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css");
$scripts->addScriptLocation("//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js");
$scripts->addScriptLocation("http://code.jquery.com/ui/1.10.3/jquery-ui.js");

$parser = new WikiLingo\Parser($scripts);

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>wikiLingo mirror</title>
    <script src="editor/bubble.js"></script>
    <link rel=stylesheet href="editor/bubble.css"/>
    <link rel=stylesheet href="editor/IcoMoon/sprites/sprites.css"/>
    <?php echo $scripts->renderCss(); ?>
    <style>
        table td {
            vertical-align: top;
        }
    </style>
</head>
<body>
<br />
<div style="text-align: center; font-size:30px;"><img src="img/w.svg" style="width: 5%; margin-left: -85px; margin-top: -28px; position: absolute;"/>ikiLingo mirror</div>
<table style="width: 100%;">
    <tr>
        <th style="width: 50%;">in</th>
        <th style="width: 50%;">out <button id="wLUpdate">Update</button></th>
    </tr>
    <tr>
        <td style="padding: 20px;"><textarea id="wL" style="width: 100%;"></textarea></td>
        <td style="padding: 20px;" id="wLOut"></td>
    </tr>
</table>
<pre id="wLOutSource"></pre>
</body>
<?php echo $scripts->renderScript(); ?>
<script>
    $(function() {
        var wL = $('#wL').height(window.innerHeight * 0.8),
            wLOut = $('#wLOut'),
            wLOutSource = $('#wLOutSrouce'),
            head = $('head');

        $('#wLUpdate').click(function() {
            $.ajax({
                dataType: 'json',
                url: 'reflect.php',
                data: {w: wL.val()},
                success: function(result) {
                    wLOut.html(result.output);

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