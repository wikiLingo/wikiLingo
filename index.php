<?php

function tra($text) { return $text; } //translation

require_once 'Zend/Loader/StandardAutoloader.php';
$loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true, 'fallback_autoloader' => true));
$dir = dirname(__FILE__);
$loader
    ->registerNamespace('Jison', $dir . '/Jison')
    ->registerNamespace('WikiLingo', $dir);

$loader->register();
$wikiLingo = new WikiLingo();
print_r($wikiLingo->parse("{DIV(color='purple' width='100px')}{DIV()}test{DIV}{DIV}{DIV(color='purple' width='100px')}{DIV()}test{DIV}{DIV}"));
?>
<html>
<head></head>
<body>

</body>
</html>