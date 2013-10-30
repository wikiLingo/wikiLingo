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
    public static $ids = array();

    public function __construct(Block &$block, $len, $modifier = null)
    {
	    $this->parsed =& $block->parsed;
        $this->block =& $block;
        $this->count = min(max($len, 0), 6);
        $this->content = &$this->parsed->arguments[1];
	    $this->modifier = $modifier;
	    $this->parser =& $this->parsed->parser;
        $this->parser->addType(__CLASS__, $this);
    }

    public function render()
    {
        $element = Type::Element($this->parser->element(__CLASS__, 'h' . $this->count));

        $element->staticChildren[] = $children = $this->content->expression->render($this->parser);

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

        $element->attributes['id'] = $this->id;

        return $element->render();
    }
}
