<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

class DescriptionList extends Base
{
    public function generate()
    {
	    $items = array();
	    $item = '';
	    foreach($this->children as $descriptionList) {
		    $expression = Type::WYSIWYGElement($descriptionList->expression);
		    switch ($expression->name) {
			    case "dd":
				    $item .= ':' . $expression->renderedChildren;
				    $items[] = $item;
			    case "dt":
				    $item = ';' . $expression->renderedChildren;
		    }
	    }

	    return implode("\n", $items);
    }
}