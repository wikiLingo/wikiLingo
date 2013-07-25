<?php

namespace WikiLingo;
use WikiLingo;

class Expression extends WikiLingo\ParserValue
{
	public $stringBefore = '';
	public $stringAfter = '';
	public $parent;

	public $staticContent;
    public $syntax;
    public $loc;

	public function __construct(&$before = null, $after = null, $staticContent = '')
	{
        if (isset($before)) {
            $this->stringBefore = $before->value;
            $this->stringAfter = (isset($after) ? $after->value : '');
            $this->staticContent = $staticContent;

            $this->loc = $before->loc;
            if (isset($after)) {
                $this->loc->lastColumn = $after->loc->lastColumn;
                $this->loc->lastLine = $after->loc->lastLine;
            }
        }
	}
}