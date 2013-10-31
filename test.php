<?php
require_once "Testify/lib/Testify/Testify.php";
include "autoload.php";

//Test Expressions
$t = new \Testify\Testify("WikiLingo");
$expression = new WikiLingo\Test\TypeNamespace("Expression");
$expression->run($t);
$t->report();


//Test Expression Error Recovery
$t = new \Testify\Testify("WikiLingo Error Recovery");
$expression = new WikiLingo\Test\TypeNamespace("ExpressionErrorRecovery");
$expression->run($t);
$t->report();