<?php

namespace WikiLingo\Expression;
use WikiLingo;

class Header
{
    public $parsed;
    public $block;
	public $count = 0;
    public $content;
    public $needed = true;

    public function __construct(Block &$block)
    {
	    $this->parsed =& $block->parsed;
        $this->block =& $block;
        $this->count = min($this->parsed->arguments[0]->leng, 6);
        $this->content = &$this->parsed->arguments[1];

        $this->parsed->parser->addType(__CLASS__, $this);
    }

    public function render()
    {
        $element = $this->block->parsed->parser->element(__CLASS__, 'h' . $this->count);
        $element->staticChildren[] = $this->content->expression->render($this->block->parsed->parser);
        return $element->render();
    }
}
