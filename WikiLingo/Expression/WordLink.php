<?php
namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;

class WordLink extends Base
{
	public $href;
	public $text;

	public function render(&$parser)
	{
		$element = $parser->element(__CLASS__, "a");
		Type::Events($parser->events)->triggerExpressionWordLinkRender($element, $this);
		return $element->render();
	}
}