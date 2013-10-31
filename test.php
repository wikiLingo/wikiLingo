<?php
require_once "Testify/lib/Testify/Testify.php";
include "autoload.php";

$tf = new \Testify\Testify("wikiLingo test suite");

//Test Expressions
$tf->test("WikiLingo Expressions", function($tf) {
	(new WikiLingo\Test\TypeNamespace("Expression"))->run($tf);
});

//Test Expression Error Recovery
$tf->test("WikiLingo Expression Error Recovery", function($tf) {
	(new WikiLingo\Test\TypeNamespace("ExpressionErrorRecovery"))->run($tf);
});

$tf();