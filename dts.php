<?php

require_once('index.php');

if (isset($_REQUEST['data'])) {
    $dts = new WikiLingoWYSIWYG_DTS();
    $dtsOutput = $dts->parse($_REQUEST['data']);
    echo $dtsOutput;
}