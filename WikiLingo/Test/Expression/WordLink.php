<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Renderer;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Expression;
use WikiLingo\Event\Expression\WordLink\Exists;
use WikiLingo\Event\Expression\WordLink\Render;

class WordLink extends Base
{
	public function __construct(&$parser = null)
	{

		if ($parser != null) {
			$parser->events->bind(new Exists(function(&$text, &$exists) {
				if ($text == "This") {
					$exists = true;
				}
			}));
;
			$parser->events->bind(new Render(function(Renderer\Element &$element, &$wordLink) use (&$parser) {
				if ($wordLink->parsed->text == "This") {
					$element->staticChildren[] = "This";
					$element->attributes["href"] = "http://This.com";
				}
			}));
		}

		$this->source = " This Not ";

		$this->expected = "<span class='whitespace'> </span><a href='http://This.com'>This</a><span class='whitespace'> </span>Not ";

	}
}
