<?php

namespace WikiLingo\Expression;
use WikiLingo;
use Types\Type;

class Header
{
    public $parsed;
	public $parser;
    public $block;
	public $count = 0;
    public $content;
    public $needed = true;
	public $modifier;
    public $id;
	public $pointer = false;
    public static $ids = array();

    public function __construct(Block &$block, $len)
    {
	    ;$this->parsed =& $block->parsed;
        $this->block =& $block;
        $this->count = min(max($len, 0), 6);
	    $this->modifier = $block->modifier;
	    $this->parser =& $this->parsed->parser;
        $this->parser->addType(__CLASS__, $this);
    }

    public function render()
    {
        $element = Type::Element($this->parser->element(__CLASS__, ($this->pointer ? 'a' : 'h' . $this->count)));

	    $children = '';
	    foreach($this->parsed->children as &$child) {
            $element->staticChildren[] = $childRendered = $child->expression->render($this->parser);
		    $children .= $childRendered;
	    }
	    if (isset($this->modifier)) {
		    $element->detailedAttributes['data-modifier'] = $this->modifier;
		    //TODO: add in js to make expandable
		    switch ($this->modifier) {
			    case 'toggle':
				    $helper = Type::Helper($this->parser->helper('a'));
				    $helper->staticChildren[] = '[+]';
					$helper->attributes['href'] = '#';
				    $element->staticChildren[] = $helper->render();
				    break;
			    case 'hidden':
				    $helper = Type::Helper($this->parser->helper('a'));
				    $helper->staticChildren[] = '[-]';
				    $helper->attributes['href'] = '#';
				    $element->staticChildren[] = $helper->render();
				    break;
		    }
	    }

        if (!isset($this->id)) {
            $id = $this->id = urlencode(strip_tags($children));
            if (!isset(self::$ids[$id])) {
                self::$ids[$id] = 1;
            } else {
                $this->id .= self::$ids[$id];
                self::$ids[$id]++;
            }
        }

	    if ($this->pointer) {
		    $element->attributes['href'] = '#' . $this->id;
	    } else {
            $element->attributes['id'] = $this->id;
	    }

        return $element->render();
    }
}
