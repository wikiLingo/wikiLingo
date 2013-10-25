<?php
require_once "Testify/lib/Testify/Testify.php";
include "autoload.php";

$t = new \Testify\Testify("WikiLingo General HTML Output");

(new Tests\PluginTest($t))->testOutput();