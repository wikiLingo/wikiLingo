<?php
namespace WYSIWYGWikiLingo;

use DOMDocument;

class Parser
{
    public function parse($input)
    {
        $domParser = new DOMDocument;
        $domParser->loadHTML($input);
        $children = $domParser->childNodes;
        foreach($children as $child) {
            $child;
        }
        print_r($domParser);
    }
}