<?php

namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;

/**
 * Class WikiLinkType
 * @package WikiLingo\Expression
 */
class WikiLinkType extends Base
{
    public $type;
    public $link;

    /**
     * @param WikiLingo\Parsed $parsed
     */
    function __construct(WikiLingo\Parsed &$parsed)
    {
        $this->parsed =& $parsed;
        $this->type = $parsed->text;
    }

    /**
     * @param $parser
     * @return mixed|string
     */
    public function render(&$parser)
    {
        $element = Type::Element($parser->element(__CLASS__, 'a'));

        $sides = explode("|", $this->renderedChildren);

        if (isset($sides[1])) {
            $text = $sides[1];
            $href = $sides[0];
        } else {
            $text = $this->renderedChildren;
            $href = $this->renderedChildren;
        }

        $element->staticChildren[] = $text;
        $element->attributes['href'] = $href;
        $element->detailedAttributes['data-wiki-link-type'] = $this->type;

	    Type::Events($parser->events)->triggerExpressionWikiLinkTypeRender($element, $this);

        return $element->render();
    }
}