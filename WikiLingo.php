<?php
class WikiLingo extends WikiLingo_Definition
{
    function __construct()
    {
        $this->emptyParserValue = new WikiLingo_Expression();
        parent::__construct();
    }
}