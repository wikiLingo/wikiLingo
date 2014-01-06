<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

/**
 * Class DescriptionList
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class DescriptionList extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
	    $this->parsed->isBlock = true;
	    $items = array();
	    $item = '';
	    foreach($this->children as $descriptionList) {
		    $expression = Type::WYSIWYGElement($descriptionList->expression);
		    switch ($expression->name) {
			    case "dd":
				    $item .= ':' . $expression->renderedChildren;
				    $items[] = $item;
			    case "dt":
				    $item = "\n;" . $expression->renderedChildren;
		    }
	    }

	    return implode('', $items);
    }
}