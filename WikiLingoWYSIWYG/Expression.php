<?php
class WikiLingoWYSIWYG_Expression extends WikiLingo_Expression
{
    function __construct($tagOpen, $tagClose = '', $content = '')
    {
        $this->stringBefore = $tagOpen;
        $this->stringAfter = $tagClose;

        if (is_string($content)) {
            $this->staticContent = $content;
        } else {
            $this->children[] = $content;
            $this->childrenCount++;
        }
    }
}