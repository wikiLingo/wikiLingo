<?php
namespace WikiLingo\Expression;

use WikiLingo;

class Color extends Base
{
	public $color;

	function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;

		if ($this->parsed->children[1]->text == ':') {
			//TODO: ensure color isn't dangerous
			$this->color = $this->parsed->children[0]->text;
		}

		array_shift($this->parsed->children);
		array_shift($this->parsed->children);

	}

    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'span');
	    $element->attributes['style'] = 'color:' . $this->color . ';';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}