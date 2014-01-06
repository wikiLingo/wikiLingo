<?php
namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;

/**
 * Class WordLink
 * @package WikiLingo\Expression
 */
class WordLink extends Base
{
	public $href;
	public $text;

    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
	{
		$element = $parser->element(__CLASS__, "a");
		Type::Events($parser->events)->triggerExpressionWordLinkRender($element, $this);
		return $element->render();
	}
}