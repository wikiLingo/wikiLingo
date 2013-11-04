<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Expression;

class WordLink extends Base
{
	public function __construct(&$parser = null)
	{

		if ($parser != null) {
			$parser->bind("WikiLingo\\Expression\\WordLink", "exists", function(&$text, &$exists) {
				if ($text == "This") {
					$exists = true;
				}

			});

			$parser->bind("WikiLingo\\Expression\\WordLink", "render", function(Expression\WordLink &$expression, &$result) {
				$element = $expression->parsed->parser->element("WikiLingo\\Expression\\WordLink", "a");
				$element->staticChildren[] = "This";
				$element->attributes["href"] = "http://This.com";
				$result = $element->render();
			});
		}

		$this->source = " This Not ";

		$this->expected = "<span class='whitespace'> </span><a href='http://This.com'>This</a><span class='whitespace'> </span>Not ";

	}
}
