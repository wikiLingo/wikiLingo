<?php
class WikiLingoWYSIWYG_Expression extends WikiLingo_Expression
{
    function __construct($tagOpen, $tagClose = '', $content = '')
    {
        $this->stringBefore = $tagOpen;
        $this->stringAfter = $tagClose;
        $this->staticContent = $content;
    }
}