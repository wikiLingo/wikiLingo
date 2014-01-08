<?php
require_once("WikiLingo/Utilities/AutoLoader.php");
function __autoload($class) {
    WikiLingo\Utilities\AutoLoader::load($class);
}