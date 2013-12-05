<?php
namespace WikiLingo\Test\Plugin;

use WikiLingo;
use WikiLingo\Test\Base;

class toc extends Base
{
	public function __construct(WikiLingo\Parser &$parser = null)
	{

		if ($parser != null) {
			$parser->types['WikiLingo\Expression\Header'] = array();
		}

		$this->source =
            "{toc}\n" .
            "!Header 1\n" .
			"!Header 2";

		$this->expected =
            "<div class='toc' id='toc1'>" .
                "<ol>" .
                    "<li><a href='#Header%2B1'>Header 1</a></li>" .
                    "<li><a href='#Header%2B2'>Header 2</a></li>" .
                "</ol>" .
            "</div>" .
            "<h1 id='Header+1'>Header 1</h1>" .
            "<h1 id='Header+2'>Header 2</h1>";

	}
}
