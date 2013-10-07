<?php

require_once('index.php');

if (isset($_REQUEST['data'])) {
    $dts = new WYSIWYGWikiLingo\Parser();
    $dtsOutput = $dts->parse($_REQUEST['data']);
    echo $dtsOutput;
}