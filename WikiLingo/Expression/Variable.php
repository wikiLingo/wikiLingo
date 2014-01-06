<?php
namespace WikiLingo\Expression;

use Types\Type;

/**
 * Class Variable
 * @package WikiLingo\Expression
 */
class Variable extends Base
{
    /**
     * @param $parser
     * @return mixed|string
     */
    public function render(&$parser)
	{
		$element = Type::Element($parser->element(__CLASS__, 'span'));
		$key = $element->detailedAttributes["key"] = substr($this->parsed->text, 2, -2);

		Type::Events($parser->events)->triggerExpressionVariableLookup($key, $element, $this);

		return $element->render();
	}
}