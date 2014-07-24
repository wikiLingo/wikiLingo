<?php

namespace WikiLingo\Expression\BlockType;


use WikiLingo;
use WikiLingo\Expression\Block;
use Types\Type;

/**
 * Class Header
 * @package WikiLingo\Expression
 */
class Header
{
    public $parsed;

    /**
     * @var WikiLingo\Parser
     */
    public $parser;

    /**
     * @var \WikiLingo\Expression\Block
     */
    public $block;
	public $count = 0;
    public $content;
    public $needed = true;
	public $modifier;
    public $id;
	public $pointer = false;
    public static $ids = array();

    /**
     * @param Block $block
     * @param $len
     */
    public function __construct(Block $block, $len)
    {
	    $this->parsed = $block->parsed;
        $this->block = $block;
        $this->count = min(max($len, 0), 6);
	    $this->modifier = $block->modifier;
	    $this->parser = $this->parsed->parser;
        $this->parser->addType($this);
    }

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render($renderer, $parser)
    {
	    $tagType = 'h' . $this->count;
	    $children = '';
	    foreach($this->parsed->children as $child) {
		    $children .= $parser->renderer->render($child);
	    }

	    if ($this->pointer) {
		    $tagType = 'a';
		    $children = strip_tags($children);
	    }

        $element = Type::Element($renderer->element(__CLASS__, $tagType));
	    $element->staticChildren[] = $children;

	    if (isset($this->modifier)) {
		    $element->detailedAttributes['data-modifier'] = $this->modifier;
		    //TODO: add in js to make expandable
		    switch ($this->modifier) {
			    case 'toggle':
				    $helper = Type::Helper($renderer->helper('a'));
				    $helper->staticChildren[] = '[+]';
					$helper->attributes['href'] = '#';
				    $element->staticChildren[] = $helper->render();
				    break;
			    case 'hidden':
				    $helper = Type::Helper($renderer->helper('a'));
				    $helper->staticChildren[] = '[-]';
				    $helper->attributes['href'] = '#';
				    $element->staticChildren[] = $helper->render();
				    break;
		    }
	    }

        if ($this->id == null || $this->block->variableContext != null) {
            $id = trim(preg_replace("/[^0-9a-zA-Z_]+/", "-", trim(strip_tags($children))), '-');
	        $id = $parser->events->triggerExpressionBlockTypeHeaderIdLookup($id, $this);
	        $this->id = $id;
            if (!isset(self::$ids[$id])) {
                self::$ids[$id] = 1;
            } else {
                $this->id .= self::$ids[$id];
                self::$ids[$id]++;
            }
        }

	    if ($this->pointer) {
		    $element->attributes['href'] = '#' . urlencode($this->id);
	    } else {
            $element->attributes['id'] = $this->id;
	    }

	    $header = $element->render();
        return $header;
    }
}
