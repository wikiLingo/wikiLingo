<?php

require_once('autoload.php');


//trap any warnings
ob_start();


//instantiate a script collector
$scripts = new WikiLingo\Utilities\Scripts();


//manage wikiLingo to wysiwyg html
if (isset($_REQUEST['wysiwyg']))
{
    $parser = new WikiLingoWYSIWYG\Parser($scripts);
    $output = $parser->parse($_REQUEST['w']);
}


//manage wysiwyg html to wikiLingo
else if (isset($_REQUEST['wikiLingo']))
{
    $fake = new WikiLingo\Parser();
    $parser = new WYSIWYGWikiLingo\Parser($scripts);
    $output = $parser->parse($_REQUEST['w']);
}


//manage wikiLingo to html
else
{
    $parser = new WikiLingo\Parser($scripts);
    $output = $parser->parse($_REQUEST['w']);
}




//collect output and return to client
$msg = ob_get_contents();
ob_end_clean();
echo json_encode((object)array(
    'output' => $output,
    'script' => $scripts->renderScript(),
    'css' => $scripts->renderCss(),
    'msg' => $msg
));