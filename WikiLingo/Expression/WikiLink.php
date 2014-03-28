<?php

namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class WikiLink
 * @package WikiLingo\Expression
 */
class WikiLink extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'a');
        $sides = explode("|", $this->renderedChildren);

        if (isset($sides[1])) {
            $element->detailedAttributes['data-href'] = $href = array_shift($sides);
	        $text = implode("|", $sides);
        } else {
            $text = $this->renderedChildren;
            $href = $this->renderedChildren;
        }

        $element->staticChildren[] = $text;
        $element->attributes['href'] = $href;

	    $parser->events->triggerExpressionWikiLinkRender($element, $this);

        return $element->render();
    }
}