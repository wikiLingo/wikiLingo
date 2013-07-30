<?php

function tra($text) { return $text; } //translation

require_once 'Zend/Loader/StandardAutoloader.php';
$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true, 'fallback_autoloader' => true));
$dir = dirname(__FILE__);
$loader
    ->registerNamespace('WikiLingo', $dir)
    //->registerNamespace('WikiLingoWYSIWYG', $dir)
	->register();