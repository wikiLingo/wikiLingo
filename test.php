<?php
require_once "Testify/lib/Testify/Testify.php";
include "autoload.php";

$t = new \Testify\Testify("WikiLingo");


(new WikiLingo\Test\Run("Expression"));

$t->run();