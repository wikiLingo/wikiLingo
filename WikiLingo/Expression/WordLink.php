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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
	{
		$element = $renderer->element(__CLASS__, "a");
		$parser->events->triggerExpressionWordLinkRender($element, $this);
		return $element->render();
	}
}