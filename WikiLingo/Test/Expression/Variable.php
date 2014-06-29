<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Model;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Expression;
use WikiLingo\Event\Expression\Variable as V;

class Variable extends Base
{
	public function __construct(&$parser)
	{

		if ($parser != null) {
			$parser->events->bind(new V\Lookup(function($key, WikiLingo\Model\Element $element, WikiLingo\Expression\Variable $variable) {
				if ($key === "variable_here") {
					$element->staticChildren[] = "success";
				}
			}));
		}

		$this->source = "%variable_here%";

		$this->expected = "<span>success</span>";

	}
}
