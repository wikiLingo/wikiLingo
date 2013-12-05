<?php

require_once('index.php');
ob_start();
$scripts = new WikiLingo\Utilities\Scripts();
if (isset($_REQUEST['wysiwyg'])) {
    $parser = new WikiLingoWYSIWYG\Parser($scripts);
    $output = $parser->parse($_REQUEST['w']);
} else {
    $parser = new WikiLingo\Parser($scripts);
    $output = $parser->parse($_REQUEST['w']);
}
$msg = ob_get_contents();
ob_end_clean();
echo json_encode((object)array(
    'output' => $output,
    'script' => $scripts->renderScript(),
    'css' => $scripts->renderCss(),
    'msg' => $msg
));