<?php

require_once('index.php');

$scripts = new WikiLingo\Utilities\Scripts();
if (isset($_REQUEST['wysiwyg'])) {
    $parser = new WYSIWYGWikiLingo\Parser($scripts);
    $output = $parser->parse($_REQUEST['w']);
} else {
    $parser = new WikiLingo\Parser($scripts);
    $output = $parser->parse($_REQUEST['w']);
}

echo json_encode((object)array(
    'output' => $output,
    'script' => $scripts->renderScript(),
    'css' => $scripts->renderCss()
));