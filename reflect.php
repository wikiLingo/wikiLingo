<?php


require_once('autoload.php');

$plugins = null;
//trap any warnings
ob_start();


//instantiate a script collector
$scripts = new WikiLingo\Utilities\Scripts();
$reflection = (isset($_REQUEST['reflect']) ? $_REQUEST['reflect'] : '');

switch ($reflection) {
	//manage wikiLingo to wysiwyg html
	case 'wikiLingoWYSIWYG':
		$parser = new WikiLingoWYSIWYG\Parser($scripts);
		$output = $parser->parse($_REQUEST['w']);
		$plugins = $parser->plugins;
		break;

	//manage wysiwyg html to wikiLingo
	case 'WYSIWYGWikiLingo':
		$fake = new WikiLingo\Parser();
		$parser = new WYSIWYGWikiLingo\Parser($scripts);
		$output = $parser->parse($_REQUEST['w']);
		break;

	//manage wikiLingo to html
	default:
		$parser = new WikiLingo\Parser($scripts);
		$output = $parser->parse($_REQUEST['w']);
		$plugins = $parser->plugins;
}


//collect output and return to client
$msg = ob_get_contents();
ob_end_clean();
echo json_encode(array(
    'output' => $output,
    'script' => $scripts->renderScript(),
    'css' => $scripts->renderCss(),
    'msg' => $msg,
	'plugins' => $plugins
));