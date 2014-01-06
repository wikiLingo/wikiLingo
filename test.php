<?php
require_once "Testify/lib/Testify/Testify.php";
include("autoload.php");

$tf = new \Testify\Testify("wikiLingo test suite");

//Test Expressions
$tf->test("WikiLingo Expressions", function($tf) {
	(new WikiLingo\Test\TypeNamespace("Expression"))->run($tf);
});

//Test Expression Error Recovery
$tf->test("WikiLingo Expression Error Recovery", function($tf) {
	(new WikiLingo\Test\TypeNamespace("ExpressionErrorRecovery"))->run($tf);
});

//Test Plugins
$tf->test("WikiLingo Plugins", function($tf) {
	(new WikiLingo\Test\TypeNamespace("Plugin"))->run($tf);
});

//Test WYSIWYGWikiLingo Syntax Generator
$tf->test("WYSIWYGWikiLingo Syntax Generator", function($tf) {
	(new WYSIWYGWikiLingo\Test\TypeNamespace("SyntaxGenerator"))->run($tf);
});

ob_start();
$tf();
$testOutput = ob_get_contents();
file_put_contents("test.html", $testOutput);