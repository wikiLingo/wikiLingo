<?php
namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class Color
 * @package WikiLingo\Expression
 */
class Color extends Base
{
	public $color;

    /**
     * @param WikiLingo\Parsed $parsed
     */
    function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;
        $char = array_shift($this->parsed->children)->text;
        $this->parsed->childrenLength--;

        while ($char != ':' && $this->parsed->childrenLength > 0) {
            $this->color .= $char;
            $char = array_shift($this->parsed->children)->text;
            $this->parsed->childrenLength--;
        }

        $this->color = preg_replace('/[^#A-Za-z0-9]/', '', $this->color);
	}

    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'span');
	    $element->attributes['style'] = 'color:' . $this->color . ';';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}