<?php
require_once "Testify/lib/Testify/Testify.php";
include "autoload.php";

$t = new \Testify\Testify("WikiLingo");


$test = new WikiLingo\Test\TypeNamespace("Expression");

$test->run($t);

$t->report();