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
			$parser->bind("WikiLingo\\Expression\\WordLink", "exists", function(Expression\WordLink &$expression) {
				if ($expression->parsed->text == "This") {
					$expression->exists = true;
					$expression->text = "This";
					$expression->href = "http://This.com";
				}

			});

			$parser->bind("WikiLingo\\Expression\\WordLink", "render", function(Expression\WordLink &$expression, &$result) {
				$element = $expression->parsed->parser->element("WikiLingo\\Expression\\WordLink", "a");
				$element->staticChildren[] = $expression->text;
				$element->attributes["href"] = $expression->href;
				$result = $element->render();
			});
		}

		$this->source = " This Not ";

		$this->expected = " <a href='http://This.com'>This</a> Not ";

	}
}
