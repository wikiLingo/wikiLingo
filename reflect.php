<?php

require_once('index.php');

if (isset($_REQUEST['wysiwyg'])) {
    $WYSIWYGWikiLingo = new WYSIWYGWikiLingo\Parser();
    $WYSIWYGWikiLingoOutput = $WYSIWYGWikiLingo->parse($_REQUEST['wysiwyg']);
    echo $WYSIWYGWikiLingoOutput;
}