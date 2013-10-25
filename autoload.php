<?php

function __autoload($class) {
    $root = dirname(__FILE__);
    $file = $root . "/" . str_replace('\\', '/', $class) . '.php';
    if (!class_exists($class) && file_exists($file)) {
        include $file;
    }
}