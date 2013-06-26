<?php
require_once 'Zend/Loader/StandardAutoloader.php';
$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
$loader->registerNamespace('WikiLingo', $_SERVER['DOCUMENT_ROOT']);
$wL = new WikiLingo();
echo "test";
