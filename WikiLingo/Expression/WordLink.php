<?php
namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class WordLink
 * @package WikiLingo\Expression
 */
class WordLink extends Base
{
	public $href;
	public $text;

    /**
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
	{
		$element = $parser->element(__CLASS__, "a");
		$parser->events->triggerExpressionWordLinkRender($element, $this);
		return $element->render();
	}
}